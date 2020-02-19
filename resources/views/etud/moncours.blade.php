@extends('layouts.app')
@section('title', 'Mon cours')
@section('content')

<after-navbar-stud></after-navbar-stud>


{{-- @if(empty($inscetuds))
@include('etud.inscetud')
@else
<cours-etud chap="{{json_encode($chap)}}" cour="{{json_encode($cours)}}" catcour="{{json_encode($catcour)}}" ></cours-etud>
@endif --}}
<moncours :catcours="{{json_encode($catcour)}}" :profs="{{json_encode($prof)}}" :iduser="{{json_encode(auth()->user()->id)}}"></moncours>

@endsection