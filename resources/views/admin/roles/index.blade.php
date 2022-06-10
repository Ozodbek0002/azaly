@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Role Management</h2>
                        </div>
                        <div class="pull-right">
                            @can('role-create')
                                <a class="btn btn-success" href="{{ route('admin.roles.create') }}"> Create New Role</a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif


                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th class="w-25">Action</th>
                    </tr>
                    @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('admin.roles.show',$role->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                @can('role-edit')
                                    <a class="btn btn-warning" href="{{ route('admin.roles.edit',$role->id) }}">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                @endcan
                                @can('role-delete')
                                    {!! Form::open(['method' => 'DELETE','route' => ['admin.roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    {{--                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}--}}
                                    {!! Form::close() !!}
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </table>


                {!! $roles->render() !!}
            </div>
        </div>
    </div>
@endsection