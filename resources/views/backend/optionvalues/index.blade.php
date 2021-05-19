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
                            <button class="btn btn-primary btn-sm float-right mr-1" button type="button"
                                data-toggle="modal" data-target="#CreateValueModal"><i class="fa fa-plus"></i></button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="optionvalueTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Description</th>
                                        <th scope="col" style="text-align:center">Sort</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($optionvalues !== null)
                                    @foreach ($optionvalues as $optionvalue)
                                    <tr id="sid{{ $optionvalue->id }}">
                                        <td>{{ $forms->firstItem()+$loop->index }}</td>
                                        <td style="vertical-align: middle; width: 120px;">
                                            {{ ($optionvalue->name !== null)? $optionvalue->name : 'N/A' }}
                                        </td>
                                        <td style="text-align: center; vertical-align: middle; width: 120px;">
                                            <img style="width: 100px; border-radius: 3px;"
                                                src="{{ ($optionvalue->image !== null)? $optionvalue->image : 'backends/dist/img/image-icon.png' }}">
                                        </td>
                                        <td style="vertical-align: middle;">
                                            {{ ($optionvalue->description !== null)? $optionvalue->description : 'N/A' }}
                                        </td>
                                        <td style="text-align: center; vertical-align: middle; width: 90px;">
                                            {{ ($optionvalue->sort !== null)? $optionvalue->sort : 'N/A' }}
                                        </td>
                                        <td style="text-align: center; vertical-align: middle; width: 100px">
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('optionvalues.edit', $optionvalue->id) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="javascript:void(0)"
                                                onclick="deleteOptionvalue({{ $optionvalue->id }})">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>

                            <!-- Modal -->
                            {{-- form-create --}}
                            <form action="{{ route('optionvalues.store') }}" method="POST">
                                @csrf
                                <div class="modal fade" id="CreateValueModal" tabindex="-1" role="dialog"
                                    aria-labelledby="CreateValueModalTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="CreateValueModalTitle">Create Option Value
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="inputName">Name:</label>
                                                    <input class="form-control" type="text" name="name" id="inputName">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputDescription">Description:</label>
                                                    <textarea class="form-control" name="description"
                                                        id="inputDescription" cols="30" rows="5"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputSort">Sort:</label>
                                                    <input type="number" name="sort" id="inputSort"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="selectOption">Option:</label>
                                                    <select class="form-control" name="field_id" id="selectOption">
                                                        <option disabled selected>Choose</option>
                                                        @if (!empty($fields))
                                                        @foreach ($fields as $field)

                                                        @if($field->type->name == "checkbox" || $field->type->name ==
                                                        "select"
                                                        || $field->type->name == "radio")
                                                        <option value="{{ $field->id }}">{{ $field->name }}</option>
                                                        @endif

                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputImage">Image: <br>
                                                        <img style="width: 100px;"
                                                            src="{{ asset('backends/dist/img/image-icon.png') }}"
                                                            alt="Image">
                                                        <button class="btn btn-primary btn-sm btn-info" type="button"
                                                            id="button-create">Upload
                                                            Image</button>
                                                    </label>
                                                    <input type="text" name="image" id="inputImage"
                                                        style="display: none;">
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="float-right">
                                    {{ $optionvalues->links() }}
                                </ul>
                            </div>
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
<script>
    function deleteOptionvalue(id)
    {
        if (confirm ("Do you really want to delete this record?"))
        {
            $.ajax({
                url: "/optionvalues/"+id,
                type: "DELETE",
                data: {
                    _token: $("input[name=_token]").val()
                },
                success: function (response) {
                    $('#sid'+id).remove();
                }
            });
        }
    }
</script>
@endsection
