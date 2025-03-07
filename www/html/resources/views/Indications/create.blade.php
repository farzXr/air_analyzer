@extends('layouts.main')
@section('content')
    <form action="{{route('indications.store')}}" method="POST">
        @csrf
        @foreach($indicationsColumnNames as $columnName)
            <div class="mb-3">
                <label for="{{$columnName}}" class="form-label">{{$columnName}}</label>
                <input class="form-control" id="{{$columnName}}" aria-describedby="emailHelp" name="{{$columnName}}" value="{{old($columnName)}}">
                @error($columnName)
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
