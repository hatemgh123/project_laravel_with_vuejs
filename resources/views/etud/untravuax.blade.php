@extends('layouts.app')
@section('title', 'Travaux')
@section('content')

<after-navbar-stud></after-navbar-stud>
<un-travaux-etud :trvaux="{{json_encode($travaux)}}" :id_cat="{{json_encode($cours_id)}}" :catcours="{{json_encode($catcour)}}" :trvetuds="{{json_encode($trvetud)}}" :iduser="{{json_encode(auth()->user()->id)}}" ></un-travaux-etud>

@endsection