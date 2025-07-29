@extends('admin.layout.admin_template')

@section('admin_content')
    <div class="container-fluid ">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><h5>Rewards</h5></li>
                </ol>
                </nav>
            </div>
            <div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Quiz</button>
            </div>
        </div>
        @if(Session::has('flash_message_success'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">
            {{ Session::get('flash_message_success') }}
        </p>
        @endif
        @if(Session::has('flash_message_error'))
        <p class="alert {{ Session::get('alert-class','alert-danger')}}">
            {{ Session::get('flash_message_error') }}
        </p>
        @endif
        <table id="example2" class="table tx-center">
            <thead>
                <tr>
                    <th> Sl No.</th>
                    <th> Title </th>
                    <th> Coin </th>
                    <th> Banner</th>
                    <th> Icon</th>
                    <th> Is_active </th>
                    <th> Created </th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>

                
                        <tr>
                            <td>  </td>
                            <td> </td>
                            <td>  </td>
                            <td> 
                                
                                <img src='' alt="Banner Image"  height="60"> 
                            </td>
                            <td> 
                                
                                <img src='' alt="Reward Image"  height="60"> 
                            </td>
                            <td> 
                                <input type="checkbox" class="rwd_status" data-reward_id="" data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="primary" data-offstyle="warning">
                            </td>
                            <td> </td>
                            <td>
                                <a href="" class="tx-success"><i data-feather="edit-2"></i></a>
                                <a href="javascript:void(0)" class="tx-danger rwd_del" data-reward_id=""><i data-feather="trash"></i></a>
                            </td>
                        </tr>
                 

            </tbody>
        </table>
    </div>
@endsection
