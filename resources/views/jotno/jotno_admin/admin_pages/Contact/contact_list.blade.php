@extends('jotno.jotno_admin.admin_layout.custom.master')
@section('content')
    <div class="row">
        <!--Export Data Table Start-->
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h3 class="title">Contact List</h3>
                </div>
                <div class="box-body">
                    <a href="{{route('contact.create')}}" class="btn btn-sm btn-primary">Add New</a>
                    <table class="table table-bordered data-table data-table-export table table-dark table-striped">
                        <thead>
                        <tr>
                            <th>SL#</th>
                            <th>Location</th>
                            <th>Phone</th>
                            <th>AltPhone</th>
                            <th>Email</th>
                            <th>Creator</th>
                            <th>Updater</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $serial++ }}</td>
                                <td>{{$contact->location}}</td>
                                <td>{{$contact->phone}}</td>
                                <td>{{$contact->alt_phone}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->creator}}</td>
                                <td>{{$contact->updater}}</td>
                                <td class="d-flex justify-content-center">
                                    <div class="row">
                                        <a title="Edit" class="edit button button-box button-xs button-primary" href="{{ route('contact.edit',$contact->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                        <a title="Details" class="edit button button-box button-xs button-success" href="{{ route('contact.details',$contact->id) }}"><i class="zmdi zmdi-more"></i></a>
                                        <form  action="{{ route('contact.delete',$contact->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button title="Delete" class="delete button button-box button-xs button-danger" onclick="return confirm('Are you confirm to delete this Contact')"><i class="zmdi zmdi-delete"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SL#</th>
                            <th>Location</th>
                            <th>Phone</th>
                            <th>AltPhone</th>
                            <th>Email</th>
                            <th>Creator</th>
                            <th>Updater</th>
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


