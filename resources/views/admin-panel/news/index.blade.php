@extends('layouts.admin-panel')

@section('title')
    News
@endsection

@section('custom-css')
    <link href="{{ asset('css/admin-panel.css') }}" rel="stylesheet">
@endsection

@section('h1-text')
    All News
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
                                <th class="thd">Title</th>
                                <th>Image</th>
                                <th class="thd">Short Description</th>
                                <th>Are Published</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td class="thd">{{ $article->title }}</td>
                                <td><img style="height: 100px; width: 100px" src="{{ asset('/storage/images/')}}/{{ $article->img }}"></td>
                                <td class="thd">{{ $article->short_description }}</td>
                                @if($article->are_published == false)
                                    <td><i class="fa fa-times" aria-hidden="true"></i></td>
                                @else
                                    <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                @endif
                                <td>{{ $article->created_at }}</td>
                                <td>{{ $article->updated_at }}</td>
                                <td class="">
                                    <button type="button" onclick="location.href='{{ route('article.edit', ['id' => $article->id]) }}'" class="btn btn-info">Edit</button>
                                    <form action="{{ route('article.destroy', $article->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this?');" style="display: inline;">
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
            {{ $articles->links() }}
            <!-- /.card -->
        </div>
    </div>
@endsection
