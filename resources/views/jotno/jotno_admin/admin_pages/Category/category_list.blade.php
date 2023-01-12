@extends('jotno.jotno_admin.admin_layout.custom.master')
@section('content')
    <div class="row">
        <!--Export Data Table Start-->
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h3 class="title">Category List</h3>
                </div>
                <div class="box-body">
                    <a href="{{route('category.create')}}" class="btn btn-sm btn-primary">Add New</a>
                    <table class="table table-bordered data-table data-table-export table table-dark table-striped">
                        <thead>
                        <tr>
                            <th>SL#</th>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Parent</th>
                            <th>Creator</th>
                            <th>Updater</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            @php
                            $count_category = App\product::where('category_id',$category->name)->count();
                            @endphp
                            <tr>
                                <td>{{ $serial++ }}</td>
                                <td>{{$category->id}}</td>
                                <td width="20%"><img src="{{(!empty($category->image))?url('public/jotno_admin/assets/images/category/'.$category->image):url('public/jotno_admin/assets/images/category/noimage.jpg')}}"  alt="" class="product-image rounded-circle" width="20%"></td>
                                <td>{{$category->name}}</td>
                                <td>{{($category->parent != 'Select Parent')?$category->parent:''}}</td>
                                <td>{{$category->creator}}</td>
                                <td>{{$category->updater}}</td>
                                <td>
                                    @if($category->status == 'active')
                                        <span class="badge badge-success" title="user active">Active</span>
                                    @else
                                        <span class="badge badge-danger" title="user inactive">Inactive</span>
                                    @endif
                                </td>
                                <td class="d-flex justify-content-center">
                                    <div class="row">
                                        <a title="Edit" class="edit button button-box button-xs button-primary" href="{{ route('category.edit',$category->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                        @if(empty($count_category))
                                        <form  action="{{ route('category.delete',$category->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button title="Delete" class="delete button button-box button-xs button-danger" onclick="return confirm('Are you confirm to delete this Category')"><i class="zmdi zmdi-delete"></i></button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SL#</th>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Parent</th>
                            <th>Creator</th>
                            <th>Updater</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <!--Export Data Table End-->
    </div>
@endsection


