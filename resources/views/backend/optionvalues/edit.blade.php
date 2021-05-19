@extends('layouts.backend')
@section('title')
Option Values
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
                            <button type="button" class="btn btn-sm btn-primary float-right"
                                onclick="window.history.back()">
                                <i class="fas fa-reply"></i>
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

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
                                    <label for="selectField">Field:</label>
                                    <select class="form-control" name="field_id" id="selectField">
                                        @if ($fields != null && $optionValue->field->name != null)
                                        {{-- <option value="">{{ $optionValue->field->name }}</option> --}}
                                        <option disabled>Choose</option>
                                        @foreach ($fields as $field)
                                        @if($field->type->name == "checkbox" || $field->type->name ==
                                        "select"
                                        || $field->type->name == "radio")
                                        <option value="{{ $field->id }}"
                                            {{ $field->name == $optionValue->field->name ? 'selected' : ''}}>
                                            {{ $field->name }}
                                        </option>
                                        @endif
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
