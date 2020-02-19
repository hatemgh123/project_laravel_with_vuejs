@extends('layouts.app')
@section('title', 'Etudiant')
@section('content')


<after-navbar-stud></after-navbar-stud>
<support-cours-etud iduser="{{json_encode($id)}}" :list_prof ="{{json_encode($listprof)}}" :list_cat="{{json_encode($listcat)}}" :favorite="{{json_encode($inscetud)}}"  />



@endsection