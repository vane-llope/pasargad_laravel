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
        return view("Stone.show", ['stone' => $stone]);
    }


    public function create()
    {
        return view("Stone.create", ['stoneTypes' => $this->getStoneType()]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'code' => 'required',
            'bestselling' => 'required',
            'name_fa' => 'required',
            'name_en' => 'required',
            'tensile_strength_fa' => 'required',
            'tensile_strength_en' => 'required',
            'water_absorption_rate_fa' => 'required',
            'water_absorption_rate_en' => 'required',
            'compressive_strength_fa' => 'required',
            'compressive_strength_en' => 'required',
            'abrasion_resistance_fa' => 'required',
            'abrasion_resistance_en' => 'required',
            'specific_weight_fa' => 'required',
            'specific_weight_en' => 'required',
            'failure_mode_fa' => 'required',
            'failure_mode_en' => 'required',
            'porosity_fa' => 'required',
            'porosity_en' => 'required',
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
            'bestselling' => 'required',
            'name_fa' => 'required',
            'name_en' => 'required',
            'tensile_strength_fa' => 'required',
            'tensile_strength_en' => 'required',
            'water_absorption_rate_fa' => 'required',
            'water_absorption_rate_en' => 'required',
            'compressive_strength_fa' => 'required',
            'compressive_strength_en' => 'required',
            'abrasion_resistance_fa' => 'required',
            'abrasion_resistance_en' => 'required',
            'specific_weight_fa' => 'required',
            'specific_weight_en' => 'required',
            'failure_mode_fa' => 'required',
            'failure_mode_en' => 'required',
            'porosity_fa' => 'required',
            'porosity_en' => 'required',
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

        // dd($formFields);
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
