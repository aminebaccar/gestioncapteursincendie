@extends('layouts.app')
<?php use App\Capteur;?>
@section('content')
<style>
  .uper {
    margin-top: 20px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif

<div class="card" style="min-width:50%; width:70%; margin: auto;">
  <div class="card-header">
    <p style="font-size:20px">Historiques
    </p>
  </div>
                  <div class="table-responsive">
                    <div class="container">
                    <table id="id" class="table card-table table-vcenter text-nowrap" style="margin: auto;
  width: 70%;
  padding: 10px;" >
                      <thead>
                        <tr>
                        @if(Auth::user()->usertype=="super")  <th class="w-1">ID.</th> @endif
                          <th>Evenement</th>
                          <th>Date</th>
                          <th>Capteur</th>
                          <th>Utilisateur Consultant</th>
                      @if(Auth::user()->usertype=="super")  <th>Établissement</th> @endif
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($historiques as $historique)
                        <?php $capteur = Capteur::find($historique->capteur); ?>
                        @if(Auth::user()->etab==$capteur['etab'] || Auth::user()->usertype=="super" )

                        <tr>
                          @if(Auth::user()->usertype=="super")<td><span class="text-muted">{{$historique->id}}</span></td>@endif
                          <td>{{$historique->evenement}}</td>
                          <td>
                            {{$historique->created_at}}
                          </td>
                          <td>
                            {{$historique->capteur}}
                          </td>
                          <td> {{$historique->consulte}}
                        @if(Auth::user()->usertype=="super")  <td>
                            {{$capteur['etab']}}
                          </td> @endif
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
@endsection