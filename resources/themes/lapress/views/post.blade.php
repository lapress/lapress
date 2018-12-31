@extends('lapress::layout')

@section('content')
    <article class="pb-20">
        <header class="p-6 -mt-20 bg-white relative z-10 w-3/4">
            <h1>{{ $post->post_title }}</h1>
        </header>
        <div class="p-8">
            {!! $post->body !!}
        </div>
    </article>
@stop
