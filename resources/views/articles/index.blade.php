@extends('layouts.app')
@section('content')

{{-- session name is status --}}
@if (session('status'))
    <div class="alert alert-success">
    {{ session('status') }}
    </div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-6 blog-main col-lg-6 blog-main col-sm-6 blog-main">
            <div class="blog-post">
                <ul class="list-group">
                    @foreach($articles as $article)
                        <li class="list-group-item">
                            <h2 class="blog-post-title">
                            <li class="list-group-item">
                                <a href="/articles/{{$article->id }}">{{ $article->title }}</a>
                            </h2>
                        </li>
                    @endforeach
                    {{ $articles->render() }}
                </ul>
            </div>
            <nav class="blog-pagination">
            </nav>
        </div>
        <aside class="col-md-3 blog-sidebar">
            <div class="p-3">
                <h4 class="font-italic">All Writers</h4>
                @foreach($users as $user)
                    <a href="/users/{{ $user->id }}">{{ $user->name }}</a>...
                @endforeach
            </div>
        </aside>
        <aside class="col-md-3 blog-sidebar">
            <div class="p-3">
                <h4 class="font-italic">Tags-Cloud</h4>
                    @foreach($tags as $tag)
                        <a href="/tags/{{ $tag->id }}">{{ $tag->tag }}</a>...
                    @endforeach
            </div>
        </aside>
    </div>
</div>
@endsection