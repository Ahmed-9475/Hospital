@extends('Dashboard.layouts.master')
@section('title')
    {{trans('main-sidebar_trans.group_services')}}
@stop
@section('css')
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/plugins/sumoselect/sumoselect-rtl.css') }}">
    <link href="{{URL::asset('Dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

    <!-- Internal Select2 css -->
    <link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{URL::asset('Dashboard/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{URL::asset('Dashboard/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">

@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('main-sidebar_trans.Services')}}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('main-sidebar_trans.group_services')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    @include('Dashboard.messages_alert')
    <div>
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
        
                            <div class="mb-3">
                                <label for="text1" class="form-label">{{trans('Services.group_name')}}</label>
                                <input class="form-control form-control-lg" id="text1" type="text" name="groupName"   aria-label=".form-control-lg example">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">{{trans('Services.description')}}</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
        
                    </div>
                </div>
        
            </div>
        
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        {{-- button Add groupServices --}}
                        <div class="mb-3">
                            <button type="button" id="btnServices" class="btn btn-outline-primary">{{trans('Services.add_Service')}}</button>
                        </div>
        
                        {{-- Form groupServices --}}
                        <div class="mb-3 table-responsive">
                            <table id="tbaddserv" class="table table-info text-center text-md-nowrap">
                                <form action="" method="post" id="formdata" autocomplete="off">
                    
                                    <thead>
                                        <tr>
                                            <th style="padding-top:10px;font-size: 13px" scope="col">{{trans('Services.Service_name')}}</th>
                                            <th style="padding-top:10px;font-size: 13px" scope="col">{{trans('Services.price')}}</th>
                                            <th style="font-size: 13px" scope="col">{{trans('Services.number')}}</th>
                                            <th style="font-size: 13px" scope="col">{{trans('Services.Processes')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tbody class="actionservices">
        
                                        </tbody >
                                        {{-- Start add sevices --}}
                                        <tr>
                                            
                                            <td>
                                                <select wire.model='services' style="padding:0px" id="Services" class="form-control-lg mb-4"  aria-label=".form-select-lg example">
                                                    <option disabled selected>Open this select menu</option>
                                                    {{-- @foreach ($test as $tests) --}}
                                                    <option value=""></option>
                                                    {{-- @endforeach --}}
                                                </select> 
        
                                            </td>
                                            
                                            <td><input class="form-control "  type="number" readonly></td>
                                            <td><input class="form-control "   type="number" ></td>
                                            <td>
                                                <div id="confirm">
                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"  data-toggle="modal" data-target="" href="#">تاكيد</i></a>
                                                    <a class='btn-sm btn-danger'  id='btnDeleteparent'><i class='las la-trash'></i></a>
        
                                                </div>
                                            </td>
                                        </tr>
                    
                                    </tbody>
        
                                </form>
                            </table>
                            {{-- start calc services --}}
                            <div class="col-lg-4 ml-auto text-right">
                                <table class="table table_result pull-right">
                                    <tr>
                                        <td style="color: red">الاجمالي</td>
                                        <td><input name ="total" readonly value="" class="form-control"  type="text"></td>
                                    </tr>
        
                                    <tr>
                                        <td style="color: red">قيمة الخصم</td>
                                        <td width="125">
                                            <input type="number" name="discount_value" class="form-control w-75 d-inline">
                                        </td>
                                    </tr>
        
                                    <tr>
                                        <td style="color: red">نسبة الضريبة</td>
                                        <td>
                                            <input type="number" name="taxes" class="form-control w-75 d-inline" min="0"max="100"> %
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="color: red">الاجمالي مع الضريبة</td>
                                        <td> 20</td>
                                    </tr>
                                </table>
                            </div>
        
                            <input class="btn btn-outline-success" type="submit" value="تاكيد البيانات">
        
                        </div>
        
                    </div>
                </div>
        
            </div>
        
            
        </div>
            </div>
    
@endsection


