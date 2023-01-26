@extends('jotno.jotno_admin.admin_layout.custom.master')
@section('content')
    <div class="row">
        <!--Export Data Table Start-->
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h3 class="title">Carousel List</h3>
                </div>
                <div class="box-body">
                    <a href="{{route('mainCarousel.create')}}" class="btn btn-sm btn-primary">Add New</a>
                    <table class="table table-bordered data-table data-table-export table table-dark table-striped">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>SL#</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Tag</th>
                            <th>Heading</th>
                            <th>link</th>
                            <th>event</th>
                            <th>description</th>
                            <th>Creator</th>
                            <th>Updater</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($main_carousels as $carousel)
                            <tr>
                                <td width="20%"><img src="{{(!empty($carousel->image))?url('public/jotno_admin/assets/images/mainCarousel/'.$carousel->image):url('public/jotno_admin/assets/images/mainCarousel/noimage.jpg')}}"  alt="" class="product-image rounded-circle" width="20%"></td>
                                <td>{{ $serial++ }}</td>
                                <td>{{$carousel->id}}</td>
                                <td>{{$carousel->name}}</td>
                                <td>{{$carousel->tag}}</td>
                                <td>{{$carousel->heading}}</td>
                                <td>{{$carousel->link}}</td>
                                <td>{{$carousel->event}}</td>
                                <td>{!!$carousel->description!!}</td>
                                <td>{{$carousel->creator}}</td>
                                <td>{{$carousel->updater}}</td>
                                <td>
                                    @if($carousel->status == 'active')
                                        <span class="badge badge-success" title="user active">Active</span>
                                    @else
                                        <span class="badge badge-danger" title="user inactive">Inactive</span>
                                    @endif
                                </td>
                                <td class="d-flex justify-content-center">
                                    <div class="row">
                                        <a title="Edit" class="edit button button-box button-xs button-primary" href="{{ route('mainCarousel.edit',$carousel->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                        <form  action="{{ route('mainCarousel.delete',$carousel->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button title="Delete" class="delete button button-box button-xs button-danger" onclick="return confirm('Are you confirm to delete this Carousel')"><i class="zmdi zmdi-delete"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Image</th>
                            <th>SL#</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Tag</th>
                            <th>Heading</th>
                            <th>link</th>
                            <th>event</th>
                            <th>description</th>
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


