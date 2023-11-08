@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-5 mt-2 display-3 fw-bold text-muted">Your project n° : #{{ $project->id }}
        </h1>


        <div class="row">
            <div class="col-8">
                <div class="card mb-3 shadow-lg">
                    <div class="row g-0">
                        <div class="col-md-4">

                            {{-- @if ($project->cover_image)
                                                <img width="100" src="{{ asset('storage/' . $post->cover_image) }}"
                                                    alt="">
                                            @else
                                                N/A
                                            @endif --}}
                            @if (str_contains($project->cover_image, 'http'))
                                <img class="img-fluid rounded-start" src="{{ $project->cover_image }}" alt="">
                            @else
                                N/A
                            @endif

                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fs-3"><span class="text-muted">Title: </span>{{ $project->title }}
                                </h5>

                                <p class="card-text fs-5"><span class="text-muted">Description:
                                    </span>{{ $project->description }}</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
@endsection
