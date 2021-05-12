@extends('layouts.backend')
@section('title')
Forms
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Forms</h1>
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
                            <h3 class="card-title"><i class="fas fa-list"></i> Forms</h3>
                            <a href="{{ route('forms.create') }}">
                                <button class="btn btn-primary btn-sm float-right mr-1" type="button"><i
                                        class="fa fa-plus"></i></button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Form Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($forms !== null)
                                    @foreach ($forms as $form)
                                    <tr id="sid{{ $form->id }}">
                                        <td style="vertical-align: middle;">
                                            {{ ($form->name !== null)? $form->name : 'N/A' }}
                                        </td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            {{ ($form->status !== null)? ($form->status == 1 ? 'Enabled' : 'Disabled') : 'N/A' }}
                                        </td>
                                        <td style="text-align: center; vertical-align: middle; width: 100px">
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('forms.edit', $form->id) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="javascript:void(0)"
                                                onclick="deleteForm({{ $form->id }})">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="float-right">
                                {{ $forms->links() }}
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
    function deleteForm(id)
    {
        if (confirm ("Do you really want to delete this record?"))
        {
            $.ajax({
                url: "/forms/"+id,
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
// remove single field

@endsection
