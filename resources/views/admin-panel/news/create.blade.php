@extends('layouts.admin-panel')

@section('title')
    Create News
@endsection

@section('h1-text')
    Create news
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
        <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter Title">
                </div>
                <div class="form-group">
                    <label>Short Description</label>
                    <textarea type="text" class="form-control" name="short_description" placeholder="Enter Short Description"></textarea>
                </div>
                <div class="form-group">
                    <label>Full Description</label>
                    <textarea type="text" class="form-control" name="description" placeholder="Enter Full Description" cols="50" rows="6" wrap="hard"></textarea>
                </div>
                <!--
                <div class="form-group">
                    <label>Add Tags</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter Tags" aria-label="Enter Tags" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" onclick="addTag(this)" type="button">Add</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Added Tags</label>
                    <span class="form-control">hello, bye</span>
                </div>
                -->
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control-file" name="img">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="are_published">
                    <label class="form-check-label" for="are_published">Are Published?</label>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!--
    <script>
        function addTag(tag){
            $tag_str = $(tag).data('tag');
            $article_ = $article;
            $.ajax({
                url:"{{ route('tag.create') }}",
                type: "POST",
                data: {
                    tag_str: $tag_str,
                    article: $article_,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(){
                    console.log('Add');
                }

            });
        }
    </script>
    -->
@endsection
