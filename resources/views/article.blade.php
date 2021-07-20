@extends('layouts.app')

@section('title')
    {{ $article->title }}
@endsection

@section('custom-css')
    <link href="{{ asset('css/full-article.css') }}" rel="stylesheet">
    <link href="{{ asset('css/rating-stars.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="container pb20">
        <div class="row">
            <article>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <ul class="post-meta list-inline">
                    <li class="list-inline-item">
                        <i class="fas fa-long-arrow-alt-left"></i><a href="{{ asset('/') }}">Back to home</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">{{ $article->title }}</a>
                    </li>
                </ul>
                <h2>{{ $article->title }}</h2>
                <img src="{{ asset('/storage/images') }}/{{ $article->img }}" alt="" class="mb30" style="width: 100%;">
                <div class="post-content">

                    <ul class="post-meta list-inline">
                        <li class="list-inline-item">
                            <i class="fa fa-user-circle-o"></i> <a href="#">Admin</a>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-calendar-o"></i> <a href="#">{{ $article->updated_at }}</a>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-eye"></i><a href="#">{{ $article->views }}</a>
                        </li>
                        @if($article->tags->isNotEmpty())
                            <li class="list-inline-item">
                                <i class="fa fa-hashtag"></i>
                                @foreach($article->tags as $tag)
                                    <a href="#">{{$tag->tag}}</a>
                                @endforeach
                            </li>
                        @endif
                        <li class="list-inline-item">
                            @if($round_avg == 5)
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            @endif
                            @if($round_avg == 4)
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            @endif
                            @if($round_avg == 3)
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            @endif
                            @if($round_avg == 2)
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            @endif
                            @if($round_avg == 1)
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            @endif
                            @if($round_avg == 0)
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            @endif
                            {{ number_format((float)$avg, 1, '.', '') }}
                        </li>
                    </ul>
                    <p>{{ $article->short_description }}</p>
                    <p class="lead">{!! $article->description  !!}</p>
                    @if($article->reviews->isNotEmpty())
                    <hr class="mb40">
                        <div class="mb-5 mt-5">
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-center mb-3"> Reviews </h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                            @foreach($article->reviews as $review)
                                                    <div class="media mb-4"> <i class=" mr-3 fa fa-user-circle fa-3x text-primary" aria-hidden="true"></i>
                                                        <div class="media-body">
                                                            <div class="row">
                                                                <div class="col-11 d-flex">
                                                                    <h5>{{ $review->full_name }}</h5>
                                                                    <div class="ml-1">
                                                                        @if($review->rating == 5)
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                        @endif
                                                                        @if($review->rating == 4)
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="far fa-star"></i>
                                                                        @endif
                                                                        @if($review->rating == 3)
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="far fa-star"></i>
                                                                            <i class="far fa-star"></i>
                                                                        @endif
                                                                        @if($review->rating == 2)
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="far fa-star"></i>
                                                                            <i class="far fa-star"></i>
                                                                            <i class="far fa-star"></i>
                                                                        @endif
                                                                        @if($review->rating == 1)
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="far fa-star"></i>
                                                                            <i class="far fa-star"></i>
                                                                            <i class="far fa-star"></i>
                                                                            <i class="far fa-star"></i>
                                                                        @endif
                                                                        @if($review->rating == 0)
                                                                            <i class="far fa-star"></i>
                                                                            <i class="far fa-star"></i>
                                                                            <i class="far fa-star"></i>
                                                                            <i class="far fa-star"></i>
                                                                            <i class="far fa-star"></i>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                @if(Auth::check() && $review->reply == null)
                                                                    <div>
                                                                        <div class="pull-right reply"> <a href="{{ route('reply.create', $review->id) }}"><span><i class="fa fa-reply"></i> reply</span></a> </div>
                                                                    </div>
                                                                @endif
                                                            </div>{{ $review->message }}
                                                        <!------------->
                                                            @if($review->reply != null)
                                                            <div class="media mt-3">
                                                                <i class=" mr-3 fa fa-user-circle fa-3x text-primary" aria-hidden="true"></i>
                                                                <div class="media-body">
                                                                    <div class="row">
                                                                        <div class="col-12 d-flex">
                                                                            <h5>Admin</h5>
                                                                        </div>
                                                                    </div>{{ $review->reply->message }}
                                                                </div>
                                                            </div>
                                                            @endif
                                                        <!------------->
                                                        </div>
                                                    </div>
                                            @endforeach
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <hr class="mb40">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h4 class="mb40 text-uppercase font500">Post a review</h4>
                    <form method="post" action="{{ route('review.store', $article->id) }}">
                        @csrf
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="full_name" class="form-control" placeholder="Enter Full Name">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input id="phone" name="phone" class="form-control phone" placeholder="(050) 777-77-77" type="tel"/>
                        </div>
                        <div class="mb-5 float-r">
                            <label>Rating</label>
                            <br>
                            <input class="star star-5" id="star-5" value="star-5" type="radio" name="star" /> <label class="star star-5" for="star-5"></label>
                            <input class="star star-4" id="star-4" value="star-4" type="radio" name="star" /> <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" id="star-3" value="star-3" type="radio" name="star" /> <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" id="star-2" value="star-2" type="radio" name="star" /> <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" id="star-1" value="star-1" type="radio" name="star" /> <label class="star star-1" for="star-1"></label>
                        </div>


                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="message" class="form-control" rows="5" placeholder="Message"></textarea>
                        </div>

                        <div class="clearfix float-right">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
            </article>
        </div>
    </div>

    @if($previous != null)
        <div class="arrow_right">
            <a href="{{ route('article', $previous->id) }}"><i class="fas fa-angle-right"></i></a>
        </div>
    @endif

    @if($next != null)
        <div class="arrow_left">
            <a href="{{ route('article', $next->id) }}"><i class="fas fa-angle-left"></i></a>
        </div>
    @endif
@endsection
