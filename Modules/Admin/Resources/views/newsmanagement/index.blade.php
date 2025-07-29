@extends('admin.layout.admin_template')

@section('admin_content')
<div class="container-fluid ">
    @if(Session::has('flash_message_success'))
    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">
        {{ Session::get('flash_message_success') }}
    </p>
    @endif
    {{-- add banners popup --}}
    <!-- modal -->

    <div class="modal fade effect-scale" id="modalEditContact" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body pd-20 pd-sm-30">
                    <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <h5 class="tx-18 tx-sm-20 mg-b-20">Edit Contact</h5>
                    <p class="tx-13 tx-color-03 mg-b-30">You can add more information than what you see here, such as address and birthday by clicking <span class="tx-color-02">Add More Fields</span> button below to bring up more options.</p>

                    <div class="d-sm-flex">
                        <div class="mg-sm-r-30">
                            <div class="pos-relative d-inline-block mg-b-20">
                                <div class="avatar avatar-xxl"><span class="avatar-initial rounded-circle bg-gray-700 tx-normal">A</span></div>
                                <a href="" class="contact-edit-photo"><i data-feather="edit-2"></i></a>
                            </div>
                        </div><!-- col -->
                        <div class="flex-fill">
                            <h6 class="mg-b-10">Personal Information</h6>
                            <div class="form-group mg-b-10">
                                <input type="text" class="form-control" placeholder="Firstname" value="Abigail">
                            </div><!-- form-group -->
                            <div class="form-group mg-b-10">
                                <input type="text" class="form-control" placeholder="Lastname" value="Johnson">
                            </div><!-- form-group -->

                            <h6 class="mg-t-20 mg-b-10">Contact Information</h6>

                            <div class="form-group mg-b-10">
                                <input type="text" class="form-control" placeholder="Phone number" value="+1 234 567 8910">
                            </div><!-- form-group -->
                            <div class="form-group mg-b-10">
                                <input type="email" class="form-control" placeholder="Email address" value="me@themepixels.me">
                            </div><!-- form-group -->

                            <h6 class="mg-t-20 mg-b-10">Notes</h6>
                            <textarea class="form-control" rows="2" placeholder="Add notes"></textarea>
                        </div><!-- col -->
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="wd-100p d-flex flex-column flex-sm-row justify-content-end">
                        <div class="dropup mg-b-15 mg-sm-b-0 mg-sm-r-auto">
                            <button type="button" class="btn btn-block bd bd-gray-300" data-toggle="dropdown">Add More Fields <i class="icon ion-ios-arrow-up mg-l-5"></i></button>
                            <div class="dropdown-menu tx-13">
                                <a href="" class="dropdown-item">Email</a>
                                <a href="" class="dropdown-item">Phone</a>
                                <a href="" class="dropdown-item">Address</a>
                                <a href="" class="dropdown-item">Custom</a>
                            </div><!-- dropdown-menu -->
                        </div>
                        <button type="button" class="btn btn-primary mg-b-5 mg-sm-b-0">Save Changes</button>
                        <button type="button" class="btn btn-secondary mg-sm-l-5" data-dismiss="modal">Cancel</button>
                    </div>
                </div><!-- modal-footer -->
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div>
    <!-- modal -->

    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item">
                        <h5>Winner Management</h5>
                    </li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{route('addnew')}}" id="sample_editable_1_new" class="btn btn-outline-success" data-toggle="modal1" data-target="#modalEditContact"> Add New
            </a>
        </div>
    </div>

    <table id="example2" class="table tx-center display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Serial No</th>
                <th>Thumbnail</th>
                <th>Title</th>
                <th>Content</th>
                <th>Which Place</th>
                <th>Status</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @if(isset($alldata))
            @foreach($alldata as $data)
            <tr id="example">
                <td> {{$data['id']}}</td>
                <td> <img style="height:80px; width:100px; border-radius:50%;" src="{{asset('/images/newsImage/'.$data['thumbnail'])}}"> </td>
                <td> {{$data['title']}}</td>
                <td> {{$data['content']}}</td>
                <td> {{$data['place_for']}}</td>
                <td>
                    <input type="checkbox" class="rwd_status" data-reward_id="{{$data['id']}}" @if ($data['status']==1) checked @endif data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="primary" data-offstyle="warning">
                </td>
                <td>
                    <a href="{{url('/admin/newsmanagement/edit/'.$data['id'])}}" data_id="{{$data['id']}}" class="tx-success"><i data-feather="edit-2"></i></a>
                    <a href="{{url('/admin/newsmanagement/delete/'.$data['id'])}}" class="tx-danger rwd_del" data_id="{{$data['id']}}"><i data-feather="trash"></i></a>
                </td>
                @endforeach
                @endif

        </tbody>
    </table>
</div>

@endsection