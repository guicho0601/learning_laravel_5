@extends('app')

@section('content')

    <h1>Write a new Article</h1>
    <hr>

    <?= Form::model($article = new \App\Article(),array('url'=>'articles')) ?>

    @include('articles.form',array('submitButton'=>'Add Article'))

    <?= Form::close() ?>

@include('errors.list')

@stop