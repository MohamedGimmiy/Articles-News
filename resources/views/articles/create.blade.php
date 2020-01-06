@extends('layouts.app')
@section('content')
<h1>Create Article</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card-header">
    {!! Form::open(['url' => 'articles','method' => 'post', 'files' => true]) !!}
    <div class="form-group">
    {!! Form::label('title', 'Title', ['class' => 'awesome']) !!}
    {!! Form::text('title', 'Give a good title', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('body', 'Body', ['class' => 'awesome']) !!}
    {!! Form::textarea('body', 'Write your article Content', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('published_at', 'Published On', ['class' => 'awesome']) !!}
    {!! Form::input('date', 'published_at', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::file('image') !!}
    </div>
    <div class="form-group">
    {!! Form::submit('Add Article', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
    </div>
    @endsection
