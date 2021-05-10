@extends('layouts.backend')
@section('title')
Create Options
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
    <form action="{{ route('options.store') }}" method="post">
        @csrf
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
                                    <label id="inputName">Option Name</label>
                                    <input type="text" name="name" id="inputName" class="form-control"
                                        placeholder="Enter option name">
                                </div>
                                <div class="form-group">
                                    <label>Type</label>
                                    <select name="type" id="input-type" class="form-control">
                                        <optgroup label="Choose">
                                            <option value="select">Select</option>
                                            <option value="radio">Radio</option>
                                            <option value="checkbox" selected="selected">Checkbox</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- table value option -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Option Value Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Description</th>
                            <th scope="col">Sort Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="text-center" style="vertical-align: middle !important;">
                                <input type="text" name="valueName" placeholder="Option Value Name"
                                    class="form-control">
                            </th>
                            <td style="vertical-align: middle !important; text-align: center">
                                <img src="{{ asset('backends/dist/img/image-icon.png') }}"
                                    style="border: 3px solid #00000014; max-width: 100px">
                            </td>
                            <td>
                                <textarea name="valueDescription" class="form-control" cols="30" rows="5"></textarea>
                            </td>
                            <td style="vertical-align: middle !important;">
                                <input type="number" name="sort" class="form-control" id="valueSort">
                            </td>
                            <td class="text-center">
                                <a href="#">
                                    <button type="button" class="btn btn-danger"><i
                                            class="fa fa-minus-circle"></i></button>
                                </a>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="4"></td>
                            <td>
                                <a href="#">
                                    <button type="button" class="btn btn-primary"><i
                                            class="fa fa-plus-circle"></i></button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- end - table value option -->

            </div>
            <!-- /.container-fluid -->
        </section>
    </form>
    <!-- /.content -->
</div>

@endsection
