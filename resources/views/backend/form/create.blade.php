@extends('layouts.backend')
@section('title')
Create Form
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="{{ route('forms.store') }}" method="post">
        @csrf
        <section class="content" style="font-size: 14px">
            <div class="container-fluid">

                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-copy"></i> Forms</h3>

                        <div class="card-tools">
                            <button type="submit" class="btn btn-tool bg-primary" title="Save">
                                <i class="fas fa-save"></i>
                            </button>
                            <button type="button" class="btn btn-tool" onclick="window.history.back()">
                                <i class="fas fa-reply"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputName">Form Name</label>
                                    <input type="text" name="name" id="inputName" class="form-control"
                                        placeholder="Field Name">
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Description</label>
                                    <textarea name="description" id="inputDescription" cols="30" rows="5"
                                        class="form-control" placeholder="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="selectBooking">Booking</label>
                                    <select name="booking_id" class="form-control" id="selectBooking">
                                        <option selected disabled>Select</option>
                                        @if (!empty($bookings))
                                        @foreach ($bookings as $booking)
                                        <option value="{{ $booking->id }}">{{ $booking->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="selectStatus">Status</label>
                                    <select name="status" class="form-control" id="selectStatus">
                                        <option selected disabled>Select</option>
                                        <option value="1">Enable</option>
                                        <option value="0">Disable</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.container-fluid -->
        </section>
    </form>
    <!-- /.content -->
</div>

@endsection
