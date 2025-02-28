@extends('layouts.main')
@section('content')
    <form action="{{route('indications.store')}}" method="post">
        @csrf
        @foreach($indicationsColumnNames as $name)
            @if($name !== "created_at" && $name !== 'updated_at' && $name !== 'id')
                <div class="input-create">
                    <label for="{{$name}}">{{$name}}</label>
                    <input type="text" name="{{$name}}">
                </div>
            @endif
        @endforeach
        <button type="submit">Create</button>
    </form>
@endsection
