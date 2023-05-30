<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
// use Illuminate\Http\Request;
use Illuminate\Support\Str;




class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.types.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        $received_form = $request->validated();

        $received_form['slug'] = Str::slug($request->type_name);

        $checkType = Type::where('slug', $received_form['slug'])->first();
        if ($checkType) {
            return back()->withInput()->withErrors(['slug' => 'Impossibile creare lo slug per questa tipologia, cambia nome']);
        }

        $newType = Type::create($received_form);

        return redirect()->route('admin.types.index')->with('status', 'nuova tipologia creata con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $received_form = $request->validated();
        $received_form['slug'] = Str::slug($request->type_name, '-');

        $checkType = Type::where('slug', $received_form['slug'])->where('id', '<>', $type->id)->first();
        if ($checkType) {
            return back()->withInput()->withErrors(['slug' => 'impossibile creare lo slug con quel nome']);
        }

        $type->update($received_form);
        return redirect()->route('admin.types.index')->with('status', 'Modifiche apportate correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index')->with('status', 'Tipologia eliminata');
    }
}
