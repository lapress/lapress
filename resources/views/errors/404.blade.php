@extends('errors::illustrated-layout')

@section('code', '404')
@section('title', ___('Page Not Found'))

@section('image')
    <div style="background-image: url({{ asset('/svg/404.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message', ___('Sorry, the page you are looking for could not be found.'))
