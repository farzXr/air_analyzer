@extends('layouts.main')
@section('content')
    <form action="{{route('indications.update', $indications->id)}}" method="POST">
        @csrf
        @method('PUT')
        @foreach($tableColumnNames as $columnName)
            <div class="mb-3">
                <label for="{{$columnName}}" class="form-label">{{$columnName}}</label>
                <input class="form-control" id="{{$columnName}}" aria-describedby="emailHelp" name="{{$columnName}}" value="{{$indications->$columnName}}">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
