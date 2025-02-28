@extends('layouts.main')
@section('content')
    @foreach($indications as $indication)
        <div>{{$indication->id}}. {{$indication->name}} : {{$indication->value}} - {{$indication->date}}</div>
    @endforeach
@endsection
