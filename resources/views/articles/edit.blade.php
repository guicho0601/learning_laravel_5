@extends('app')

@section('content')

<h1>Edit: <?=$article->title?></h1>
<hr>

<?= Form::model($article,array('method'=>'PATCH','action'=>array('ArticlesController@update',$article->id))) ?>

@include('articles.form',array('submitButton'=>'Update Article'))

<?= Form::close() ?>

@include('errors.list')

@stop
