@extends('layouts.section-indication')
@section('content')
    <table class="table">
        <thead>
            <tr>
                @foreach($columnNames as $columnName)
                    <th scope="col">{{$columnName}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
                @foreach($allTable as $row)
                    <tr>
                        @foreach($columnNames as $columnName)
                            <th {{$columnName == 'id' ? 'scope=row' : ''}}>{{$row->$columnName}}</th>
                        @endforeach
                    </tr>
                @endforeach
        </tbody>
    </table>
    <div class="pagination" style="display: flex; justify-content: center">
        {{$allTable->links()}}
    </div>
@endsection

@section('statistic')
    <div id="block-statistic">
        <stat-comp></stat-comp>
    </div>
@endsection

@section('navigation')
    <ul class="menu cf">
        <li>
            <a href="#">Среднее</a>
            <ul class="submenu">
                <li><a href="{{route('co.statistics.avg', '1 hour')}}">Час</a></li>
                <li><a href="{{route('co.statistics.avg', '24 hours')}}">Сутки</a></li>
                <li><a href="{{route('co.statistics.avg', '1 week')}}">Неделя</a></li>
                <li><a href="{{route('co.statistics.avg', '1 month')}}">Месяц</a></li>
                <li><a href="{{route('co.statistics.avg', '1 year')}}">Год</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Максимальное</a>
            <ul class="submenu">
                <li><a href="{{route('co.statistics.max', '1 hour')}}">Час</a></li>
                <li><a href="{{route('co.statistics.max', '24 hours')}}">Сутки</a></li>
                <li><a href="{{route('co.statistics.max', '1 week')}}">Неделя</a></li>
                <li><a href="{{route('co.statistics.max', '1 month')}}">Месяц</a></li>
                <li><a href="{{route('co.statistics.max', '1 year')}}">Год</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Минимальное</a>
            <ul class="submenu">
                <li><a href="{{route('co.statistics.min', '1 hour')}}">Час</a></li>
                <li><a href="{{route('co.statistics.min', '24 hours')}}">Сутки</a></li>
                <li><a href="{{route('co.statistics.min', '1 week')}}">Неделя</a></li>
                <li><a href="{{route('co.statistics.min', '1 month')}}">Месяц</a></li>
                <li><a href="{{route('co.statistics.min', '1 year')}}">Год</a></li>
            </ul>
        </li>
    </ul>
@endsection


