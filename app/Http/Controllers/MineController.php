<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mine;
use App\Models\StoneType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class MineController extends Controller
{
    public function index()
    {
        return view("Mine.index", ['mines' => Mine::latest()->filter(request(['tag', 'search']))->paginate(4)]);
    }
    public function show(Mine $mine)
    {
        return view("Mine.show", ['mine' => $mine, 'relatedMines' => Mine::latest()->filter(request(['tag', 'search']))->take(4)->get()]);
    }

    public function create()
    {
        return view("Mine.create", ['stoneTypes' => $this->getStoneType()]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'address' => 'required',
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


        Mine::create($formFields);

        return redirect('/mines/manage')->with('message', 'Mine created successfully!');
    }

    public function edit(Mine $mine)
    {
        return view('Mine.edit', ['mine' => $mine, 'stoneTypes' => $this->getStoneType()]);
    }

    public function update(Request $request, Mine $mine)
    {

        $formFields = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'stone_type_id' => 'required'
        ]);


        // Ensure the existing_images and new_images are arrays
        $existingImages = json_decode($request->input('existing_images'), true) ?? [];
        $newImages = json_decode($request->input('new_images'), true) ?? [];
        $storedImages = json_decode($mine->images, true) ?? [];

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


        $mine->update($formFields);

        return redirect('/mines/manage')->with('message', 'Mine Updated Successfully!');
    }

    public function manage()
    {
        return view('Mine.manage', ['mines' => Mine::latest()->filter(request(['search']))->paginate(6)]);
    }

    public function destroy(Mine $mine)
    {
        if ($mine->images) {
            // Decode the JSON string to an array of image paths
            $images = json_decode($mine->images, true);

            // Iterate over each image path and delete the image
            foreach ($images as $image) {
                if (Storage::disk('public')->exists($image)) {
                    Storage::disk('public')->delete($image);
                }
            }
        }

        $mine->delete();
        return redirect('/mines/manage')->with('message', 'Mine deleted successfully');
    }

    private function getStoneType()
    {
        return StoneType::latest()->get();
    }

}
