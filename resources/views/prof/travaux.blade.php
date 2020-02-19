@extends('layouts.app')
@section('title', 'Travaux')
@section('content')

<after-navbar></after-navbar>
{{-- <support-cours idprof="{{json_encode($id)}}" chap="{{json_encode($chap)}}" cour="{{json_encode($cours)}}" catcour="{{json_encode($catcour)}}" /> --}}
<travaux catcour="{{json_encode($catcour)}}" ></travaux>
@endsection