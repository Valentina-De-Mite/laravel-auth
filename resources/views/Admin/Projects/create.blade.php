@extends('layouts.admin')

@section('content')
    <h1>New project</h1>

    @if ($errors->any())
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Alert</strong>
            <ul>

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">

            <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control"
                        @error('title') is-invalid @enderror placeholder="title" aria-describedby="helperTitle"
                        value="{{ old('title') }}">
                    <small id="helperTitle" class="text-muted">Type your post title (max:50 characters)</small>
                </div>
               

               

                <div class="mb-3">
                    <label for="cover_image" class="form-label">Choose file</label>
                    <input type="file" class="form-control" @error('cover_image') is-invalid @enderror name="cover_image"
                        id="cover_image" placeholder="choose a file" aria-describedby="fileHelp">
                    <div id="fileHelp" class="form-text">Add an image (max 500kb)</div>
                </div>


                <div class="mb-3">
                    <label for="category_id" class="form-label">Categories</label>
                    <select class="form-select" name="" id="">
                        <option selected disabled>Select a Category</option>
                        <option value="">Uncategorized</option>
                        


                        @forelse ($categories as $category)

                            <option value="{{$category->id}}">{{$category->name}}</option>

                        @empty

                        @endforelse
                    </select>
                </div>
                

                <div class="mb-3">
                    <label for="git_link" class="form-label">Git Link</label>
                    <input type="text" name="git_link" id="git_link" class="form-control"
                        @error('git_link') is-invalid @enderror placeholder="GitLink" aria-describedby="helpergit_link"
                        value="{{ old('git_link') }}">
                    <small id="helpergit_link" class="text-muted">Type project git link</small>
                </div>
                @error('git_link')
                    <span class="text-danger">
                        {{ message }}
                    </span>
                @enderror

                <div class="mb-3">
                    <label for="link" class="form-label">External Link</label>
                    <input type="text" name="link" id="link" class="form-control"
                        @error('link') is-invalid @enderror placeholder="Link" aria-describedby="helper_link"
                        value="{{ old('link') }}">
                    <small id="helper_link" class="text-muted">Type your project link</small>
                </div>
                @error('git_link')
                    <span class="text-danger">
                        {{ message }}
                    </span>
                @enderror

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" @error('description') is-invalid @enderror name="description" id="description" rows="3"></textarea>
                </div>
                

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>

    </div>
@endsection