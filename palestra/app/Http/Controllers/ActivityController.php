<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::all();
        return view('activities.index', compact('activities'));
    }

    public function show(Activity $activity)
    {
        return view('activities.show', compact('activity'));
    }

    public function create()
    {
        return view('activities.create');
    }

    public function store(Request $request)
    {
        // Validazione dei dati del form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            // Altri campi necessari per l'attività
        ]);

        // Creazione di una nuova attività nel database
        Activity::create($validatedData);

        // Reindirizzamento alla pagina delle attività con un messaggio di successo
        return redirect()->route('activities.index')->with('success', 'Activity added successfully!');
    }

}

