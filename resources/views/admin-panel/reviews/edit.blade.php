@extends('layouts.admin-panel')

@section('title')
    Edit Review
@endsection

@section('custom-css')
    <link href="{{ asset('css/rating-stars.css') }}" rel="stylesheet">
@endsection

@section('h1-text')
    Edit Review
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('review.update', $review->id) }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Full name</label>
                    <input type="text" class="form-control" name="full_name" placeholder="Enter Full Name" value="{{ $review->full_name }}">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="Enter Phone" value="{{ $review->phone }}">
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea type="text" class="form-control" name="message" placeholder="Enter Message"  cols="50" rows="6" wrap="hard">{{ $review->message }}</textarea>
                </div>
                <div class="mb-5 float-r">
                    <label>Rating</label>
                    <br>
                    <input class="star star-5" id="star-5" value="star-5" type="radio" name="star"
                        @if($review->rating == 5)
                            checked
                        @endif
                    /> <label class="star star-5" for="star-5"></label>
                    <input class="star star-4" id="star-4" value="star-4" type="radio" name="star"
                       @if($review->rating == 4)
                           checked
                       @endif
                    /> <label class="star star-4" for="star-4"></label>
                    <input class="star star-3" id="star-3" value="star-3" type="radio" name="star"
                       @if($review->rating == 3)
                           checked
                       @endif
                    /> <label class="star star-3" for="star-3"></label>
                    <input class="star star-2" id="star-2" value="star-2" type="radio" name="star"
                       @if($review->rating == 2)
                           checked
                       @endif
                    /> <label class="star star-2" for="star-2"></label>
                    <input class="star star-1" id="star-1" value="star-1" type="radio" name="star"
                       @if($review->rating == 1)
                           checked
                       @endif
                    /> <label class="star star-1" for="star-1"></label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="are_published"
                       @if($review->are_published==true)
                            checked
                       @endif>
                    <label class="form-check-label" for="are_published">Are Published?</label>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
