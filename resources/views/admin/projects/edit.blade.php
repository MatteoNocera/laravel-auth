@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="row row-cols-1 row-cols-md-3 justify-content-around">
            <div class="col">
                <h1 class="my-4 display-4 fw-bold">Edit Project Id: #{{ $project->id }}</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('projects.update', $project) }}" method="post" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title"
                            class="form-control @error('title') is-invalid @enderror" placeholder=""
                            value="{{ old('title', $project->title) }}" aria-describedby="project_id:{{ $project->id }}">
                        <small id="project_id:{{ $project->id }}"></small>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea type="text" rows="7" name="description" id="description" class="form-control">{{ old('description', $project->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="cover_image" class="form-label">Update Project Image</label>
                        <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder=""
                            aria-describedby="fileHelpId">

                    </div>

                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>


                </form>

            </div>
        </div>
    </div>
@endsection