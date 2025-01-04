<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        return view("Project.index", ['projects' => Project::latest()->filter(request(['tag', 'search']))->paginate(4)]);
    }
    public function show(Project $project)
    {
        $relatedProjects = Project::latest()
            ->filter(request(['search']))
            ->where('id', '!=', $project->id)  // Exclude the current project
            ->take(4)
            ->get();

        return view('Project.show', [
            'project' => $project,
            'relatedProjects' => $relatedProjects
        ]);
    }

    public function create()
    {
        return view("Project.create", ['projectTypes' => $this->getProjectType()]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title_fa' => 'required',
            'title_en' => 'required',
            'summary_fa' => 'required',
            'summary_en' => 'required',
            'description_fa' => 'required',
            'description_en' => 'required',
            'tags' => 'required',
            'project_type_id' => 'required'
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

        Project::create($formFields);

        return redirect('/projects/manage')->with('message', 'Project created successfully!');
    }

    public function edit(Project $project)
    {
        return view('Project.edit', ['project' => $project, 'projectTypes' => $this->getProjectType()]);
    }

    public function update(Request $request, Project $project)
    {
        // Validate the request fields
        $formFields = $request->validate([
            'title_fa' => 'required',
            'title_en' => 'required',
            'summary_fa' => 'required',
            'summary_en' => 'required',
            'description_fa' => 'required',
            'description_en' => 'required',
            'tags' => 'required',
            'project_type_id' => 'required'
        ]);

        // Ensure the existing_images and new_images are arrays
        $existingImages = json_decode($request->input('existing_images'), true) ?? [];
        $newImages = json_decode($request->input('new_images'), true) ?? [];
        $storedImages = json_decode($project->images, true) ?? [];

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

        // Update the project with the new form fields
        $project->update($formFields);

        return redirect('/projects/manage')->with('message', 'Project updated successfully!');
    }

    public function manage()
    {
        return view('Project.manage', ['projects' => Project::latest()->filter(request(['tag', 'search']))->paginate(6)]);
    }

    public function destroy(Project $project)
    {
        if ($project->images) {
            // Decode the JSON string to an array of image paths
            $images = json_decode($project->images, true);

            // Iterate over each image path and delete the image
            foreach ($images as $image) {
                if (Storage::disk('public')->exists($image)) {
                    Storage::disk('public')->delete($image);
                }
            }
        }

        $project->delete();
        return redirect('/projects/manage')->with('message', 'Project deleted successfully');
    }


    private function getProjectType()
    {
        return ProjectType::latest()->get();
    }
}
