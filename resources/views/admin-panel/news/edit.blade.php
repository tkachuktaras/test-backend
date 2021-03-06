@extends('layouts.admin-panel')

@section('title')
    Edit News
@endsection

@section('h1-text')
    Edit news
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
        <form action="{{ route('article.update', $article->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{ $article->title }}">
                </div>
                <div class="form-group">
                    <label>Short Description</label>
                    <textarea type="text" class="form-control" name="short_description" placeholder="Enter Short Description">{{ $article->short_description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Full Description</label>
                    <textarea type="text" class="form-control" name="description" placeholder="Enter Full Description"  cols="50" rows="6" wrap="hard">{{ $article->description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Short Description</label>
                    <textarea type="text" class="form-control" name="short_description" placeholder="Enter Short Description">{{ $article->short_description }}</textarea>
                </div>



                <div class="form-group">
                    <label>Recent Image</label><br>
                    <img class="form-control" style="width: 150px; height:100px" src="{{ asset('/storage/images')."/".$article->img }}">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control-file" name="img">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="are_published"
                       @if($article->are_published==true)
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

    <div class="card">
        <form action="{{ route('tag.create') }}" method="get">
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <div class="card-body">
                <div class="form-group">
                    <label>Add Tags</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="tag" placeholder="Enter Tags" aria-label="Enter Tags" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" id="add" type="submit">Add</button>
                        </div>
                    </div>
                </div>
        </form>
                <div class="form-group">
                    <label>Added Tags</label>
                    <span class="form-control" id="added-tags">
                        @foreach($article->tags as $tags)
                            #{{$tags->tag}} <a style="color: black;" href="{{ route('tag.delete', $tags->id) }}"><i class="fas fa-times"></i></a>
                        @endforeach
                    </span>
                </div>
            </div>
    </div>
@endsection
