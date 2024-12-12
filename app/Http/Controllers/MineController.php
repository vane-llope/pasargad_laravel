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


        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('MineImage', 'public');

        }


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

        if ($request->hasFile('image')) {
            // Check if there's an old image and delete it
            if ($mine->image && Storage::disk('public')->exists($mine->image)) {
                Storage::disk('public')->delete($mine->image);
            }

            // Store the new image
            $formFields['image'] = $request->file('image')->store('MineImage', 'public');
        } else {
            // If no new image is provided, retain the old image path
            $formFields['image'] = $mine->image;
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
        if ($mine->image && Storage::disk('public')->exists($mine->image)) {
            Storage::disk('public')->delete($mine->image);
        }
        $mine->delete();
        return redirect('/mines/manage')->with('message', 'Mine deleted successfully');
    }

    private function getStoneType()
    {
        return StoneType::latest()->get();
    }

}
