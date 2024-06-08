@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{URL::asset('Dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
   اضافة مريض جديد
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المرضي</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة مريض جديد</span>
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
                <form action="{{route('Patients.store')}}" method="post" autocomplete="off">
                    @method("post")
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <label>اسم المريض</label>
                            <input type="text" name="name"  value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror " >
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="col">
                            <label>البريد الالكتروني</label>
                            <input type="email" name="email"  value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" >
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col">
                            <label>تاريخ الميلاد</label>
                            <input class="form-control fc-datepicker" name="Date_Birth" value="{{old('Date_Birth')}}" placeholder="YYYY-MM-DD"type="date" >
                                @error('Date_Birth')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
 
                            </div>

                    </div>
                    <br>

                    <div class="row">
                        <div class="col-3">
                            <label>رقم الهاتف</label>
                            <input type="number" name="Phone"   value="{{old('Phone')}}" class="form-control @error('Phone') is-invalid @enderror" >
                            @error('Phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col">
                            <label>الجنس</label>
                            <select class="form-control" @error('Gender') is-invalid @enderror name="Gender" >
                                <option value="" selected>-- اختار من القائمة --</option>
                                <option value="1">ذكر</option>
                                <option value="2">انثي</option>
                            </select>
                            @error('Gender')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col">
                            <label>فصلية الدم</label>
                            <select class="form-control"  @error('Blood_Group') is-invalid @enderror name="Blood_Group" >
                                <option value="" selected>-- اختار من القائمة --</option>
                                <option value="O-">O-</option>
                                <option value="O+">O+</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                        @error('Blood_Group')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>العنوان</label>
                            <textarea rows="5" cols="10" class="form-control" @error('Address') is-invalid @enderror name="Address"></textarea>
                        </div>
                        @error('Address')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <br>

                    <div class="row">
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
        // var date = $('.fc-datepicker').datepicker({
        //     dateFormat: 'yy-mm-dd'
        // }).val();
    </script>
    <script src="{{URL::asset('Dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
