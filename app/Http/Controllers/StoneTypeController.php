<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StoneType;
use Illuminate\Http\Request;

class StoneTypeController extends Controller
{
    public function create()
    {
        return view("StoneType.create");
    }

    public function store(Request $request)
    {
        // dd($request->file('image'));
        $formFields = $request->validate([
            'name' => 'required'
        ]);


        StoneType::create($formFields);

        return redirect('/stoneTypes/manage')->with('message', 'StoneType created successfully!');
    }

    public function edit(StoneType $stoneType)
    {
        return view('StoneType.edit', ['stoneType' => $stoneType]);
    }

    public function update(Request $request, StoneType $stoneType)
    {

        $formFields = $request->validate([
            'name' => 'required'
        ]);

        $stoneType->update($formFields);

        return redirect('/stoneTypes/manage')->with('message', 'StoneType Updated Successfully!');
    }

    public function manage()
    {
        return view('StoneType.manage', ['stoneTypes' => StoneType::latest()->filter(request(['search']))->paginate(6)]);
    }

    public function destroy(StoneType $stoneType)
    {
        $stoneType->delete();
        return redirect('/stoneTypes/manage')->with('message', 'StoneType deleted successfully');
    }
}
