@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Create New Project</h1>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title"
                            aria-describedby="help_title" placeholder="Type new project title here">
                        <small id="help_title" class="form-text text-muted">Type max 50 characters</small>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" id="description"
                            aria-describedby="help_description" placeholder="Type new project title here">
                        <small id="help_description" class="form-text text-muted">Type max 50 characters</small>
                    </div>

                    <div class="mb-3">
                        <label for="cover_image" class="form-label">Choose file</label>
                        <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder=""
                            aria-describedby="fileHelpId">
                        <div id="fileHelpId" class="form-text">Add an Image, MAX 500kb</div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
