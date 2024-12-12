<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Stone;
use App\Models\StoneType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoneController extends Controller
{
    public function index()
    {
        return view("Stone.index", ['stones' => Stone::latest()->filter(request(['tag', 'search']))->paginate(4)]);
    }
    public function show(Stone $stone)
    {
        return view("Stone.show", ['stone' => $stone, 'relatedStones' => Stone::latest()->filter(request(['search']))->take(4)->get()]);
    }

    public function create()
    {
        return view("Stone.create", ['stoneTypes' => $this->getStoneType()]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'Tensile_Strength' => 'required',
            'Water_Absorption_Rate' => 'required',
            'Compressive_Strength' => 'required',
            'Abrasion_Resistance' => 'required',
            'Specific_Weight' => 'required',
            'Failure_Mode' => 'required',
            'Porosity' => 'required',
            'stone_type_id' => 'required'
        ]);


        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('StoneImage', 'public');
        }

        Stone::create($formFields);

        return redirect('/stones/manage')->with('message', 'Stone created successfully!');
    }

    public function edit(Stone $stone)
    {
        return view('Stone.edit', ['stone' => $stone, 'stoneTypes' => $this->getStoneType()]);
    }

    public function update(Request $request, Stone $Stone)
    {

        $formFields = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'Tensile_Strength' => 'required',
            'Water_Absorption_Rate' => 'required',
            'Compressive_Strength' => 'required',
            'Abrasion_Resistance' => 'required',
            'Specific_Weight' => 'required',
            'Failure_Mode' => 'required',
            'Porosity' => 'required',
            'stone_type_id' => 'required'
        ]);


        if ($request->hasFile('image')) {
            // Check if there's an old image and delete it
            if ($Stone->image && Storage::disk('public')->exists($Stone->image)) {
                Storage::disk('public')->delete($Stone->image);
            }

            // Store the new image
            $formFields['image'] = $request->file('image')->store('StoneImage', 'public');
        } else {
            // If no new image is provided, retain the old image path
            $formFields['image'] = $Stone->image;
        }

        $Stone->update($formFields);

        return redirect('/stones/manage')->with('message', 'Stone Updated Successfully!');
    }

    public function manage()
    {
        return view('Stone.manage', ['stones' => Stone::latest()->filter(request(['search']))->paginate(6)]);
    }

    public function destroy(Stone $stone)
    {
        if ($stone->image && Storage::disk('public')->exists($stone->image)) {
            Storage::disk('public')->delete($stone->image);
        }
        $stone->delete();
        return redirect('/stones/manage')->with('message', 'Stone deleted successfully');
    }

    private function getStoneType()
    {
        return StoneType::latest()->get();
    }
}
