@extends('layouts.app')
@section('content')

<style>
    .pagination{
        justify-content: center;
    }
</style>

    <div class="container-fluid">
        @foreach ($posts as $post)
        <div class="row align-items-center h-100">
            <div class="card col-md-8 mx-auto">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ url('/posts/' . $post->id) }}">
                            {{ $post->title }}
                        </a>
                    </h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{$posts->links()}} <!-- Dar formato para centrarlo --> 

    @auth
    <div class="col-md-12 text-center">
        <a href="{{url('/posts/myPosts')}}" role="button">
            <button type="submit" class="btn btn-info" >
                <b>Acceder a mis publicaciones</b>
            </button>
        </a>
    </div> 
    @endauth

@endsection