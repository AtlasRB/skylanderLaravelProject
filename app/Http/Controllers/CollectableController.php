<?php

namespace App\Http\Controllers;

use App\Models\Collectable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CollectableController extends Controller
{
    public function index(Request $request)
    {
        // If the request method is POST, handle form submission
        if (auth()->user()->is_admin) {
            if ($request->isMethod('post')) {
                // Validate the incoming request data
                $validatedData = $request->validate([
                    'name' => 'required|string|max:255',
                    'type' => 'required|string|in:adventure,magic,variant',
                ]);

                Collectable::create([
                    'name' => $validatedData['name'],
                    'type' => $validatedData['type'],
                ]);

                return redirect()->route('collectables.index')->with('success', 'Collectable added successfully.');
            }
        }

        $collectables = Collectable::orderBy('name', 'asc')->get();
        $userCollectables = Auth::user()->collectables->pluck('id')->toArray();
        $user = auth()->user();

        return view('collectables.index', compact('collectables', 'userCollectables', 'user'));
    }

    public function toggleCollectable(Collectable $collectable)
    {
        $user = Auth::user();

        if ($user->collectables->contains($collectable->id)) {
            $user->collectables()->detach($collectable->id);
        } else {
            $user->collectables()->attach($collectable->id);
        }

        return redirect()->route('collectables.index');
    }

}
