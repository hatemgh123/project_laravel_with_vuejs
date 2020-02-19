@extends('layouts.app')
@section('title', 'Etudiant')
@section('content')

<after-navbar-stud></after-navbar-stud>


@if(empty($inscetuds))
@include('etud.inscetud')
@else
<cours-etud :chaps="{{json_encode($chap)}}" :cours="{{json_encode($cours)}}" :catcours="{{json_encode($catcour)}}" ></cours-etud>
@endif
@endsection