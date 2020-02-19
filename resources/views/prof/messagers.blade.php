@extends('layouts.app')
@section('title', 'Messagers')
@section('content')

<after-navbar></after-navbar>
{{-- <support-cours idprof="{{json_encode($id)}}" chap="{{json_encode($chap)}}" cour="{{json_encode($cours)}}" catcour="{{json_encode($catcour)}}" /> --}}
<messagers-prof catcour="{{json_encode($catcour)}}"></messagers-prof>
@endsection