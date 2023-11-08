@extends('layouts.admin')

@section('content')
    <div class="container">
        <h4 class="py-4 display-4 fw-bold">Trash Page 🚽</h4>

        <div class="card">

            <div class="table-responsive-sm">
                <table class="table table-light mb-0">
                    <thead>
                        <tr class="">
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th class="text-center" scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>


                        @forelse ($projects as $project)
                            <tr class="">
                                <td scope="row">{{ $project->id }}</td>
                                <td>

                                    @if (str_contains($project->cover_image, 'http'))
                                        <img class="img-fluid rounded-start" src="{{ $project->cover_image }}"
                                            alt="">
                                    @else
                                        N/A
                                    @endif


                                </td>
                                <td class="col-2">{{ $project->title }}</td>
                                <td class="col-4">{{ $project->description }}</td>
                                <td class="text-center d-flex justify-content-center">


                                    <form action="{{ route('restore', $project->id) }}" method="POST">

                                        @csrf

                                        <button type="submit" class="btn btn-success">Restore</button>

                                    </form>


                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-danger mx-4" data-bs-toggle="modal"
                                        data-bs-target="#modalId3">
                                        Permantly Delete
                                    </button>

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="modalId3" tabindex="-1" data-bs-backdrop="static"
                                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-warning">
                                                    <h5 class="modal-title" id="modalTitleId">Delete project</h5>

                                                    <button type="button" class="btn-close bg-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-5">
                                                    <h4>Do you really want to permantly delete this project?</h4>
                                                </div>


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>

                                                    <form action="{{ route('trash', $project->id) }}" method="POST">

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
                            <tr class="">

                                <td>Oops! No Comics yet!</td>

                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
