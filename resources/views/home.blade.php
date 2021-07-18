@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <div class="container">
        <div class="mb-2 h2">
            Recent
        </div>
        <div class="row mb-2">
            @foreach($articles as $article)
                    <div class="col-md-6">
                        <div class="card flex-md-row mb-4 box-shadow h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <h3 class="mb-0">
                                    <a class="text-dark h5" href="{{ route('article', $article->id) }}">{{ $article->title }}</a>
                                </h3>
                                <div class="mb-1 text-muted">{{ $article->created_at }} <i class="fa fa-eye ml-2 mr-1"></i>{{ $article->views }}</div>
                                <p class="card-text mb-auto">{{ $article->short_description }}</p>
                                <a href="{{ route('article', $article->id) }}">Continue reading</a>
                            </div>
                            <img class="bd-placeholder-img" style="width:250px; height:250px" src="{{ asset('/storage/images')}}/{{ $article->img }}">
                        </div>
                    </div>
            @endforeach

        </div>
        {{ $articles->links() }}
    </div>
@endsection
