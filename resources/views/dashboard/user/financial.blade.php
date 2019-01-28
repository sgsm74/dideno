@extends('dashboard.layouts.layout')
@section('pageName')
تراکنش های مالی
@endsection
@section('content')
<div class="row" style="margin: 0;">
	<section class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<i class="fa fa-info-circle"></i>
				<h3 class="box-title">تاریخچه خرید</h3>
			</div>
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tbody>
					<tr>
						<th style="width: 20px;">شماره</th>
						<th>عنوان</th>
						<th>زمان</th>
						<th>مبلغ</th>
						<th>شماره پیگیری</th>
						<th>وضعیت</th>
					</tr>
					@php
		            	$count=1;
		            @endphp
		            @if($cashes)
						@foreach($cashes as $cash)
							<tr>
								<td>{{ $count++ }}</td>
								<td>{{ $cash->event->title }}</td>
								<td>{{ DateHelper::setToJalaliTime($cash->created_at) }}</td>
								<td>{{ $cash->Amount }} تومان</td>
								<td>{{ $cash->RefId }}</td>
								@if($cash->RefId)
									<td><span class="label label-success">موفق</span></td>
								@else
									<td><span class="label label-danger">ناموفق</span></td>
								@endif
							</tr>
						@endforeach
					@else
						<tr>
							<td colspan="6">شما تاکنون در رویدادی شرکت نکرده اید</td>
						</tr>
					@endif

				</tbody></table>
				
			</div>{{$cashes->links()}}
		</div>
	</section>
</div>
@endsection
@section('script')
<!-- Jalali Calendar -->
{{-- <script src="{{ asset('dist/js/persian-date-0.1.8.min.js') }}"></script>
<script src="{{ asset('dist/js/persian-datepicker-0.4.5.min.js') }}"></script>
<script src="{{ asset('dist/js/task.js') }}"></script> --}}
@endsection