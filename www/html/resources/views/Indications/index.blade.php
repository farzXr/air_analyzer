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

@section('air-blocks')
    <section class="u-align-center u-clearfix u-container-align-center u-container-align-center-lg u-container-align-center-md u-container-align-center-xl u-palette-1-light-3 u-valign-top u-section-1" id="sec-719f">
        <div class="u-expanded-width u-shape u-shape-rectangle u-white u-shape-1"></div>
        <div class="custom-expanded u-list u-list-1">
            <div class="u-repeater u-repeater-1">
                <a href="{{route('co.index')}}">
                    <div class="u-align-center u-container-align-center u-container-style u-list-item u-palette-1-base u-radius u-repeater-item u-shape-round u-video-cover u-list-item-1" data-animation-direction="Up" data-animation-name="customAnimationIn" data-animation-duration="1500">
                        <div class="u-container-layout u-similar-container u-valign-bottom u-container-layout-1">
                            <span class="u-align-center u-file-icon u-hover-feature u-icon u-icon-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><img src="images/77.png" alt=""></span>
                            <h4 class="u-align-center u-text u-text-default u-text-1">CO </h4>
                            <h4 class="u-align-center u-text u-text-default u-text-2">0 ppm </h4>
                        </div>
                    </div>
                </a>
                <div class="u-align-center u-container-align-center u-container-style u-list-item u-palette-1-base u-radius u-repeater-item u-shape-round u-video-cover u-list-item-2" data-animation-name="customAnimationIn" data-animation-duration="1500">
                    <div class="u-container-layout u-similar-container u-valign-bottom u-container-layout-2">
                        <span class="u-align-center u-file-icon u-hover-feature u-icon u-icon-2" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><img src="images/wordpress_white.png" alt=""></span>
                        <h4 class="u-align-center u-text u-text-default u-text-3">CO2</h4>
                        <h4 class="u-align-center u-text u-text-default u-text-4">0 ppm </h4>
                    </div>
                </div>
                <div class="u-align-center u-container-align-center u-container-style u-list-item u-palette-1-base u-radius u-repeater-item u-shape-round u-video-cover u-list-item-3" data-animation-direction="Up" data-animation-name="customAnimationIn" data-animation-duration="1500">
                    <div class="u-container-layout u-similar-container u-valign-bottom u-container-layout-3">
                        <span class="u-align-center u-file-icon u-hover-feature u-icon u-icon-3" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><img src="images/react_white.png" alt=""></span>
                        <h4 class="u-align-center u-text u-text-default u-text-5">CH4</h4>
                        <h4 class="u-align-center u-text u-text-default u-text-6">0 ppm</h4>
                    </div>
                </div>
                <div class="u-align-center u-container-align-center u-container-style u-list-item u-palette-1-base u-radius u-repeater-item u-shape-round u-video-cover u-list-item-4" data-animation-direction="Up" data-animation-name="customAnimationIn" data-animation-duration="1500">
                    <div class="u-container-layout u-similar-container u-valign-bottom u-container-layout-4">
                        <span class="u-align-center u-file-icon u-hover-feature u-icon u-icon-4" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><img src="images/html_white.png" alt=""></span>
                        <h4 class="u-align-center u-text u-text-default u-text-7">TVOC</h4>
                        <h4 class="u-align-center u-text u-text-default u-text-8">0 ppm </h4>
                    </div>
                </div>
            </div>
        </div>



        <div class="custom-expanded u-list u-list-2">
            <div class="u-repeater u-repeater-2">
                <div class="u-align-center u-container-align-center u-container-style u-list-item u-palette-1-base u-radius u-repeater-item u-shape-round u-video-cover u-list-item-5" data-animation-direction="Up" data-animation-name="customAnimationIn" data-animation-duration="1500">
                    <div class="u-container-layout u-similar-container u-container-layout-5">
                        <span class="u-align-center u-file-icon u-hover-feature u-icon u-icon-5" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><img src="images/77.png" alt=""></span>
                        <h4 class="u-align-center u-text u-text-default u-text-9">HCHO</h4>
                        <h4 class="u-align-center u-text u-text-default u-text-10">0 ppm </h4>
                    </div>
                </div>
                <div class="u-align-center u-container-align-center u-container-style u-list-item u-palette-1-base u-radius u-repeater-item u-shape-round u-video-cover u-list-item-6" data-animation-name="customAnimationIn" data-animation-duration="1500">
                    <div class="u-container-layout u-similar-container u-container-layout-6">
                        <span class="u-align-center u-file-icon u-hover-feature u-icon u-icon-6" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><img src="images/wordpress_white.png" alt=""></span>
                        <h4 class="u-align-center u-text u-text-default u-text-11">humidity </h4>
                        <h4 class="u-align-center u-text u-text-default u-text-12">0 ppm </h4>
                    </div>
                </div>
                <div class="u-align-center u-container-align-center u-container-style u-list-item u-palette-1-base u-radius u-repeater-item u-shape-round u-video-cover u-list-item-7" data-animation-direction="Up" data-animation-name="customAnimationIn" data-animation-duration="1500">
                    <div class="u-container-layout u-similar-container u-container-layout-7">
                        <span class="u-align-center u-file-icon u-hover-feature u-icon u-icon-7" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><img src="images/react_white.png" alt=""></span>
                        <h4 class="u-align-center u-text u-text-default u-text-13">temp </h4>
                        <h4 class="u-align-center u-text u-text-default u-text-14">0 ppm</h4>
                    </div>
                </div>
                <div class="u-align-center u-container-align-center u-container-style u-list-item u-palette-1-base u-radius u-repeater-item u-shape-round u-video-cover u-list-item-8" data-animation-direction="Up" data-animation-name="customAnimationIn" data-animation-duration="1500">
                    <div class="u-container-layout u-similar-container u-container-layout-8">
                        <span class="u-align-center u-file-icon u-hover-feature u-icon u-icon-8" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><img src="images/html_white.png" alt=""></span>
                        <h4 class="u-align-center u-text u-text-default u-text-15">PM</h4>
                        <h4 class="u-align-center u-text u-text-default u-text-16">0 ppm </h4>
                    </div>
                </div>
            </div>
        </div>




    </section>
@endsection
