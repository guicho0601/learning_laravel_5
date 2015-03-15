@extends('app')

@section('content')

<?= Form::open(array('url'=>'login')) ?>

    <div class="form-group">
        <?=Form::label('email','Correo:')?>
        <?=Form::text('email',null,array('class'=>'form-control'))?>
    </div>

    <?=Form::submit('Iniciar sesion',array('class'=>'btn btn-success'))?>

<?= Form::close() ?>

@stop