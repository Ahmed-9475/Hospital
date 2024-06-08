@extends('Dashboard.layouts.master')
@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Internal   Notify -->
    <link href="{{URL::asset('Dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
{{trans('single_invoices.Add_a_new_invoice')}}
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{trans('single_invoices.Invoices')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('single_invoices.Add_a_new_invoice')}}</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="{{route("single_invoices.store")}}" method="post" autocomplete="off">
                    @method("post")
                    @csrf
                    <div class="row mb-4">
                        <div class="col-3">
                            <label>{{trans('single_invoices.Patient_name')}}</label>
                            <select class="form-control"  @error('Patient_name') is-invalid @enderror name="Patient_name" >
                                <option selected>Open this select menu</option>
                                @foreach($Patients as $Patient)
                                <option value="{{$Patient->patient_id}}">{{$Patient->name}}</option>
                                @endforeach
                            </select>                            
                            @error('Patient_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="col-3">
                            <label>{{trans('single_invoices.Doctor_name')}}</label>
                            <select class="form-control"  @error('Doctor_name') is-invalid @enderror name="Doctor_name" >
                                <option selected>Open this select menu</option>
                                @foreach($Doctors as $Doctor)
                                <option data-sectionId="{{$Doctor->section_id}}" data-section_name="{{$Doctor->section->name}}" value="{{$Doctor->section_id}}">{{$Doctor->name}}</option>
                                @endforeach
                            </select>                            
                            @error('Doctor_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-3">
                            <label>{{trans('single_invoices.Section')}}</label>
                            <input class="form-control fc-datepicker" name="Section"  value="{{old('Section')}}" type="text" readonly >
                                @error('Section')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="col-3">
                            <label>{{trans('single_invoices.Invoice_type')}}</label>
                            <select class="form-control"  @error('Invoice_type') is-invalid @enderror name="Invoice_type" >
                                <option disabled selected>نوع الفاتورة</option>
                                <option value="1">أجل</option>
                                <option value="2">نقدي</option>
                            </select>                            
                                @error('Invoice_type')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>


                    </div>

                    <div class="row mb-5">
                        <div class="col-2">
                            <label>{{trans('single_invoices.Service_name')}}</label>
                            <select class="form-control"  @error('Service_name') is-invalid @enderror name="Service_name" >
                                <option selected>Open this select menu</option>
                                @foreach($services as $service)
                                <option value="{{$service->id}}">{{$service->name}}</option>
                                @endforeach
                            </select>                            
                            @error('Service_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-2">
                            <label>{{trans('single_invoices.Service_price')}}</label>
                            <input class="form-control fc-datepicker" name="Service_price" id='Service_price' value="{{old('Service_price')}}" type="text" readonly >
                            @error('Service_price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-2">
                            <label>{{trans('single_invoices.discount_value')}}</label>
                            <input class="form-control fc-datepicker" name="discount_value" id="discount_value" value="{{old('discount_value')}}" type="text" >
                            @error('discount_value')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-2">
                            <label>{{trans('single_invoices.tax_rate')}}</label>
                            <input class="form-control fc-datepicker" name="tax_rate" id="tax_rate" value="17%" type="text" readonly >
                            @error('tax_rate')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-2">
                            <label>{{trans('single_invoices.tax_value')}}</label>
                            <input class="form-control fc-datepicker" name="tax_value" id='tax_value' value="{{old('tax_value')}}" type="text" readonly >
                            @error('tax_value')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-2">
                            <label>{{trans('single_invoices.taxed_total')}}</label>
                            <input class="form-control fc-datepicker" name="taxed_total" id="taxed_total" value="{{old('taxed_total')}}" type="text" readonly >
                            @error('taxed_total')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>

                    <div class="row mb-5">
                        <div class="col">
                            <label>ملاحظات</label>
                            <textarea rows="5" cols="10" class="form-control" @error('notes') is-invalid @enderror name="notes"></textarea>
                        </div>
                        @error('notes')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mt-5">
                        <div class="col">
                            <button class="btn btn-success">حفظ البيانات</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('Dashboard/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <script>

        $(document).ready(function() {

            // show doctor section 
            $('select[name="Doctor_name"]').on('change', function() {

                var section_id = $('select[name="Doctor_name"]').find(":selected").attr('data-sectionId');
                var section_name = $('select[name="Doctor_name"]').find(":selected").attr('data-section_name');
                $('input[name="Section"]').val(section_name);
                                // alert(section_id)
                // if (section_id) {
                //     $.ajax({
                //         headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                //         url: "{{ URL::to('section')}}/" + section_id,
                //         type: "POST",
                //         data:{},
                //         dataType: "json",
                //         success: function(data) {
                //             $('input[name="Section"]').empty();
                //             $.each(data, function(key, value) {
                //                 $('input[name="Section"]').val(key);
                //             });
                //         },
                //     });

                // } else {
                //     console.log('AJAX load did not work');
                // }

            });
/////////////////////////////////////////////
            // show price services 
            $('select[name="Service_name"]').on('change', function() {
                var service_id = $(this).val();
                if (service_id) {
                    $.ajax({
                        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{ URL::to('service')}}/" + service_id,
                        type: "POST",
                        dataType: "json",
                        success: function(data) {
                            $('input[name="Service_price"]').empty();
                            $.each(data, function(key, value) {
                                $('input[name="Service_price"]').val(key);
                                var Service_price = $("#Service_price").val();
                                var discount_value = $("#discount_value").val();
                                var tax_rate = $("#tax_rate").val();
                                var tax_value = $("#tax_value").val();
                                var taxed_total = $("#taxed_total").val();
                                tax_value = Service_price * parseInt(tax_rate) /100;
                                taxed_total = Service_price -tax_value;
                                $("#tax_value").val(tax_value)
                                $("#taxed_total").val(taxed_total)
                                // if(isset(discount_value)&& discount_value > 0 && discount_value < Service_price ){
                                // }
                            });
                        },
                    });
                    
                } else {
                    console.log('AJAX load did not work');
                }
            });



            $("#discount_value").on("change",function(){
                var discount_value =   $("#discount_value").val();
                var taxed_total = $("#taxed_total").val();
                var sum = taxed_total-discount_value;
                // $("#taxed_total").val().empty();
                $("#taxed_total").val(sum);
            });



        }); 

        $(document).ready(function() {



        });
    
    </script>
    <script src="{{URL::asset('Dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
