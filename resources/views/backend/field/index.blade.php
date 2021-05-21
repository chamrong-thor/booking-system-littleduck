@extends('layouts.backend')
@section('title')
Fields
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Fields</h1>
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
    <section class="content" style="font-size: 12px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-list"></i> Fields</h3>
                            <a class="btn btn-primary btn-sm float-right mr-1" href="{{ route('fields.create') }}"
                                id="deleteAllSelectedRecords">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Field Name</th>
                                        <th style="text-align: center" scope="col">Field Type</th>
                                        <th style="text-align: center" scope="col">Sort</th>
                                        <th style="text-align: center" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($fields !== null)
                                    @foreach ($fields as $field)
                                    <tr id="ids{{ $field->id }}">
                                        <td style="width: 5px;">{{ $fields->firstItem()+$loop->index }}</td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            {{ ($field->name !== null)? $field->name : 'N/A' }}</td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            {{ ($field->type->name !== null)? $field->type->name : 'N/A' }}</td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            {{ ($field->sort !== null)? $field->sort : 'N/A' }}</td>
                                        <td style="text-align: center; vertical-align: middle; width: 100px">
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('fields.edit', $field->id) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="javascript:void(0)"
                                                onclick="deleteField({{ $field->id }})">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="float-right">
                                {{ $fields->links() }}
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
    function deleteField(id)
    {
        if (confirm ("Do you really want to delete this record?"))
        {
            $.ajax({
                url: "/fields/" + id,
                type: "DELETE",
                data: {
                    _token: $("input[name=_token]").val()
                },
                success: function (response) {
                    $('#ids'+id).remove();
                }
            });
        }
    }

    // remove single field
</script>

@endsection
