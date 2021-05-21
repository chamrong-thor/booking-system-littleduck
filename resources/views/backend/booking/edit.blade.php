@extends('layouts.backend')
@section('title')
Create Booking
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Booking</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Booking</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')
        <section class="content" style="font-size: 14px">
            <div class="container-fluid">

                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-copy"></i> Bookings</h3>

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
                                    <label for="inputName">Booking Name</label>
                                    <input type="text" name="name" id="inputName" class="form-control"
                                        placeholder="Field Name" value="{{ $booking->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="inputStartDate">Start Date</label>
                                    <input type="date" name="start_date" class="form-control" id="inputStartDate"
                                        value="{{ $booking->start_date->format('Y-m-d') }}">
                                </div>
                                <div class=" form-group">
                                    <label for="inputEndDate">End Date</label>
                                    <input type="date" name="end_date" class="form-control" id="inputEndDate"
                                        value="{{ $booking->end_date->format('Y-m-d') }}">
                                </div>
                                <div class=" form-group">
                                    <label for="selectStatus">Status</label>
                                    <select name="status" class="form-control" id="selectStatus">
                                        <option selected disabled>Select</option>
                                        <option value="1" {{ $booking->status == 1 ? 'selected' : '' }}>Enable</option>
                                        <option value="0" {{ $booking->status == 0 ? 'selected' : '' }}>Disable</option>
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
