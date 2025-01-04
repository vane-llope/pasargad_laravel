<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Quarry;
use App\Models\StoneType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class QuarryController extends Controller
{
    public function index()
    {
        return view("Quarry.index", ['quarries' => Quarry::latest()->filter(request(['tag', 'search']))->paginate(4)]);
    }


    public function show(Quarry $quarry)
    {
        $relatedQuarries = Quarry::latest()
            ->filter(request(['tag', 'search']))
            ->where('id', '!=', $quarry->id)  // Exclude the current Quarry
            ->take(4)
            ->get();

        return view('Quarry.show', [
            'quarry' => $quarry,
            'relatedQuarries' => $relatedQuarries
        ]);
    }

    public function create()
    {
        return view("Quarry.create", ['stoneTypes' => $this->getStoneType()]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name_fa' => 'required',
            'name_en' => 'required',
            'address_fa' => 'required',
            'address_en' => 'required',
            'stone_type_id' => 'required'
        ]);


        // Initialize 'images' field as an empty array
        $formFields['images'] = [];

        // Handle new base64 images
        $newImages = json_decode($request->input('new_images'), true) ?? [];
        foreach ($newImages as $newImage) {
            if (preg_match('/^data:image\/(\w+);base64,/', $newImage, $type)) {
                $data = substr($newImage, strpos($newImage, ',') + 1);
                $data = base64_decode($data);
                $imageName = uniqid() . '.' . $type[1];
                $imagePath = 'ProjectImage/' . $imageName;
                Storage::disk('public')->put($imagePath, $data);
                $formFields['images'][] = $imagePath;
            }
        }

        // Convert the images array to a JSON string
        $formFields['images'] = json_encode($formFields['images']);


        Quarry::create($formFields);

        return redirect('/Quarries/manage')->with('message', 'Quarry created successfully!');
    }

    public function edit(Quarry $quarry)
    {
        return view('Quarry.edit', ['quarry' => $quarry, 'stoneTypes' => $this->getStoneType()]);
    }

    public function update(Request $request, Quarry $quarry)
    {

        $formFields = $request->validate([
            'name_fa' => 'required',
            'name_en' => 'required',
            'address_fa' => 'required',
            'address_en' => 'required',
            'stone_type_id' => 'required'
        ]);


        // Ensure the existing_images and new_images are arrays
        $existingImages = json_decode($request->input('existing_images'), true) ?? [];
        $newImages = json_decode($request->input('new_images'), true) ?? [];
        $storedImages = json_decode($quarry->images, true) ?? [];

        // Initialize formFields['images'] with existing images
        $formFields['images'] = $existingImages;

        // Handle new image uploads
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $imagePath = $image->store('ProjectImage', 'public');
                $formFields['images'][] = $imagePath;
            }
        }

        // Handle new base64 images
        foreach ($newImages as $newImage) {
            if (preg_match('/^data:image\/(\w+);base64,/', $newImage, $type)) {
                $data = substr($newImage, strpos($newImage, ',') + 1);
                $data = base64_decode($data);
                $imageName = uniqid() . '.' . $type[1];
                $imagePath = 'ProjectImage/' . $imageName;
                Storage::disk('public')->put($imagePath, $data);
                $formFields['images'][] = $imagePath;
            }
        }

        // Convert the images array to a JSON string
        $formFields['images'] = json_encode($formFields['images']);

        // Find images to remove
        $imagesToRemove = array_diff($storedImages, $existingImages);

        // Delete removed images from storage
        foreach ($imagesToRemove as $imageToRemove) {
            if (Storage::disk('public')->exists($imageToRemove)) {
                Storage::disk('public')->delete($imageToRemove);
            }
        }


        $quarry->update($formFields);

        return redirect('/Quarries/manage')->with('message', 'Quarry Updated Successfully!');
    }

    public function manage()
    {
        return view('Quarry.manage', ['quarries' => Quarry::latest()->filter(request(['search']))->paginate(6)]);
    }

    public function destroy(Quarry $quarry)
    {
        if ($quarry->images) {
            // Decode the JSON string to an array of image paths
            $images = json_decode($quarry->images, true);

            // Iterate over each image path and delete the image
            foreach ($images as $image) {
                if (Storage::disk('public')->exists($image)) {
                    Storage::disk('public')->delete($image);
                }
            }
        }

        $quarry->delete();
        return redirect('/Quarries/manage')->with('message', 'Quarry deleted successfully');
    }

    private function getStoneType()
    {
        return StoneType::latest()->get();
    }
}
