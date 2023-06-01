<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        //faccio query che chiama da tabella projects tutti i record incluse le relazioni
        $projects = Project::with(['type', 'technologies'])->get(); //all();

        //ritorno un json perché é un api
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->with(['type', 'technologies'])->first();

        if ($project) {
            return response()->json([
                'success' => true,
                'project' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Errore 404. La pagina richiesta non è presente'
            ]);
        }
    }
}
