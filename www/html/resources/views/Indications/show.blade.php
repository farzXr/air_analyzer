@extends('layouts.main')
@section('content')
    <div class="param-list">
        @foreach($columnName as $name)
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item">{{$name}}</li>
                <li class="list-group-item">{{$indications->$name}}</li>
            </ul>
        @endforeach
    </div>
    <a href="{{route('indications.index')}}">Back</a>
@endsection
