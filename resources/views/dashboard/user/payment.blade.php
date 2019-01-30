@extends('dashboard.layouts.layout')
@section('pageName')
اطلاعات خرید
@endsection
@section('content')
<section class="invoice">
	<!-- title row -->
	<div class="row" >
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
		<div class="col-sm-4 invoice-col">
			<address>
				<strong>مشخصات خریدار</strong><br>
				<ul style="list-style-type: none;padding: 10px 0px">
					<li style="padding: 10px 0px;">نام و نام خانوادگی شرکت کننده:<strong>{{ Auth::user()->fullname }}</strong></li>
					<li style="padding: 10px 0px;">شماره تلفن:<strong>{{ Auth::user()->phoneNumber }}</strong></li>
				</ul>
			</address>
		</div>
		<!-- /.col -->
		<div class="col-sm-4 invoice-col">
			<address>
				<strong>مشخصات رویداد</strong><br>
				<ul style="list-style-type: none;padding: 10px 0px">
					<li style="padding: 10px 0px;">عنوان رویداد: <strong>{{ $event->title }}</strong></li>
					<li style="padding: 10px 0px;">مکان: <strong>{{ $event->location }}</strong></li>
					<li style="padding: 10px 0px;">زمان: <strong>{{ DateHelper::setToJalaliDate($event->date) }}</strong></li>
				</ul>
			</address>
		</div>
		<!-- /.col -->
		<div class="col-sm-4 invoice-col" id="app">
			
			<discount-component cost="{{ $event->cost }}"></discount-component>

		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
	<div class="row">
		<!-- accepted payments column -->
		<div class="col-lg-6 col-md-6 col-sm-12">
			<p class="lead">درگاه های پرداخت</p>
			<img src="{{ asset('dist/img/credit/zarinpal.jpg') }}" alt="Zarinpal" style="width: 50px;height: 50px">
			<p class="text-muted well well-sm no-shadow col-md-12" style="margin-top: 10px;">
				پرداخت از طریق کلیه کارت های بانکی عضو شتاب امکان پذیر می باشد.
			</p>
		</div>
	</div>
	<!-- /.row -->
	<!-- this row will not appear when printing -->
	<div class="row no-print">
		<form method="post" action="{{ route('user.gateway') }}">
			@csrf
			<input type="hidden" name="id" value="{{ $event->id }}">
			<div class="col-xs-12">
				<button type="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> تایید و پرداخت
				</button>
			</div>
		</form>
		
	</div>
</section>
@endsection
@section('script')
<!-- Jalali Calendar -->
{{-- <script src="{{ asset('dist/js/persian-date-0.1.8.min.js') }}"></script>
<script src="{{ asset('dist/js/persian-datepicker-0.4.5.min.js') }}"></script>
<script src="{{ asset('dist/js/task.js') }}"></script> --}}
@endsection