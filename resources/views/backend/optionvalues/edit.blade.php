@extends('layouts.backend')
@section('title')
Options
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content" style="font-size: 12px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-list"></i> Options</h3>
                            {{-- <button class="btn btn-primary btn-sm float-right mr-1" button type="button"
                                data-toggle="modal" data-target="#CreateValueModal"><i class="fa fa-plus"></i></button> --}}
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <!-- Modal -->
                            {{-- form-Update --}}
                            <form action="{{ route('optionvalues.update', $optionValue->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="inputName">Name:</label>
                                    <input value="{{ $optionValue->name }}" class="form-control" type="text" name="name"
                                        id="inputName">
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Description:</label>
                                    <textarea class="form-control" name="description" id="inputDescription" cols="30"
                                        rows="5">{{ $optionValue->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputSort">Sort:</label>
                                    <input type="number" name="sort" id="inputSort" class="form-control"
                                        value="{{ $optionValue->sort }}">
                                </div>
                                <div class="form-group">
                                    <label for="selectOption">Option:</label>
                                    <select class="form-control" name="option_id" id="selectOption">
                                        <option disabled selected>Choose</option>
                                        @if (!empty($options))
                                        @foreach ($options as $option)
                                        <option value="{{ $option->id }}"
                                            {{ $option->id == $optionValue->id? 'selected' : '' }}>
                                            {{ $option->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputImage">Image: <br>
                                        <img style="width: 100px;"
                                            src="{{ $optionValue->image !== null ? $optionValue->image :'/backends/dist/img/image-icon.png' }}"
                                            alt="Image">
                                        <button class="btn btn-primary btn-sm btn-info" type="button"
                                            id="button-create">Upload
                                            Image</button>
                                    </label>
                                    <input type="text" name="image" id="inputImage" style="display: none;"
                                        value="{{ $optionValue->image }}">
                                </div>
                                <button type="submit" class="btn btn-success">Save Change</button>
                            </form>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function() {

        document.getElementById('button-create').addEventListener('click', (event) => {
            event.preventDefault();

            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });
        });

        // set file link
        function fmSetLink($url) {
        document.getElementById('inputImage').value = $url;
        document.querySelector('label[for="inputImage"] img').src = $url;
    }

</script>
@endsection
