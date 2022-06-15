
@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Products list</h2>
                        </div>
                        <div class="pull-right">
                            @can('category-create')
                                <a class="btn btn-success" href="{{ route('admin.products.create') }}"> Create New Product</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Buy Sum</th>
                            <th>Sell Sum</th>

                            <th class="w-25">Action</th>
                        </tr>
                        @foreach ($products as $key => $product)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->buy_sum }}</td>
                                <td>{{ $product->sell_sum }}</td>

                                <td>
                                    @can('category-list')
                                        <a class="btn btn-info" href="{{ route('admin.products.show',$product->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    @endcan
                                    @can('category-edit')
                                        <a class="btn btn-warning" href="{{ route('admin.products.edit',$product->id) }}">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                    @endcan
                                    @can('category-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['admin.products.destroy', $product->id],'style'=>'display:inline']) !!}
                                        <button type="submit" class="btn btn-danger btn-flat show_confirm"
                                                data-toggle="tooltip">
                                            <span class="btn-label">
                                                <i class="fa fa-trash"></i>
                                            </span>
                                        </button>
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </table>

{{--                    <div class="container">--}}
{{--                        <div class="row justify-content-center">--}}
{{--                            @if ($categories->links())--}}
{{--                                <div class="mt-4 p-4 box has-text-centered">--}}
{{--                                    {{ $categories->links() }}--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>
            </div>
        </div>
    </div>
@endsection
