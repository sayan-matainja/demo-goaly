@extends('admin.layout.admin_template')

@section('admin_content')
    <div class="container-fluid ">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><h5>Games</h5></li>
                </ol>
                </nav>
            </div>
            <div>
                <a href="javascript:void(0)" ><button  type="button"  class="btn btn-outline-success" data-toggle="modal" data-target="#addGamesModal">Add </button></a>
            </div>
        </div>
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('flash_message_success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">x
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
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">x
                    <span aria-hidden="true"></span>
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
                    <th>Sl No.</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Icon</th>
                    <th>Banner</th>
                    <th>Games Code</th>
                    <th>Url</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($games) && count($games) > 0)
             
                    @foreach($games as $notification)
                  
                        <tr id="notificationRow_{{ $notification->id }}">
                            <td>{{ $notification->id }}</td>
                            <td>{{ $notification->name }}</td>
                            <td>{{ $notification->description }}</td>
                            <td><img style="height:80px; width:100px; border-radius:50%;" src="{{ asset('uploads/gameImages/' . $notification->icon) }}" alt="Icon"></td>

                            <td><img style="height:80px; width:100px; border-radius:50%;" src="{{ asset('uploads/gameImages/' . $notification->banner) }}" alt="Banner"></td>
                            <td>{{ $notification->games_code }}</td>
                            <td>{{ $notification->url }}</td>
                            <td>
                                <label class="statusLbl">
                                <input class="game_status" data-game_id="{{ $notification->id }}"type="checkbox" data-toggle="toggle" data-size="small" 
                                game_id="{{ $notification->id }}" {{ $notification->status ? 'checked' : '' }}>   
                                 
                                </label>
                            </td>                            
                            <td>
                                <a href="{{url('/admin/games/edit/'.$notification['id'])}}" class="tx-success"><i data-feather="edit-2"></i></a>

                                <a href="javascript:void(0)" class="tx-danger game-del" data-game_id="{{ $notification->id }}" >
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
<div class="modal fade" id="addGamesModal" tabindex="-1" role="dialog" aria-labelledby="addGamesModalLabel" data-backdrop="false">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addGamesModalLabel">Add Game</h5>
                <button type="button" class="close" data-dismiss="modal"><b>X</b></button>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               
                <form id="GamesForm">
                    @csrf
                    <div class="form-group">
                        <label for="editTitle">Name:</label>
                        <input type="text" class="form-control" id="editTitle" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="editMessage">Description:</label>
                        <textarea class="form-control" id="editMessage" name="description" rows="4" required></textarea>
                    </div>
                     <div class="form-group">
                        <label for="editMessage">Url:</label>
                        <input type="text" class="form-control" id="editUrl" name="url" >
                    </div>
                     <div class="form-group">
                        <label for="editMessage">Game Image:</label>
                        <input type="file" class="form-control" id="editIcon" name="imgInp" >
                    </div>
                    <div class="form-group">
                        <label for="editMessage">Banner Image:</label>
                        <input type="file" class="form-control" id="editBanner" name="imgInpbanner" >
                    </div>
                    <div class="form-group">
                        <label for="editMessage">Game Zip File:</label>
                        <input type="file" class="form-control" id="editGameFile" name="gamefile" >
                    </div>
                    
                </form>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="submitGame" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>              
            </div>
        </div>
    </div>
</div>

<!-- Edit Notification Modal -->
<div class="modal fade" id="editGamesModal" tabindex="-1" role="dialog" aria-labelledby="editNotificationModalLabel" data-backdrop="false">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editGamesModalLabel">Edit Game</h5>
                <button type="button" class="close" data-dismiss="modal"><b>X</b></button>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editGamesForm">
                    @csrf
                  
                    <input type="hidden" name="id" id="editGamesId">
                    <div class="form-group">
                        <label for="editTitle">Name:</label>
                        <input type="text" class="form-control" id="editTitle" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="editMessage">Description:</label>
                        <textarea class="form-control" id="editMessage" name="description" rows="4" required></textarea>
                    </div>
                     <div class="form-group">
                        <label for="editMessage">Url:</label>
                        <input type="text" class="form-control" id="editUrl" name="url" >
                    </div>
                     <div class="form-group">
                        <label for="editMessage">Game Image:</label>
                        <input type="file" class="form-control" id="editIcon" name="imgInp" >
                    </div>
                    <div class="form-group">
                        <label for="editMessage">Banner Image:</label>
                        <input type="file" class="form-control" id="editBanner" name="imgInpbanner" >
                    </div>
                    <div class="form-group">
                        <label for="editMessage">Game Zip File:</label>
                        <input type="file" class="form-control" id="editGameFile" name="gamefile" >
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" id="updateGame"  class="btn btn-primary">Update</button>

                <button type="button" class="btn btn-secondary" id="updateGame" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

