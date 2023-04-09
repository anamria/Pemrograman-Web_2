@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header info">
                    <h3 class="card-title">Songs Category List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Penyanyi</th>
                                <th>Cover</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->judul }}</td>
                                    <td> {{ $row->penyanyi }} </td>
                                    <td><img src="{{ asset('/storage/posts/' . $row->cover) }}" class="rounded"
                                            style="width: 150px"></td>
                                    <td>
                                        <a href="{{ URL::to('edit_songscategory/' . $row->id) }}"
                                            class="btn btn-sm btn-info">Edit</a>
                                        <a href="{{ URL::to('delete_songscategory/' . $row->id) }}"
                                            class="btn btn-sm btn-danger" id="delete" class="middle-align">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Penyanyi</th>
                                <th>Cover</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
