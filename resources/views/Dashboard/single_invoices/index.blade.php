@extends('Dashboard.layouts.master')
@section('css')
<link href="{{URL::asset('Dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{trans('single_invoices.Invoices')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('single_invoices.single_invoices')}}</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row opened -->
				<div class="row row-sm">
					<!--div-->
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
                                    <a href="{{route('single_invoices.create')}}" class="btn btn-primary">{{trans('single_invoices.Add_a_new_invoice')}}</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th>#</th>
												<th>{{trans('single_invoices.Service_name')}}</th>
												<th >{{trans('single_invoices.Patient_name')}}</th>
												<th>{{trans('single_invoices.Invoice_date')}}</th>
												<th>{{trans('single_invoices.Doctor_name')}}</th>
												<th>{{trans('single_invoices.Section')}}</th>
                                                <th >{{trans('single_invoices.Service_price')}}</th>
                                                <th >{{trans('single_invoices.discount_value')}}</th>
                                                <th>{{trans('single_invoices.tax_rate')}}</th>
                                                <th>{{trans('single_invoices.tax_value')}}</th>
                                                <th>{{trans('single_invoices.taxed_total')}}</th>
                                                <th>{{trans('single_invoices.Invoice_type')}}</th>
                                                <th>{{trans('single_invoices.Processes')}}</th>
											</tr>
										</thead>
										<tbody>
											@foreach($invoices as $invoice)
											<tr>
                                                <td>{{$invoice->id}}</td>
                                                <td>{{$invoice->name}}</td>
                                                <td>{{$invoice->email}}</td>
                                                <td>{{$invoice->Date_Birth}}</td>
                                                <td>{{$invoice->Phone}}</td>
                                                <td>{{$invoice->Gender == 1 ? 'ذكر' :'انثي'}}</td>
                                                <td>{{$invoice->Blood_Group}}</td>
                                                <td>{{$invoice->Address}}</td>
                                                <td>
                                                    <a href="" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#Deleted"><i class="fas fa-trash"></i></button>

                                                </td>
											</tr>
                                        {{-- @include('Dashboard.Patients.Deleted') --}}
                                        @endforeach
										</tbody>
									</table>
								</div>
							</div><!-- bd -->
						</div><!-- bd -->
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
    <!--Internal  Notify js -->
    <script src="{{URL::asset('Dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
