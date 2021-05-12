@extends('layouts.backend')
@section('title')
Create Option
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
    <form action="{{ route('options.store') }}" method="post" enctype="multipart/form-data">
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
                                    <label for="inputOptionName">Option Name</label>
                                    <input type="text" name="option_name" id="inputOptionName" class="form-control"
                                        placeholder="Enter option name">
                                </div>
                                <div class="form-group">
                                    <label for="selectType">Type</label>
                                    <select name="type_id" id="selectType" class="form-control">
                                        @if (!empty($types))
                                        <option selected disabled class="text-bold">Choose</option>
                                        @foreach ($types as $type)
                                        @if ($type->name == 'select' || $type->name == 'radio' || $type->name ==
                                        'checkbox')
                                        <option value="{{ $type->id }}"> {{ $type->name }}</option>
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
                                <input type="text" name="option_value_name" placeholder="Option Value Name"
                                    class="form-control">
                            </th>
                            <td style="vertical-align: middle !important; text-align: center">
                                <label for="uploadOptionValueImage" style="cursor: pointer;">
                                    <img src="{{ asset('backends/dist/img/image-icon.png') }}"
                                        style="border: 3px solid #00000014; max-width: 100px">
                                </label>
                                <input type="file" accept="image/*" name="option_value_image"
                                    id="uploadOptionValueImage" style="display: none;" onchange="loadFile(event);">
                            </td>
                            <td>
                                <textarea name="option_value_description" class="form-control" cols="30"
                                    rows="5"></textarea>
                            </td>
                            <td style="vertical-align: middle !important;">
                                <input type="number" name="option_value_sort" class="form-control" id="valueSort">
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
@section('script')
<script>
    var loadFile = function(event) {
        var image = document.querySelector('label[for = "uploadOptionValueImage"] img');
        image.src = URL.createObjectURL(event.target.files[0]);
        console.log(image.src);
}
</script>
@endsection
