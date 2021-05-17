@extends('layouts.backend')
@section('title')
Options
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Options</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Options</li>
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
                            <h3 class="card-title"><i class="fas fa-list"></i> Options</h3>
                            <a href="{{ route('options.create') }}">
                                <button class="btn btn-primary btn-sm float-right mr-1" type="button"><i
                                        class="fa fa-plus"></i></button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Option Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($options !== null)
                                    @foreach ($options as $option)
                                    <tr id="sid{{ $option->id }}">
                                        <td style="vertical-align: middle;">
                                            {{ ($option->name !== null)? $option->name : 'N/A' }}
                                        </td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            {{ ($option->status !== null)? ($option->status == 1 ? 'Enabled' : 'Disabled') : 'N/A' }}
                                        </td>
                                        <td style="text-align: center; vertical-align: middle; width: 100px">
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('options.edit', $option->id) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="javascript:void(0)"
                                                onclick="deleteOption({{ $option->id }})">
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
                                {{ $options->links() }}
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
    function deleteOption(id)
    {
        if (confirm ("Do you really want to delete this record?"))
        {
            $.ajax({
                url: "/options/"+id,
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
// remove single option

@endsection
