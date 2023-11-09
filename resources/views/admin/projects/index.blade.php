@extends('layouts.admin')

@section('content')
    <div class="container">


        <div class="d-flex justify-content-between">
            <h1 class="py-4">My Projects</h1>
            {{-- <a href="{{ route('projects.trash') }}">
                <h4 class="my-4 display-4 fw-bold">Trash 🚽</h4>
            </a> --}}

            <div class="d-flex align-items-center">
                <a class="btn btn-primary " href="{{ route('projects.create') }}">➕ Add project</a>
            </div>

        </div>

        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Message: </strong> {{ session('message') }}
            </div>
        @endif

        <div class="card mt-4 shadow my-4">
            <div class="table-responsive">
                <table class="table table-secondary mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        @forelse ($projects as $project)
                            <tr class="table-secondary">

                                <td scope="row">{{ $project->id }}</td>


                                <td>
                                    {{-- @if ($project->cover_image)
                                        <img width="100" src="{{ asset('storage/' . $post->cover_image) }}"
                                            alt="">
                                    @else
                                        N/A
                                    @endif --}}
                                    @if (str_contains($project->cover_image, 'http'))
                                        <img width="60" src="{{ $project->cover_image }}" alt="">
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="col-2">{{ $project->title }}</td>
                                <td class="col-4">{{ $project->description }}</td>

                                <td class="text-center">
                                    <a href="{{ route('projects.show', $project->id) }}"
                                        class="btn btn-primary mx-4">View</a>
                                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-secondary">Edit</a>

                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-danger mx-4" data-bs-toggle="modal"
                                        data-bs-target="#modalId">
                                        Delete
                                    </button>

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static"
                                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-warning">
                                                    <h5 class="modal-title" id="modalTitleId">Delete Project</h5>

                                                    <button type="button" class="btn-close bg-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-5">
                                                    <h4>Do you really want to delete this Project?</h4>
                                                </div>


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>

                                                    <form action="{{ route('projects.destroy', $project->id) }}"
                                                        method="POST">

                                                        @csrf

                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger">Confirm</button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>

                            </tr>
                        @empty
                            <tr class="table-secondary">

                                <td scope="row">No Projects yet!!!</td>

                            </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>

        </div>

        {{ $projects->links('pagination::bootstrap-5') }}

    </div>
@endsection
