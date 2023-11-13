@extends('layouts.admin')

@section('content')

<div class="container mt-5">
@if (session('message'))
<div class="alert alert-success">
    {{session('message')}}

</div>

@endif
    <div>
        <h4>Add Content 
            <button class="btn btn-primary py-1 px-3 ms-5"><a href="{{ route('admin.projects.create') }}" class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
</svg></a></button>
        </h4>
    </div>
<div class="card-body">


                        <div class="table-responsive">
                            <table
                                class="table table-striped
                            table-hover	
                            table-borderless
                            table-dark
                            align-middle">
                                <thead class="table-light">
                                    <caption>All Projects</caption>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">TITLE</th>
                                        <th class="text-center">IMAGE</th>
                                        <th class="text-center">GIT LINK</th>
                                        <th class="text-center">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @forelse ($projects as $project)
                                        <tr class="table-primary">
                                            <td class="text-center m-auto" scope="row">{{ $project->id }}</td>
                                            <td class="text-center m-auto">{{ $project->title }}</td>
                                            <td class="text-center m-auto">
                                            <img class="img-fluid w-50" src="{{ $project->cover_image }}" alt=""> 
                                            </td>
                                            <td class="text-center m-auto"><a
                                                    href="{{ $project->git_link }}">{{ $project->git_link }}</a>
                                            </td>
                                            <td class="text-center m-auto">

                                                <a class="btn btn-success"
                                                    href="{{ route('admin.projects.show', $project) }}">
                                                    <i class="fa-solid fa-eye text-white"></i>
                                                </a>
                                                <a class="btn btn-warning"
                                                    href="{{ route('admin.projects.edit', $project) }}">
                                                    <i class="fa-solid fa-pencil text-white"></i></a>
                                                <!-- Modal trigger button -->
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#modalId-{{ $project->id }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>

                                                <!-- Modal Body -->
                                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                                <div class="modal fade" id="modalId-{{ $project->id }}" tabindex="-1"
                                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                                    aria-labelledby="modalTitleId" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalTitleId">Delete</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete {{ $project->title }}?
                                                            </div>
                                                            <div class="modal-footer justify-content-evenly">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <form action="{{route('admin.projects.destroy', $project->id)}}" method="post">
                                                                    @csrf 
                                                                    @method('DELETE')
                                                                  
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Optional: Place to the bottom of scripts -->
                                                <script>
                                                    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
                                                </script>

                                            </td>
                                        </tr>
                                    @empty
                                        <h1>no projects here!</h1>
                                    @endforelse



                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>

                    </div>

    </div>

@endsection




