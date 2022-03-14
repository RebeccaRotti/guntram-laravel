<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\Companies;
use App\Models\States;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('project.index')->with([
            'projects' => Projects::get(),
            'companies' => Companies::get(),
            'states' => States::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'addTitle' => 'required|string|max:150',
            'addDescription' => 'required|string',
            'addRelease' => 'sometimes|nullable|string',
        ]);
        $state = States::findOrFail($request->addState);
        $company = Companies::findOrFail($request->addCompany);
        $new = new Projects();
        $new->title = $request->addTitle;
        $new->description = $request->addDescription;
        $new->release = $request->addRelease;
        $new->state_id = $state->id;
        $new->company_id = $company->id;
        $new->save();
        return back()->with('success', 'Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Projects::findOrFail($id);
        return view('project.modal.edit')->with([
            'project' => $project,
            'companies' => Companies::get(),
            'states' => States::get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request->validate([
            'editTitle' => 'required|string|max:150',
            'editDescription' => 'required|string',
            'editRelease' => 'sometimes|nullable|string',
        ]);
        $state = States::findOrFail($request->editState);
        $company = Companies::findOrFail($request->editCompany);
        $new = Projects::findOrFail($id);
        $new->title = $request->editTitle;
        $new->description = $request->editDescription;
        $new->release = $request->editRelease;
        $new->state_id = $state->id;
        $new->company_id = $company->id;
        $new->save();
        return back()->with('success', 'Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
