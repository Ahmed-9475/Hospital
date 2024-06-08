@extends('Dashboard.layouts.master')
@section('css')
<!--Internal   Notify -->
<link href="{{URL::asset('Dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
    {{trans('insurance.Insurance')}}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('insurance.Insurance')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('main-sidebar_trans.Insurance')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

@include('Dashboard.messages_alert')

    <!-- row -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('insurances.create')}}" class="btn btn-primary">{{trans('insurance.Add_Insurance')}}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap text-center" id="example1">
                            <thead>
                            <tr class="table-secondary">
                                <th>#</th>
                                <th >{{trans('insurance.Company_code')}}</th>
                                <th >{{trans('insurance.Company_name')}}</th>
                                <th >{{trans('insurance.discount_percentage')}}</th>
                                <th >{{trans('insurance.Insurance_bearing_percentage')}}</th>
                                <th >{{trans('insurance.status')}}</th>
                                <th >{{trans('insurance.notes')}}</th>
                                <th >{{trans('insurance.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($Insurance as $insurance)
                                    <tr>
                                        <td>#</td>
                                        <td>{{$insurance->insurance_code}}</td>
                                        <td>{{$insurance->name}}</td>
                                        <td>{{$insurance->discount_percentage}}</td>
                                        <td>{{$insurance->Company_rate}}</td>
                                        <td>
                                            <div style="left: 17px"class="dot-label bg-{{$insurance->status == 1 ? 'success':'danger'}} ml-1"></div>
                                            
                                            {{$insurance->status == 1 ? trans('doctors.Enabled'):trans('doctors.Not_enabled')}}
                                            
                                        </td>
                                        <td>{{$insurance->notes}}</td>
                                        <td>
                                            <a class=" btn btn-sm btn-info"   href="{{route("insurances.edit",$insurance->id)}}"><i class="las la-pen"></i></a>
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" data-target="#delete{{$insurance->id}}"  href="#"><i class="las la-trash"></i></a>
                                        </td>
                                    @include('Dashboard.Insurance.delete') 

                                    </tr> 
                                    
                                    

                                    @endforeach    


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

    <!--Internal  Notify js -->
    <script src="{{URL::asset('Dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/notify/js/notifit-custom.js')}}"></script>

@endsection
