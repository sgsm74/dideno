@extends('dashboard.layouts.layout')
@section('pageName')
وضعیت تراکنش
@endsection
@section('content')
<section class="invoice">
	<!-- title row -->
	<div class="row">
		<div class="col-xs-12">
			<h2 class="page-header">
			<i class="fa fa-globe"></i> گروه آموزشی دیدنو
			<small class="pull-left">{{ DateHelper::setToJalaliDate(now()) }}</small>
			</h2>
		</div>
		<!-- /.col -->
	</div>
	<!-- info row -->
	<div class="row invoice-info">
		<strong>وضعیت پرداخت:</strong>
		@if(!isset($error))
			<span class="label label-success">موفق</span>
		@else
			<span class="label label-danger">ناموفق</span>
		@endif
	</div>
	<br>
	@if(isset($error))
	<div class="row">
		<div class="col-lg-12">
			<span>توضیحات: <strong>{{ $error }}</strong></span>
		</div>						
	</div>
	@endif
	@if(!isset($error))
	<div class="row">
		<div class="col-lg-12">
			<ul style="list-style-type: none;padding: 10px 0px;display: inline-block">
				<li style="padding: 10px 10px;;display: inline-block">شماره پیگیری: <strong>{{ $RefId }}</strong></li>
				<li style="padding: 10px 10px;;display: inline-block">تاریخ پرداخت: <strong>{{ DateHelper::setToJalaliTime($date) }}</strong></li>
				<li style="padding: 10px 10px;;display: inline-block">مبلغ:<strong>{{ $Amount }} تومان</strong></li>
			</ul>
		</div>
	</div>
	<!-- this row will not appear when printing -->
	<div class="row no-print">
		<div class="col-xs-12">
			<a href="{{ asset($ticket) }}" class="btn btn-success pull-right"><i class="fa fa-file-text"></i> دانلود بلیت
			</a>
		</div>
	</div>
	@endif
</section>
@endsection
@section('script')
<!-- Jalali Calendar -->
{{-- <script src="{{ asset('dist/js/persian-date-0.1.8.min.js') }}"></script>
<script src="{{ asset('dist/js/persian-datepicker-0.4.5.min.js') }}"></script>
<script src="{{ asset('dist/js/task.js') }}"></script> --}}
@endsection