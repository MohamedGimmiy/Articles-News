<div class="card-header">
    {!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'PUT', 'files' => true]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title', ['class' => 'awesome']) !!}
        {!! Form::text('title', "$article->title", ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('body', 'Body', ['class' => 'awesome']) !!}
        {!! Form::textarea('body', "$article->body", ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('published_at', 'Published On', ['class' => 'awesome']) !!}
        {!! Form::input('date', 'published_at', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::file('image') !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Edit Article', ['class' => 'btn btn-primary form-control']) !!}
    </div>
        {!! Form::close() !!}
</div>