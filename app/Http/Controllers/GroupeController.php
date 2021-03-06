<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Capteur;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $groupes = Capteur::all();

      return view('groupes.index', compact('groupes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groupes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
      'code_capteur'=>'required',
      'etab' => 'required'
    ]);

    $groupe = new Capteur([
      'code_capteur' => $request->get('code_capteur'),
      'etab' => $request->get('etab'),
      'type' => 'groupe'
    ]);

    $groupe->save();
    return redirect('/groupes')->with('success','Groupe ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $groupe = Capteur::find($id);
      $groupe->delete();
      return redirect('/groupes')->with('success','Groupe supprimé avec succès');
    }

    public function __construct()
    {
    $this->middleware('auth');
    $this->middleware('capteur');
    $this->middleware('blocage');
}
}
