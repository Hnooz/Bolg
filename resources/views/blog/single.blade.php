@extends('main')
<?php $titleTag = htmlspecialchars($post->title);?>
@section('title', "| $titleTag ")

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <img src="{{ asset('images/'. $post->image) }}" alt="">
            <h1>{{ $post->title }}</h1>
            <p>{!!  $post->body  !!}</p>
            <hr>
            <p>Posted In: {{ $post->category->name }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3 class="comment-title"><span class=""></span> {{ $post->comments()->count() }} Comments</h3>
            @foreach($post->comments as $comment)
                <div class="comment">
                    <div class="author-info">
                        <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=mm" }}" class="author-image">

                        <div class="author-name">
                       <h4>{{ $comment->name }}</h4>
                       <p class="author-time"> {{ date('F nS- Y- g:iA' ,strtotime($comment->created_at)) }}</p>
                        </div>

                    </div>
                    <div class="comment-content">
                        {{ $comment->comment }}
                    </div>
                </div>
                @endforeach
        </div>
    </div>
    <div class="row">
        <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
{{--            {!!   form::open(['route' => ['comments.store' , $post->id], 'method' => 'post']) !!}--}}
            {!! Form::open(['route'=>['comment.store', $post->id],'method'=>'POST']) !!}
            <div class="row">
                <div class="col-md-6">
                    {{ form::label('name', "Name:") }}
                    {{ form::text('name', null, ['class' => 'form-control']) }}
                </div>
                <div class="col-md-6">
                    {{ form::label('email', "Email:") }}
                    {{ form::text('email', null, ['class' => 'form-control']) }}
                </div>
                <div class="col-md-12">
                    {{ form::label('comment', "Comment:") }}
                    {{ form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

                    {{ form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
                </div>
            </div>
            {!! form::close() !!}
        </div>
    </div>

@endsection