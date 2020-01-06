@extends('layouts.app')
@section('content')
    @foreach($users as $user)
        <li class="list-group-item">
            <h2 class="blockquote-reverse">
                <a href="/users/{{ $user->id }}">{{ $user->name }}</a>
            </h2>
        </li>
    @endforeach  
@endsection
