@extends('main')
@section('title','| Edit Blog Post')

@section('stylesheets')

    {!! Html::style('css/select2.min.css') !!}
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

@endsection


@section('content')

    <div class="row">
        {!! Form::model($post ,['route'=>['posts.update',$post->id],'method'=>'PUT', 'files' => true ]) !!}
        <div class="col-md-8">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ["class"=>'form-control input-lg']) !!}

            {{ Form::label('slug','slug:',['class'=>'form-spacing-top']) }}
            {{ Form::text('slug',null ,['class'=>'form-control','required'=>'','minlength'=>'5','maxlength'=>'255']) }}

            {{ form::label('category_id', "Category:",['class'=>'form-spacing-top']) }}
            {{ form::select('category_id', $categories, null, ['class' => 'form-control']) }}

            {{ form::label('tags', 'Tags:',['class'=>'form-spacing-top']) }}
            {{ form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple']) }}

            {{ Form::label('featured_image', 'Update featured Image:', ['class' => 'form-spacing-top']) }}
            {{ Form::file('featured_image') }}

            {!! Form::label('body', 'Body:',['class'=>'form-spacing-top']) !!}
            {!! Form::textarea('body', null,['class'=>'form-control']) !!}
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{ date( 'M j- Y h:ia' ,strtotime($post->created_at)) }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Update:</dt>
                    <dd>{{ date( 'M j- Y h:ia' ,strtotime($post->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show','Cancel', array($post->id), array('class'=>'btn btn-danger btn-block')) !!}
                        {{--<a href="#" class="btn btn-primary btn-block">Edit</a>--}}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::submit('Save Changes',['class'=>'btn btn-success btn-block']) !!}
                        {{--{!! Html::linkRoute('posts.update','Save Changes', array($post->id), array('class'=>'btn btn-success btn-block')) !!}--}}
                        {{--<a href="#" class="btn btn-danger btn-block">Delete</a>--}}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection

@section('scripts')

    {!! Html::script('js/select2.min.js') !!}
    <script type="text/javascript">
        $('.select2-multi').select2();
        {{--$('.select2-multi').select2().val({!! json_decode($post->tags()->getRelatedIds()) !!}).trigger('change')--}}
    </script>

@endsection