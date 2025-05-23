@extends('layouts.dashboard')


@section('sidebar')
@include('sidebar.sidebar')
@endsection


@section('content')
<div class="content">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="d-flex flex-row justify-content-between align-items-center px-4">
                    <div>

                        <span class="h6 fw-bold">Client</span>

                    </div>
                    <div>
                        <div class="breadcrumb bg-white py-3">
                            <div class="d-flex flex-row bg-white">
                                <span class="breadcrumb-item fw-normal"><a href="#">Home</a></span>
                                <span class="breadcrumb-separator mx-2">/</span>
                                <span class="breadcrumb-item active fw-normal">Client</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
    <div>
        <div class="card bg-light vh-100">
            <div class="card-body">
                <!-- Client Content -->
            </div>
        </div>
    </div>

</div>


@endsection