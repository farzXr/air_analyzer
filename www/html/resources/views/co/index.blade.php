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
    <div style="text-align: center;" class="u-align-center u-container-align-center u-container-style u-list-item u-palette-1-base u-radius u-repeater-item u-shape-round u-video-cover u-list-item-1" data-animation-direction="Up" data-animation-name="customAnimationIn" data-animation-duration="1500">
        <div class="u-container-layout u-similar-container u-valign-bottom u-container-layout-1">
            <span class="u-align-center u-file-icon u-hover-feature u-icon u-icon-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><img src="images/77.png" alt=""></span>
            <h4 class="u-align-center u-text u-text-default u-text-1"></h4>
            <h4 class="u-align-center u-text u-text-default u-text-2"></h4>
        </div>
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


