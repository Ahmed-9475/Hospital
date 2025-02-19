@extends('Dashboard.layouts.master')
@section('title')
    {{trans('main-sidebar_trans.doctors')}}
@stop
@section('css')
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('sections_trans.section_doctors')}}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{trans('main-sidebar_trans.view_all')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alert')
    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-md-nowrap" id="example2">
                                    <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">{{trans('Doctors.Num')}}</th>
                                        <th class="wd-15p border-bottom-0">#</th>
                                        <th class="wd-15p border-bottom-0">{{trans('Doctors.name')}}</th>
                                        <th class="wd-15p border-bottom-0">{{trans('Doctors.email')}}</th>
                                        <th class="wd-15p border-bottom-0">{{trans('Doctors.section')}}</th>
                                        <th class="wd-15p border-bottom-0">{{trans('Doctors.phone')}}</th>
                                        <th class="wd-15p border-bottom-0">{{trans('Doctors.appointments')}}</th>
                                        <th class="wd-15p border-bottom-0">{{trans('Doctors.price')}}</th>
                                        <th class="wd-15p border-bottom-0">{{trans('Doctors.Status')}}</th>
                                        <th class="wd-15p border-bottom-0">{{trans('Doctors.created_at')}}</th>
                                        <th class="wd-15p border-bottom-0">{{trans('Doctors.Processes')}}</th>
                                        {{-- <th class="wd-20p border-bottom-0"></th> --}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($doctors as $doctor)
                                        <tr>
                                            <td>{{$doctor->id}}</td>
                                            <td>
                                            @if($doctor->image)
                                                <img src="{{Url::asset('Dashboard/img/doctors/'.$doctor->image->filename)}}" width='50px' height='50px' alt="doctor-image">
                                            @else
                                                <img src="{{Url::asset('Dashboard/img/doctor_default.jpg')}}" width='50px' height='50px' alt="doctor-image">

                                            @endif
                                            </td>
                                            <td>{{$doctor->name}}</td>
                                            <td>{{$doctor->email}}</td>
                                            <td>{{$doctor->section->name}}</td>
                                            <td>{{$doctor->phone}}</td>
                                            <td>
                                                @foreach($doctor->appointmentDoctors as $appointment )
                                                    {{$appointment->name}}
                                                @endforeach
                                                
                                            </td>
                                            <td>{{$doctor->price}}</td>
                                            <td>
                                                <div style="left: 17px"class="dot-label bg-{{$doctor->status == 1 ? 'success':'danger'}} ml-1"></div>
                                                    
                                                {{$doctor->status == 1 ? trans('doctors.Enabled'):trans('doctors.Not_enabled')}}
                                            </td>
                                            <td>{{$doctor->created_at->diffForHumans()}}</td>
                                            <td>
                                                {{-- <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"  data-toggle="" href="{{route("Doctors.edit",$doctor->id)}}"><i class="las la-pen"></i></a>
                                                <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$doctor->id}}"><i class="las la-trash"></i></a> --}}
                                                <div class="dropdown">
                                                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown" type="button">{{trans('doctors.Processes')}}<i class="fas fa-caret-down mr-1"></i></button>
                                                    <div class="dropdown-menu tx-13">
                                                        <a class="dropdown-item" href="{{route("Doctors.edit",$doctor->id)}}"><i style="color: #0ba360" class="text-success ti-user"></i>&nbsp;&nbsp;تعديل البيانات</a>
                                                        <a class="dropdown-item" href="" data-toggle="modal" data-target="#update_password{{$doctor->id}}"><i   class="text-primary ti-key"></i>&nbsp;&nbsp;تغير كلمة المرور</a>
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_status{{$doctor->id}}"><i   class="text-warning ti-back-right"></i>&nbsp;&nbsp;تغير الحالة</a>
                                                        <a class="dropdown-item" href="" data-toggle="modal" data-target="#delete{{$doctor->id}}"><i   class="text-danger  ti-trash"></i>&nbsp;&nbsp;حذف البيانات</a>
                                                    </div>
                                                </div>
        
                                            </td>
                                        </tr>
                                    {{-- @include('Dashboard.Doctors.edit') --}}
                                    @include('Dashboard.Doctors.delete')
                                    @include('Dashboard.Doctors.update_password')
                                    @include('Dashboard.Doctors.update_status')

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- bd -->
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('Dashboard/js/table-data.js')}}"></script>

    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>

    <script>
        $(function() {
            jQuery("[name=select_all]").click(function(source) {
                checkboxes = jQuery("[name=delete_select]");
                for(var i in checkboxes){
                    checkboxes[i].checked = source.target.checked;
                }
            });
        })
    </script>


    <script type="text/javascript">
        $(function () {
            $("#btn_delete_all").click(function () {
                var selected = [];
                $("#example input[name=delete_select]:checked").each(function () {
                    selected.push(this.value);
                });

                if (selected.length > 0) {
                    $('#delete_select').modal('show')
                    $('input[id="delete_select_id"]').val(selected);
                }
            });
        });
    </script>



@endsection
