@extends('app')

@section('content')

    <h1>Articles</h1>

    <hr/>

    @foreach($articles as $article)

        <article>
            <h2>
                <a href="{{ action('ArticlesController@show',array($article->id)) }}">{{$article->title}}</a>
            </h2>
            <div class="body">
                {{$article->body}}
            </div>
        </article>

    @endforeach

@stop