@extends('layouts.admin-panel')

@section('title')
    Reply
@endsection

@section('h1-text')
    Reply
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
                        </tr>
                        </thead>
                        <tbody>
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
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        <!-- /.card -->
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if($review->reply == null)
    <form method="post" action="">
        @csrf
        <div class="form-group">
            <label>Message</label>
            <textarea name="message" class="form-control" rows="5" placeholder="Message"></textarea>
        </div>

        <div class="clearfix float-right">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>
    @else
        <div class="col-14">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $review->reply->message }}</td>
                            <td>
                                <button type="button" onclick="location.href='{{ route('reply.edit', $review->reply->id) }}'" class="btn btn-info">Edit</button>
                                <form action="{{ route('reply.destroy', [$review->reply->id, $review->id]) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this?');" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

@endsection
