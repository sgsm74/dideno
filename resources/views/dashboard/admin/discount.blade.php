@extends('dashboard.layouts.layout')
@section('pageName')
کد تخفیف
@endsection
@section('content')
<div class="row" style="margin:0">
	<div class="col-lg-4">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">کد تخفیف جدید</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<form role="form" method="post" action="{{ route('admin.discounts.store') }}">
				@csrf
				<div class="box-body">
					<div class="form-group">
						<label for="code">کد</label>
						<div class="input-group">
			                <input type="text" class="form-control" id="code" placeholder="کد" name="code">
			                <span class="input-group-addon">_DN</span>
			            </div>
					</div>
					<div class="form-group row">
						<div class="col-md-6">
							<div class="input-group">
				                <input type="text" class="form-control" id="percent" placeholder="درصد تخفیف" name="percent">
				                <span class="input-group-addon">%</span>
			            	</div>
						</div>
						<div class="col-md-6">
							<div class="input-group">
				                <input type="text" class="form-control" id="count" placeholder="تعداد" name="count">
				                <span class="input-group-addon"><span class="fa fa-user"></span></span>
			            	</div>
						</div>
					</div>
					<div class="form-group">
						<label for="expireDate">تاریخ انقضا</label>
						<input type="text" id="tarikh" class="form-control pull-right">
						<input type="hidden" id="tarikhAlt" class="form-control" name="expireDate">
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">افزودن</button>
				</div>
				@include('layouts.error')
				@include('layouts.errors')
			</form>
		</div>
	</div>
	<div class="col-lg-8">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">لیست کدها</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<th>کد</th>
							<th>درصد</th>
							<th>تاریخ انقضا</th>
							<th>تعداد</th>
							<th>عملیات</th>
						</tr>
						@if($codes->count()>0)
							@foreach($codes as $code)
								<tr>
									<td>{{ $code->code }}</td>
									<td>{{ $code->percent }}</td>
									<td>{{ DateHelper::setToJalaliDate($code->expireDate) }}</td>
									<td>{{ $code->count }}</td>
									<td><a href="{{ route('admin.discounts.delete', $code->id) }}" title="حذف"><span class="fa fa-trash"></span></a></td>
								</tr>
							@endforeach
						@else
						<tr>
							<td colspan="5">هیچ کد تخفیفی یافت نشد</td>
						</tr>
						@endif
					</tbody></table>
				</div>
			</div>
		</div>
	</div>
	@endsection
	@section('customScript')
	<!-- Jalali Calendar -->
	<script src="{{ asset('dist/js/persian-date-0.1.8.min.js') }}"></script>
	<script src="{{ asset('dist/js/persian-datepicker-0.4.5.min.js') }}"></script>
	<script>
		$(function() {
			$("#tarikh").persianDatepicker({
			altField: '#tarikhAlt',
			altFormat: 'X',
			format: 'D MMMM YYYY',
			observer: true,
			});
		});
	</script>
	@endsection