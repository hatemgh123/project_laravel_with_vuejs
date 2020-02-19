@extends('layouts.app')
@section('title', 'Travaux')
@section('content')

<after-navbar></after-navbar>
<un-travaux trav="{{json_encode($travaux)}}" cour-id="{{json_encode($cours_id)}}"></un-travaux>

@endsection