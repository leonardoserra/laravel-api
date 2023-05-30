<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\Technology;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Requests;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $projects = Project::all();
       $types = Type::all();
       return view('admin.projects.index', compact('projects', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $received_form = $request->validated();
        // dd($received_form);
        $received_form['slug'] = Project::convertIntoSlug($request->title);

        $checkProject = Project::where('slug', $received_form['slug'])->first();
        if ($checkProject) {
            return back()->withInput()->withErrors(['slug' => 'Impossibile creare lo slug per questo post, cambia il titolo']);
        }
        $newProject = Project::create($received_form);

        if($newProject->has('technologies')){
            $newProject->technologies()->attach($request->technologies);
        }

        return redirect()->route('admin.projects.show', ['project' => $newProject->slug])->with('status', 'Post creato con successo!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        {
            $types = Type::all();
            $technologies = Technology::all();
            return view('admin.projects.edit', compact('project','types','technologies'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $received_form = $request->validated();
        $received_form['slug'] = Project::convertIntoSlug($request->title);
        // dd($received_form);
        $checkProject = Project::where('slug', $received_form['slug'])->where('id', '<>', $project->id)->first();

        if ($checkProject) {
            return back()->withInput()->withErrors(['slug' => 'Impossibile creare lo slug']);
        }
        
        $project->technologies()->sync($request->technologies);

        $project->update($received_form);
        return redirect()->route('admin.projects.show', ['project' => $project->slug])->with('status', 'Post modificato con successo!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
