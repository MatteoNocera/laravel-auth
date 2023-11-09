@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header">

                        <h4>Welcome {{ Auth::user()->name }}, you are logged!</h4>


                    </div>

                    {{-- <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                    </div> --}}
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 my-5">
            <div class="col">
                <div class="card">
                    <div class="card-body bg-dark text-white rounded shadow">
                        <h4>
                            Total Projects: {{ $total_projects }}
                        </h4>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow">
                    <div class="card-body bg-dark text-white rounded shadow">
                        <h4>
                            Total Users: {{ $total_users }}
                        </h4>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body bg-dark text-white rounded shadow">
                        <h4>
                            Total Projects: {{ $total_projects }}
                        </h4>
                    </div>
                </div>
            </div>

        </div>



    </div>
@endsection
