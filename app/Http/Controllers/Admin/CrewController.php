<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CrewController extends Controller
{
    public function index()
    {
        $crews = Crew::latest()->paginate(10);
        return view('admin.crews.index', compact('crews'));
    }

    public function create()
    {
        return view('admin.crews.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('crew', 'public');
        }

        Crew::create($data);

        return redirect()->route('admin.crews.index')->with('success', 'Crew added successfully');
    }

    public function edit(Crew $crew)
    {
        return view('admin.crews.edit', compact('crew'));
    }

    public function update(Request $request, Crew $crew)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($crew->photo && Storage::disk('public')->exists($crew->photo)) {
                Storage::disk('public')->delete($crew->photo);
            }
            $data['photo'] = $request->file('photo')->store('crew', 'public');
        }

        $crew->update($data);

        return redirect()->route('admin.crews.index')->with('success', 'Crew updated successfully');
    }

    public function destroy(Crew $crew)
    {
        if ($crew->photo && Storage::disk('public')->exists($crew->photo)) {
            Storage::disk('public')->delete($crew->photo);
        }
        $crew->delete();
        return back()->with('success', 'Crew deleted successfully');
    }
}
