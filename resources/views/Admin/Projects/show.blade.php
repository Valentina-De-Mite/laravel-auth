@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row align-items-md-stretch">
            <div class="col-md-12 h-100 p-5 text-white bg-primary border rounded-3">
                <div class="row">
                    <div class="d-flex">
                        <img class="img-fluid m-auto rounded shadow " src="{{ $project->cover_image }}" alt="">
                        <div class="ms-3 d-flex flex-column justify-content-center">
                        <h2 class="mb-4">{{ $project->title }}</h2>
                        <p>{{ $project->description }}</p>

                        </div>
                    </div>
                    <div class="col-6">
                        @if ($project->cover_image)
                            
                        @endif
                    </div>
                </div>

            </div>

        </div>
        <div class="row mt-4">
            <div class="col-4 m-auto text-center">
                <a class="btn btn-info text-white" href="{{ route('admin.projects.index') }}">
                    <i class="fa-solid fa-arrow-left"></i></a>
            </div>
        </div>
    </div>

    </div>
@endsection