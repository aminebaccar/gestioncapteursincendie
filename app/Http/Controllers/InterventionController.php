<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Intervention;
use Auth;

class InterventionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $interventions = Intervention::all();

      return view('interventions.index', compact('interventions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interventions.create');
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
        'commentaire'=>'required'

    ]);
    $user = $request->get('email');
    $type = $request->get('type');
    $capteur = $request->get('capteur');
    $groupe = Capteur::find($capteur['parent']);

    $egalite = $user['etab']==$type['etab'] && $type['etab']==$groupe['etab'];

    if($egalite){
    $intervention = new Intervention([
      'type' => $request->get('type'),
      'commentaire' => $request->get('commentaire'),
      'user' => $request->get('email'),
      'capteur' => $request->get('capteur')
    ]);

    $intervention->save();
    return redirect('/interventions');
    }
    else {
      return redirect('/interventions/create')->with('error',"Le capteur, l'utilisateur et le type d'intervention doivent tous avoir la même établisement");
    }
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
        //
    }

    public function __construct()
{
    $this->middleware('auth');
}
}
