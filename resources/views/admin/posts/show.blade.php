@extends('layouts.dashboards')

@section('content')
   
        <div class="card">
            <h1> {{$post->title}} </h1>
            <p> {{$post->content}} </p>
            <p> <strong>Slug</strong>: {{$post->slug}} </p>
            <span> Creato il : {{$post->created_at}} </span>
        </div>
        <a href="/admin/posts">
            <h3 class="mt-2">Torna ai post</h3>
        </a>
@endsection