@extends('admin.layout.admin_template')

@section('admin_content')
    <div class="container-fluid ">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><h5>Notifications</h5></li>
                </ol>
                </nav>
            </div>
            <div>
                <a href="javascript:void(0)" ><button  type="button"  class="btn btn-outline-success" data-toggle="modal" data-target="#addNotificationModal">Add </button></a>
            </div>
        </div>
        @if(Session::has('flash_message_success'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">
            {{ Session::get('flash_message_success') }}
        </p>
        @endif
        @if(Session::has('flash_message_error'))
        <p class="alert {{ Session::get('alert-class','alert-danger') }}">
            {{ Session::get('flash_message_error') }}
        </p>
        @endif
        <table id="example2" class="table tx-center">
            <thead>
                <tr>
                    <th>Sl No.</th>
                    <th>Title</th>
                    <th>Message</th>
                    <th>Type</th>                   
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($notifications) > 0)
                    @php
                        $count = 0;
                    @endphp
                    @foreach($notifications as $notification)
                        @php
                            $count++;
                        @endphp
                        <tr id="notificationRow_{{ $notification->id }}">
                            <td>{{ $count }}</td>
                            <td>{{ $notification->title }}</td>
                            <td>{{ $notification->message }}</td>
                            <td>{{ $notification->type }}</td>                            
                            <td>
                                <a href="javascript:void(0)" class="tx-success notif-edit" data-notif_id="{{ $notification->id }}" data-toggle="modal" data-target="#editNotificationModal">
                                    <i class="fa fa-edit" ></i>
                                </a>
                                <a href="javascript:void(0)" class="tx-danger notif-del" data-notif_id="{{ $notification->id }}" >
                                    <i class="fa fa-trash" ></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

    </div>


    <!-- Add Notification Modal -->
<div class="modal fade" id="addNotificationModal" tabindex="-1" role="dialog" aria-labelledby="addNotificationModalLabel" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNotificationModalLabel">Add Notification</h5>
                <button type="button" class="close" data-dismiss="modal"><b>X</b></button>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               
                <form id="notificationForm">
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="POST">

                   
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>                    
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>                    
                    <div class="form-group">
                        <label for="type">Type:</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="">Select Type</option>
                            <option value="1">New Contest</option>
                            <option value="2">Contest End</option>
                        </select>
                    </div>          
                    
                </form>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="submitnotif" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>              
            </div>
        </div>
    </div>
</div>

<!-- Edit Notification Modal -->
<div class="modal fade" id="editNotificationModal" tabindex="-1" role="dialog" aria-labelledby="editNotificationModalLabel" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editNotificationModalLabel">Edit Notification</h5>
                <button type="button" class="close" data-dismiss="modal"><b>X</b></button>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editNotificationForm">
                    @csrf
                  
                    <input type="hidden" name="id" id="editNotificationId">
                    <div class="form-group">
                        <label for="editTitle">Title:</label>
                        <input type="text" class="form-control" id="editTitle" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="editMessage">Message:</label>
                        <textarea class="form-control" id="editMessage" name="message" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editType">Type:</label>
                        <select class="form-control" id="editType" name="type" required>
                            <option value="">Select Type</option>
                            <option value="1">New Contest</option>
                            <option value="2">Contest End</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" id="updatenotif"  class="btn btn-primary">Update</button>

                <button type="button" class="btn btn-secondary" id="updatenotif" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

