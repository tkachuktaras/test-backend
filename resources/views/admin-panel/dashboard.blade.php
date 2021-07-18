@extends('layouts.admin-panel')

@section('title')
    Dashboard
@endsection

@section('custom-css')
    <link href="{{ asset('css/admin-panel.css') }}" rel="stylesheet">
@endsection

@section('h1-text')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Created At</th>
                                <th>Title</th>
                                <th>Views</th>
                                <th>Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{ $article->created_at }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->views }}</td>
                                <td>{{number_format((float)DB::table('reviews')->where('article_id', $article->id)->avg('rating'), 1, '.', '')}}</td>
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
