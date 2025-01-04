<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        return view("Article.index", ['articles' => Article::latest()->filter(request(['tag', 'search']))->paginate(2)]);
    }


    public function show(Article $article)
    {
        $latestArticles = Article::latest()
            ->filter(request(['tag', 'search']))
            ->where('id', '!=', $article->id)  // Exclude the current article
            ->take(4)
            ->get();

        return view('Article.show', [
            'article' => $article,
            'latestArticles' => $latestArticles
        ]);
    }

    public function create()
    {
        return view("Article.create");
    }

    public function store(Request $request)
    {

        // dd($request);
        $formFields = $request->validate([
            'title_fa' => 'required',
            'title_en' => 'required',
            'summary_fa' => 'required',
            'summary_en' => 'required',
            'description_fa' => 'required',
            'description_en' => 'required',
            'tags' => 'required'
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
                $imagePath = 'articleImage/' . $imageName;
                Storage::disk('public')->put($imagePath, $data);
                $formFields['images'][] = $imagePath;
            }
        }

        // Convert the images array to a JSON string
        $formFields['images'] = json_encode($formFields['images']);


        Article::create($formFields);

        return redirect('/articles/manage')->with('message', 'Article created successfully!');
    }

    public function edit(Article $article)
    {
        return view('Article.edit', ['article' => $article]);
    }

    public function update(Request $request, Article $article)
    {

        $formFields = $request->validate([
            'title_fa' => 'required',
            'title_en' => 'required',
            'summary_fa' => 'required',
            'summary_en' => 'required',
            'description_fa' => 'required',
            'description_en' => 'required',
            'tags' => 'required'
        ]);

        // Ensure the existing_images and new_images are arrays
        $existingImages = json_decode($request->input('existing_images'), true) ?? [];
        $newImages = json_decode($request->input('new_images'), true) ?? [];
        $storedImages = json_decode($article->images, true) ?? [];

        // Initialize formFields['images'] with existing images
        $formFields['images'] = $existingImages;

        // Handle new image uploads
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $imagePath = $image->store('articleImage', 'public');
                $formFields['images'][] = $imagePath;
            }
        }

        // Handle new base64 images
        foreach ($newImages as $newImage) {
            if (preg_match('/^data:image\/(\w+);base64,/', $newImage, $type)) {
                $data = substr($newImage, strpos($newImage, ',') + 1);
                $data = base64_decode($data);
                $imageName = uniqid() . '.' . $type[1];
                $imagePath = 'articleImage/' . $imageName;
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

        $article->update($formFields);

        return redirect('/articles/manage')->with('message', 'Article Updated Successfully!');
    }

    public function manage()
    {
        return view('Article.manage', ['articles' => Article::latest()->filter(request(['tag', 'search']))->paginate(6)]);
    }

    public function destroy(Article $article)
    {
        if ($article->images) {
            // Decode the JSON string to an array of image paths
            $images = json_decode($article->images, true);

            // Iterate over each image path and delete the image
            foreach ($images as $image) {
                if (Storage::disk('public')->exists($image)) {
                    Storage::disk('public')->delete($image);
                }
            }
        }
        $article->delete();
        return redirect('/articles/manage')->with('message', 'article deleted successfully');
    }

}
