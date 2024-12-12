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
    public function show(Project $Project)
    {
        return view("Project.show", ['project' => $Project, 'relatedProjects' => Project::latest()->filter(request(['search']))->take(4)->get()]);
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


        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('ProjectImage', 'public');

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

        if ($request->hasFile('image')) {
            if ($project->image && Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }

            $formFields['image'] = $request->file('image')->store('ProjectImage', 'public');
        } else {
            $formFields['image'] = $project->image;
        }



        $project->update($formFields);

        return redirect('/projects/manage')->with('message', 'Project Updated Successfully!');
    }

    public function manage()
    {
        return view('Project.manage', ['projects' => Project::latest()->filter(request(['tag', 'search']))->paginate(6)]);
    }

    public function destroy(Project $project)
    {
        if ($project->image && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();
        return redirect('/projects/manage')->with('message', 'Project deleted successfully');
    }

    private function getProjectType()
    {
        return ProjectType::latest()->get();
    }
}
