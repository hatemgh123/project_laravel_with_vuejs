@extends('layouts.app')
@section('title', 'Enseignant')
@section('content')

<after-navbar></after-navbar>
<cours chap="{{json_encode($chap)}}" cour="{{json_encode($cours)}}"  cour-id="{{json_encode($cours_id)}}"></cours>

@endsection