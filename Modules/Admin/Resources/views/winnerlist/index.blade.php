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


    <!-- modal -->

    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item">
                        <h5>Winner List</h5>
                    </li>
                </ol>
            </nav>
        </div>
      
    </div>
<div class="filter-section d-flex align-items-center mb-3">
    <div class="form-group mr-3">
        <label for="startDate" class="font-weight-bold">Start Date:</label>
        <input type="date" class="form-control" id="startDate" value="{{ $start_of_week }}">
    </div>
    <div class="form-group mr-3">
        <label for="endDate" class="font-weight-bold">End Date:</label>
        <input type="date" class="form-control" id="endDate" value="{{ $end_of_week }}">
    </div>
    <button id="filterButton" class="btn btn-primary mt-4">Filter</button>
</div>

<table id="example2" class="table tx-center display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Rank</th>
            <th>MSISDN</th>
            <th>Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Points</th>
            <th>Subscribe Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
       
    </tbody>
</table>


   <!--  <table id="example2" class="table tx-center display" cellspacing="0" width="100%">
        <thead>
            <tr >
            <th>Rank</th>
            <th>MSISDN</th>
            <th>Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Points</th>
            <th>Subscribe Date</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @if(isset($alldata))
            @php $counter = 1; @endphp
            @foreach($alldata as $index => $winner)
            <tr id="example">
                <td>{{ $counter++ }}</td>
                <td>{{ $winner->msisdn }}</td>
                <td>{{ $winner->first_name }} {{ $winner->last_name }}</td>
                <td>{{ $winner->prediction_start_time }}</td>
                <td>{{ $winner->prediction_end_time   }}</td>
                <td>{{ $winner->coins }}</td>
                <td>{{ $winner->subscription_date }}</td>                
                <td>
                    <a href="javascript:void(0)" data-userid="{{$winner->id}}" data-start_date="{{$start}}" data-end_date="{{$end}}" data-target="#answer" onclick="openModal()"class="userPrediction">   <i class="fas fa-eye"></i> View</a>                    
                </td>
            </tr>
                @endforeach
                @endif

        </tbody>
    </table> -->
</div>
<!---------------------------- Contestant  Modal -------------------------->

<div id="answer" class="custom-modal">
    <div class="custom-modal-dialog">
        <!-- Modal content -->
        <div class="custom-modal-content">
           <div class="custom-modal-header">
            <h4 class="modal-title">
                <img src="{{ asset('assets/img/logo-goaly.png') }}" height="60" alt="Goaly Logo" id="playLogo">
            </h4>
           <button type="button" style="border:none;background: none ;"onclick="closeModal('answer')">
          <span >✖</span>
        </button>
        </div>

            <div class="custom-modal-body pt-0">
                <div class="standing">
                    <div style="text-align: center;">
                        <img src="{{ asset('images/ajax-loader.gif') }}" id="loaderImg" style="display:none; width: 50px;">
                    </div>
                    <div id="contestant" style="width: 100%; margin-bottom: 10px;"></div>
                    <table class="table table-striped table-responsive">
                        <tbody id="answerTableBody">
                            <!-- Table content will be populated dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!---------------------------- Contestant  Modal End -------------------------->

<div id="answer2" class="custom-modal" >
    <div class="custom-modal-dialog">
        <div class="custom-modal-content">
            <div class="custom-modal-header">
            <h4 class="custom-modal-title">
                <img src="{{ asset('assets/img/logo-goaly.png') }}" height="60" alt="Goaly Logo" id="playLogo">
            </h4>
           <button type="button" style="border:none;background: none ;"onclick="closeModal('answer2')">
              <span >✖</span>
            </button>
        </div>
            <div class="custom-modal-body pt-0">            
                <div class="standing"style="overflow-x: auto;">                    
                    <table class="table table-striped table-responsive" style="width: 100%;  table-layout: auto;">
                        <thead>
                            <tr class="clr-aqua">
                                <th id="numberTitle">No</th>
                                <th id="playerTitle">Question</th>
                                <th id="pointTitle">Answer</th>
                            </tr>
                        </thead>
                        <tbody id="answerBody"style="width: 100%;">
                            <!-- Content will be populated here -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<!---------------------------- Contestant  Answer Modal End -------------------------->
<script>
    function openModal() {
        document.getElementById('answer').classList.add('active');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.remove('active');
    }

</script>
@endsection