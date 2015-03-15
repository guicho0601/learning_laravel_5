<div class="form-group">
    <?= Form::label('title','Title:') ?>
    <?= Form::text('title',null,array('class'=>'form-control')) ?>
</div>

<div class="form-group">
    <?= Form::label('body','Body:') ?>
    <?= Form::textarea('body',null,array('class'=>'form-control')) ?>
</div>

<div class="form-group">
    <?= Form::label('published_at','Publish on:') ?>
    <?= Form::input('date','published_at',$article->published_at,array('class'=>'form-control')) ?>
</div>

<div class="form-group">
    <?= Form::label('tag_list','Tags') ?>
    <?= Form::select('tag_list[]',$tags,null,array('id'=>'tag_list','class'=>'form-control','multiple')) ?>
</div>

<div class="form-group">
    <?= Form::submit($submitButton,array('class'=>'btn btn-primary form-control')) ?>
</div>

@section('footer')
    <script>
        $('#tag_list').select2({
            placeholder:'Choose a tag',
            tags: true
        });
    </script>
@stop