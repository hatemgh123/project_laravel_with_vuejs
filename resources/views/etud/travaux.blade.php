@extends('layouts.app')
@section('title', 'Travaux')
@section('content')

<after-navbar-stud></after-navbar-stud>
{{-- <support-cours idprof="{{json_encode($id)}}" chap="{{json_encode($chap)}}" cour="{{json_encode($cours)}}" catcour="{{json_encode($catcour)}}" /> --}}
<travaux :catcours="{{json_encode($catcour)}}"></travaux>
@endsection