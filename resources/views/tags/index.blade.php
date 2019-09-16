@extends('main')

@section('title', '| All Tags')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <th>{{ $tag->id }}</th>
                        <td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <div class="well">
                <form action="{{ route('tags.store') }}" method="post">
                    @csrf
                    <label>Name:</label>
                    <input type="text" name="name" class="form-control">
                    <input type="submit" value="Create New Tag" class="btn btn-primary btn-block btn-h1-spacing">
                </form>
                {{--{!! form::open(['route' => 'categories.store', 'method' => 'POST']) !!}--}}

                {{--<h2>New Category</h2>--}}
                {{--{{ form::label('name', 'Name:') }}--}}
                {{--{{ form::text('name', null, ['class' => 'form-control']) }}--}}

                {{--{{ form::submit('Create New Category', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}--}}

                {{--{!! form::close() !!}--}}
            </div>
        </div>
    </div>

@endsection