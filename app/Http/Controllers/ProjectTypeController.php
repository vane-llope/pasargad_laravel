<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProjectType;
use Illuminate\Http\Request;

class ProjectTypeController extends Controller
{
    public function create()
    {
        return view("ProjectType.create");
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name_fa' => 'required',
            'name_en' => 'required'
        ]);


        ProjectType::create($formFields);

        return redirect('/projectTypes/manage')->with('message', 'projectType created successfully!');
    }

    public function edit(ProjectType $projectType)
    {
        return view('ProjectType.edit', ['projectType' => $projectType]);
    }

    public function update(Request $request, ProjectType $projectType)
    {
        $formFields = $request->validate([
            'name_fa' => 'required',
            'name_en' => 'required'
        ]);

        $projectType->update($formFields);

        return redirect('/projectTypes/manage')->with('message', 'projectType Updated Successfully!');
    }

    public function manage()
    {
        return view('ProjectType.manage', ['projectTypes' => ProjectType::latest()->filter(request(['search']))->paginate(6)]);
    }

    public function destroy(ProjectType $projectType)
    {
        $projectType->delete();
        return redirect('/projectTypes/manage')->with('message', 'projectType deleted successfully');
    }

}
