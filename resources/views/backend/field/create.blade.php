@extends('layouts.backend')
@section('title')
Create Field
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Field</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Field</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="{{ route('fields.store') }}" method="post">
        @csrf
        <section class="content" style="font-size: 14px">
            <div class="container-fluid">

                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-puzzle-piece"></i> Fields</h3>

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
                                    <label for="inputName">Field Name</label>
                                    <input type="text" name="name" id="inputName" class="form-control"
                                        placeholder="Field Name">
                                </div>
                                <div class="form-group">
                                    <label for="inputHelpText">Help Text</label>
                                    <input type="text" name="help_text" id="inputHelpText" class="form-control"
                                        placeholder="Help Text">
                                </div>
                                <div class="form-group">
                                    <label for="inputPlaceholder">Placeholder</label>
                                    <input type="text" name="placeholder" id="inputPlaceholder" class="form-control"
                                        placeholder="Placeholder">
                                </div>
                                <div class="form-group">
                                    <label for="inputErrorMessage">Error Message</label>
                                    <input type="text" name="error_message" id="inputErrorMessage" class="form-control"
                                        placeholder="Error Message">
                                </div>
                                <div class="form-group">
                                    <label for="selectForm">Form</label>
                                    <select name="form_id" class="form-control" id="selectForm">
                                        @if ($forms)
                                        <option selected disabled>Choose</option>
                                        @foreach ($forms as $form)
                                        <option value="{{ $form->id }}">{{ $form->name }}</option>
                                        @endforeach
                                        @else
                                        <option selected disabled>Choose</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="selectRequired">Required</label>
                                    <select name="required" class="form-control" id="selectRequired">
                                        <option selected disabled>Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="selectInputType">Type</label>
                                    <select name="type_id" id="selectInputType" class="form-control">
                                        @if (!empty($types))
                                        <Option selected disabled class="text-bold">Choose</Option>
                                        @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputSort">Sort</label>
                                    <input type="number" name="sort" id="inputSort" class="form-control"
                                        placeholder="Sort">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="selectStatus">Status</label>
                                    <select name="status" class="form-control" id="selectStatus">
                                        <option selected disabled>Choose</option>
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
