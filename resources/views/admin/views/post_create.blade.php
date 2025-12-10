@extends('admin.adminlayout.admin')

@section('title', 'Post Create')

@section('content')


    <div class="container-fluid pt-4 px-4">

        <div class="row vh-60 bg-light rounded align-items-center justify-content-center mx-0 p-4">


            <div class="mb-5">
                <form id="postForm" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3 ">
                        <label for="title">Title:</label>
                        <div class="mt-3">
                            <input type="text" id="title" name="title" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="status">Status:</label>
                        <div class="mt-3">
                            <select class="form-control" name="status" id="status">
                                <option value="public" selected>Public</option>
                                <option value="private">Private</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Upload Image:</label>
                        <div class="mt-3">

                            <input class="form-control" name="image" type="file" id="formFile" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Post</button>
                </form>
            </div>


            <div class="mb-4 mt-5 ">
                <div id="fetch_All_posts">

                </div>

            </div>
        </div>
    </div>

@endsection