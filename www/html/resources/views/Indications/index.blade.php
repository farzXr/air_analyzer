@extends('layouts.main')
@section('content')
    <table class="table">
        <thead>
        <tr>
            @foreach($indicationsColumnNames as $name)
                @if($name != 'created_at' && $name != 'updated_at')
                    <th scope="col">{{$name}}</th>
                @endif
            @endforeach
                <th>Btn</th>
                <th>Btn</th>
        </tr>
        </thead>
        <tbody>
            @foreach($indications as $indication)
                <tr>
                @foreach($indicationsColumnNames as $name)
                    @if($name != 'created_at' && $name != 'updated_at')
                        <th>{{$indication->$name}}</th>
                    @endif
                @endforeach
                <th>
                    <form action="{{route('indications.edit', $indication->id)}}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-info">Edit</button>
                    </form>
                </th>
                </th>
                <th>
                    <form action="{{route('indications.destroy', $indication->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </th>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="btn-create">
        <form action="{{route('indications.create')}}" method="GET">
            @csrf
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
@endsection
