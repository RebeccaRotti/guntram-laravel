<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\States;

class StateController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('states.index')->with([
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
            'stateTitle' => 'required|string'
        ]);
        $newState = new States();
        $newState->state = $request->stateTitle;
        $newState->save();
        return back()->with('success', 'Abgespeichert');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $state = States::findOrFail($id);
        return view('states.modal.edit')->with([
            'state' => $state
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
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
            'inputState' => 'required|string|max:45'
        ]);
        $state = States::findOrFail($id);
        $state->state = $request->inputState;
        $state->save();
        return back()->with('success', 'Update erfolgreich');
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
