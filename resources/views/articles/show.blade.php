@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="pb-3 mb-4 font-italic border-bottom">{{$article->title }}</h3> by
                    <p>{{ $article->user->name }}</p>
                </div>
                <div class="panel-body">
                <li class="list-group-item">{{ $article->body }}</li>
                    Tags:
                @foreach($tags as $tag)
                {{ $tag->tag }}...
                @endforeach
                <li class="list-group-item-info">Other Articles by
                <p>
                <a href="/users/{{ $article->user_id }}/articles">{{ $article->user->name }}</a>
                </p>
                This user belongs to {{ $country->name }}<p></p>
                </li>
                <h3 class="blog-post">
                All articles from {{ $country->name }}
                </h3>
                @foreach($country->articles as $article)
                <li class="list-group-item">
                <a href="/articles/{{ $article->id }}">
                {{ $article->title }}
                </a>
                </li>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
@endsection