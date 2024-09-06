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
    public function index(): View
    {
        $collectables = Collectable::all();
        $userCollectables = Auth::user()->collectables->pluck('id')->toArray();

        return view('collectables.index', compact('collectables', 'userCollectables'));
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
