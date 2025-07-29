@extends('admin.layout.admin_template')

@section('admin_content')

    <div class="container-fluid ">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><h5>All Matches</h5></li>
                </ol>
                </nav>
            </div>
            <div>
                <select name="matchday" id="matchday" aria-controls="example2" class=""><option value="yesterday">Yesterday</option><option value="today">Today</option><option value="tomorrow">Tomorrow</option></select>
                @if(!empty($league_details))
                <div class="">
                    <select id="league-dropdown" >
                        <option value="">All Leagues</option>
                        @foreach($league_details as $league)
                            <option value="{{$league['sportsmonks_id']}}">
                                {{$league['competition_name']}}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif

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
        <table id="matchesTable" class="table tx-center">
            <thead>
                <tr>
                    <th>Sl No.</th>
                    <th>Match.ID</th>
                    <th>Match</th>
                    <th>League</th>                   
                    <th>Match Date</th>
                    <th>Venue</th>
                    <th>Match Result</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody >
                
                        
            </tbody>
        </table>

    </div>



<!-- Video upload Modal -->
<div id="customModal" class="custom-modal">
    <div class="custom-modal-dialog">
        <div class="custom-modal-content">
            <div class="custom-modal-header">
                <h5 class="modal-title">Edit Match Result</h5>
                <button type="button" style="border:none;background: none ;" id="closeModalBtn">x</button>
            </div>
            <div class="custom-modal-body">
                <form id="editmatchForm">
                    @csrf
                    <div class="form-group">
                        <label for="editmatchid">Match ID:</label>
                        <input type="text" class="form-control" name="fixtureId" id="editmatchid" placeholder="Enter Match ID">
                    </div>
                    <div class="form-group">
                        <label for="editmatchtitle">Title:</label>
                        <input type="text" class="form-control" name="title" id="editmatchtitle" placeholder="Enter Match Title">
                    </div>
                    <div class="form-group">
                        <label for="match-video">Highlights:</label>
                        <textarea class="form-control" name="match_video" id="match-video" placeholder="Paste highlights link here"></textarea>
                    </div>
                </form>
            </div>
            <div class="custom-modal-footer">
                <button type="button" id="updatematch" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-secondary" id="closeModalBtn">Close</button>
            </div>
        </div>
    </div>
</div>





<!-- Edit match Modal -->



@endsection

