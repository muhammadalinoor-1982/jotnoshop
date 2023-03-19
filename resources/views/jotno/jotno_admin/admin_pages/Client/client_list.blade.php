@extends('jotno.jotno_admin.admin_layout.custom.master')
@section('content')
    <div class="row">
        <!--Export Data Table Start-->
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h3 class="title">Client List</h3>
                </div>
                <div class="box-body">
                    <a href="{{route('client.create')}}" class="btn btn-sm btn-primary">Add New</a>
                    <table class="table table-bordered data-table data-table-export table table-dark table-striped">
                        <thead>
                        <tr>
                            <th>SL#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Creator</th>
                            <th>Updater</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{ $serial++ }}</td>
                                <td width="20%"><img src="{{(!empty($client->image))?url('public/jotno_admin/assets/images/client/'.$client->image):url('public/jotno_admin/assets/images/client/noimage.jpg')}}"  alt="" class="product-image rounded-circle" width="20%"></td>
                                <td>{{$client->name}}</td>
                                <td>{{$client->creator}}</td>
                                <td>{{$client->updater}}</td>
                                <td>
                                    @if($client->status == 'active')
                                        <span class="badge badge-success" title="user active">Active</span>
                                    @else
                                        <span class="badge badge-danger" title="user inactive">Inactive</span>
                                    @endif
                                </td>
                                <td class="d-flex justify-content-center">
                                    <div class="row">
                                        <a title="Edit" class="edit button button-box button-xs button-primary" href="{{ route('client.edit',$client->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                        <form  action="{{ route('client.delete',$client->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button title="Delete" class="delete button button-box button-xs button-danger" onclick="return confirm('Are you confirm to delete this Client')"><i class="zmdi zmdi-delete"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SL#</th>
                            <th>Image</th>
                            <th>Name</th>
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


