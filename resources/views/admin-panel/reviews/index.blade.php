@extends('layouts.admin-panel')

@section('title')
    Reviews
@endsection

@section('custom-css')
    <link href="{{ asset('css/admin-panel.css') }}" rel="stylesheet">
@endsection

@section('h1-text')
    All Reviews
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Phone</th>
                                <th class="thd">Message</th>
                                <th>Rating</th>
                                <th>Are Published</th>
                                <th>Article Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($reviews as $review)
                            <tr>
                                <td>{{ $review->id }}</td>
                                <td>{{ $review->full_name }}</td>
                                <td>{{ $review->phone }}</td>
                                <td>{{ $review->message }}</td>
                                <td>
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
                                </td>
                                @if($review->are_published == false)
                                    <td><i class="fa fa-times" aria-hidden="true"></i></td>
                                @else
                                    <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                @endif
                                <td class="thd"><a href="{{ route('article', $review->articles->id) }}">{{ $review->articles->title }}</a></td>
                                <td>
                                    <button type="button" onclick="location.href='{{ route('review.edit', $review->id) }}'" class="btn btn-info">Edit</button>
                                    <button type="button" onclick="location.href='{{ route('reply.create', $review->id) }}'"  class="btn btn-secondary">Reply</button>
                                    <form action="{{ route('review.destroy', $review->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this?');" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- /.card-body -->
            </div>
            {{ $reviews->links() }}
            <!-- /.card -->
        </div>
    </div>
@endsection
