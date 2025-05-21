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

                        <span class="h6 fw-bold">Info Center</span>

                    </div>
                    <div>
                        <div class="breadcrumb bg-white py-3">
                            <div class="d-flex flex-row bg-white">
                                <span class="breadcrumb-item fw-normal"><a href="#">Home</a></span>
                                <span class="breadcrumb-separator mx-2">/</span>
                                <span class="breadcrumb-item active fw-normal">Ticketing</span>
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="mt-3 mx-4">
                            <div class="d-flex flex-row justify-content-between mt-2">
                                <div>
                                    <h5 class="card-title fw-bold">Knowledge Base</h5>
                                </div>
                                <div class="d-flex flex-row gap-2">

                                    <button type="button" class="btn btn-primary btn-md" data-toggle="modal"
                                        data-target="#add-modal" title="Add">
                                        <i class="fa fa-plus"></i> Knowledge Base
                                    </button>

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="knowledge_base_table" class="table">
                                <thead>
                                    <tr>

                                        <th>Ticket No.</th>
                                        <th>Requester</th>
                                        <!-- <th>Client Name</th> -->
                                        <th>Ticket subject</th>
                                        <!-- <th>Product id</th> -->
                                        <!-- <th>Ticket desc</th> -->
                                        <th>Service</th>
                                        <th>Level </th>
                                        <th>Ticket Status</th>
                                        <th>Created Date</th>
                                        <th>Action
                                            {{-- <th>Deadline Date</th> --}}
                                            <!-- <th>Deleted date</th> -->
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>

</div>
@include('script.info-center')

@endsection