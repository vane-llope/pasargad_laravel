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
            'title' => 'required',
            'summary' => 'required',
            'description' => 'required',
            'tags' => 'required',
            'project_type_id' => 'required'
        ]);



        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $imagePath = $image->store('ProjectImage', 'public');
                $formFields['images'][] = $imagePath;
            }
            // Convert the images array to a JSON string
            $formFields['images'] = json_encode($formFields['images']);
        }



        Project::create($formFields);

        return redirect('/projects/manage')->with('message', 'Project created successfully!');
    }

    public function edit(Project $project)
    {
        return view('Project.edit', ['project' => $project, 'projectTypes' => $this->getProjectType()]);
    }

    public function update(Request $request, Project $project)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'description' => 'required',
            'tags' => 'required',
            'project_type_id' => 'required'
        ]);

        if ($request->hasFile('images')) {
            // Delete existing images
            if ($project->images) {
                $existingImages = json_decode($project->images, true);
                foreach ($existingImages as $existingImage) {
                    if (Storage::disk('public')->exists($existingImage)) {
                        Storage::disk('public')->delete($existingImage);
                    }
                }
            }

            $images = $request->file('images');
            foreach ($images as $image) {
                $imagePath = $image->store('ProjectImage', 'public');
                $formFields['images'][] = $imagePath;
            }
            // Convert the images array to a JSON string
            $formFields['images'] = json_encode($formFields['images']);
        } else {
            $formFields['images'] = $project->images;
        }

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
