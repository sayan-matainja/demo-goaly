@extends('admin.layout.admin_template')

@section('admin_content')
    <div class="container-fluid ">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><h5>Games Schedule</h5></li>
                </ol>
                </nav>
            </div>
            <div>
                <a href="{{url('/admin/gameSchedule/add')}}" ><button  type="button"  class="btn btn-outline-success" data-toggle="modal" data-target="#addGamesModal">Add </button></a>
            </div>
        </div>
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('flash_message_success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
           <script>
        window.onload = function() {
            window.location.reload(true);
        }
    </script>

        @endif

        @if(Session::has('flash_message_error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('flash_message_error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
           <script>
        window.onload = function() {
            window.location.reload(true);
        }
    </script>
        @endif

        <table id="example2" class="table tx-center">
            <thead>
                <tr>
                    <th>Schedule Id.</th>
                    <th>Competition Type</th>
                    <th>Icon</th>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Created</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($games) && count($games) > 0)
             
                    @foreach($games as $notification)
                  
                        <tr id="notificationRow_{{ $notification->id }}">
                            <td>{{ $notification->id }}</td>
                            <td>{{ $notification->competition_type }}</td>
                            <td><img style="height:80px; width:100px; border-radius:50%;" src="{{ asset('uploads/gameImages/' . $notification->icon) }}" alt="Icon"></td>
                            
                            <td>{{ $notification->name }}</td>
                            <td>{{ $notification->start_date }}</td>
                            <td>{{ $notification->end_date }}</td>
                            <td>{{ $notification->created_at }}</td>
                            <td>
                                <label class="statusLbl">
                                <input class="schedule_status" data-schedule_id="{{ $notification->id }}"type="checkbox" data-toggle="toggle" data-size="small" 
                                schedule_id="{{ $notification->id }}" {{ $notification->status ? 'checked' : '' }}>   
                                 
                                </label>
                            </td>        
                                                     
                            <td>
                                <a href="{{url('/admin/gameSchedule/edit/'.$notification['id'])}}" class="tx-success"><i data-feather="edit-2"></i></a>

                                <a href="javascript:void(0)" class="tx-danger schedule-del" data-schedule_id="{{ $notification->id }}" >
                                    <i class="fa fa-trash" ></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

    </div>



<!-- Edit Notification Modal -->


@endsection

