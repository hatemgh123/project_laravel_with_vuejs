@extends('layouts.app')
@section('title', 'Messagers')
@section('content')

<after-navbar-stud></after-navbar-stud>
{{-- <support-cours idprof="{{json_encode($id)}}" chap="{{json_encode($chap)}}" cour="{{json_encode($cours)}}" catcour="{{json_encode($catcour)}}" /> --}}
<messagers-prof :catcours="{{json_encode($catcour)}}"></messagers-prof>
@endsection