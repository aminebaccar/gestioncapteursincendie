@extends('layouts.app')
<?php use App\Capteur;

?>
@section('content')
<style>
  .uper {
    margin-top: 20px;
  }
  .card-header {
   display: block;

}
.form-button {
	background: none;
	color: inherit;
	border: none;
	padding: 0;
	font: inherit;
	cursor: pointer;
	outline: inherit;
}

</style>
  @if (Auth::user()->usertype=="super")
<script type="text/javascript">

$(document).ready(function() {
  $('#example').DataTable( {
  } );
} );
</script>
@else
<script type="text/javascript">

$(document).ready(function() {
  $('#example').DataTable( {
      order: [[2, 'asc']],
      rowGroup: {
          dataSrc: 2
      },
      "columnDefs": [
            {
                "targets": [ 2 ],
                "visible": false,
                "searchable": false
            }
             ]
  } );
} );
</script>
@endif

<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
<input type="hidden" id="logged" name="loggedin" value="{{Auth::user()->email}}"/>
<div class="card" style="width:90%; margin: auto;">
  <div class="card-header">
    <p style="font-size:20px">Capteurs
    <span class="float-right" ><a href="groupes/create" style="font-size:14px;" class="btn btn-outline-secondary btn-sm" >Ajouter Capteur +</a>
    </span></p>
  </div>
                  <div class="table-responsive">
                    <div class="container">
                    <table id="example" class="table card-table table-vcenter text-nowrap" style="margin: auto;
  width: 100%;
  padding: 10px;" >
                      <thead>
                        <tr>
                        @if(Auth::user()->usertype == "super")  <th class="w-1">ID.</th> @endif
                          <th>Groupe</th>
                          <th>Quantité</th>
                        @if (Auth::user()->usertype == "super") <th> Établissement</th> @endif
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($groupes as $groupe)
                          <tr>
                            @if(Auth::user()->usertype=="super")<td><span class="text-muted">{{$groupe->id}}</span></td>@endif
                              <td>{{$groupe->code_capteur}}</td>
                              <td>10</td>
                            @if(Auth::user()->usertype=="super")<td>{{$groupe->etab}}</td>@endif
                          <td>
                            <form action="{{ route('groupes.destroy', $groupe->id) }}" method="POST">
{{ method_field('DELETE') }}
{{ csrf_field() }}
<button type='submit' class="btn btn-danger" style="	background: none;
	color: #9aa0ac;
	border: none;
	padding: 0;
	font: inherit;
	cursor: pointer;
	outline: inherit;" ><i class="fe fe-trash-2" style="color: inherit;" ></i></button>
</form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
@endsection
