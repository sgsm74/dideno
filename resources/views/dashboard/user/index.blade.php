@extends('dashboard.layouts.layout')
@section('pageName')
پنل مدیریت
@endsection
@section('content')
<!-- Main row -->
<div class="row">
	<!-- right col -->
	<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
		<!-- TO DO List -->
		{{-- <div id="app"> --}}
			@php
		        use Carbon\Carbon;
		    @endphp
		    @if($closeEvent)
		        <count-down deadline="{{ $closeEvent->date->toFormattedDateString() }}" desc="{{ $closeEvent->title }}"></count-down>
		    @else
		        <count-down deadline="{{ now() }}" desc="در حال حاضر رویدادی در پیش رو نمی باشد"></count-down>
		    @endif
		{{-- </div> --}}
	</div>
</div>
<div class="row" style="margin-top: 20px;">
	<section class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
		<div class="box box-info">
			<div class="box-header">
				<i class="fa fa-info-circle"></i>
				<h3 class="box-title">رویداد های ثبت نام شده</h3>
			</div>
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tbody><tr>
						<th>عنوان</th>
						<th>مکان</th>
						<th>زمان</th>
						<th>عملیات</th>
					</tr>
					@if($events->count()!=0)
						@foreach($events as $event)
							<tr>
								<td>{{ $event->title }}</td>
								<td>{{ $event->location }}</td>
								<td>{{ DateHelper::setToJalaliDate($event->date) }}</td>
								@foreach($cashes as $cash)
									@if($cash->event_id == $event->id)
										<td><a href="{{ $cash->ticket->file }}" class="label label-success three-d">دریافت بلیت</a></td>
									@endif
								@endforeach
							</tr>
						@endforeach
					@else
						<tr>
							<td colspan="4">شما تاکنون در رویدادی شرکت نکرده اید</td>
						</tr>
					@endif
				</tbody></table>
			</div>
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