@extends('layouts.backend')
@section('title')
Edit Option
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Option</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Option</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="{{ route('options.update', $option->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <section class="content" style="font-size: 14px">
            <div class="container-fluid">

                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Options</h3>

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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputOptionName">Option Name</label>
                                    <input type="text" name="name" id="inputOptionName" class="form-control"
                                        placeholder="Enter option name" value="{{ $option->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="selectType">Type</label>
                                    <select name="type_id" id="selectType" class="form-control">
                                        @if (!empty($types))
                                        <option selected disabled class="text-bold">Choose</option>
                                        @foreach ($types as $type)
                                        @if ($type->name == 'select' || $type->name == 'radio' || $type->name ==
                                        'checkbox')
                                        <option value="{{ $type->id }}"
                                            {{ $type->id == $option->type->id ? 'selected' : '' }}>
                                            {{ $type->name }}</option>
                                        @endif
                                        @endforeach
                                        @endif
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
</div>
<!-- /.content -->
@endsection
