@extends('dashboard.layouts.layout')
@section('pageName')
پنل مدیریت
@endsection
@section('content')
<div class="row" style="margin: auto">
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3>{{ $cashesSum }}</h3>
				<p>فروش</p>
			</div>
			<div class="icon">
				<i class="ion ion-cash"></i>
			</div>
			<a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-green">
			<div class="inner">
				<h3>{{ $eventsCount }}</h3>
				<p>رویدادها</p>
			</div>
			<div class="icon">
				<i class="fa fa-bullhorn"></i>
			</div>
			<a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>{{ $usersCount }}</h3>
				<p>کاربران </p>
			</div>
			<div class="icon">
				<i class="ion ion-person"></i>
			</div>
			<a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>65</h3>
				<p>بازدید جدید</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph"></i>
			</div>
			<a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
		</div>
	</div>
	<!-- ./col -->
</div>
<div class="row" style="margin:auto">
	<div class="col-lg-6">
		<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">آمار فروش</h3>
            </div>
            <div class="box-body" style="">
              <div class="chart">
                <canvas id="barChart" style="height: 230px; width: 510px;" width="510" height="230"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
	</div>
	<div class="col-lg-6">
		<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">آمار بازدید</h3>
            </div>
            <div class="box-body" style="">
              <div class="chart">
                <canvas id="barChart" style="height: 230px; width: 510px;" width="510" height="230"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
	</div>
</div>

<div class="row" style="margin:auto">
	<div class="col-lg-8">
		<div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">ارسال سریع ایمیل</h3>
            </div>
            <div class="box-body">
              <form action="#" method="post">
                <div class="form-group">
                  <input type="email" class="form-control" name="emailto" placeholder="ایمیل">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" placeholder="موضوع">
                </div>
                <div>
                  <textarea class="textarea" placeholder="متن ایمیل" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
              </form>
            </div>
            <div class="box-footer clearfix">
              <button type="button" class="pull-left btn btn-default" id="sendEmail">ارسال
                <i class="fa fa-arrow-circle-left"></i></button>
            </div>
          </div>
	</div>
	<div class="col-lg-4">
		<div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">آخرین کاربران</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">۸ کاربر جدید</span>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    @if($lastUsers)
						@foreach($lastUsers as $user)
		                    <li>
		                      <img src="{{ asset($user->avatar) }}" alt="User Image">
		                      <a class="users-list-name" href="#" title="{{ $user->fullname }}">{{ $user->fullname }}</a>
		                      <span class="users-list-date">امروز</span>
		                    </li>
                    	@endforeach
                    @else
						<li>
		                    در حال حاضر کاربر جدیدی وجود ندارد
		                </li>
                    @endif
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">نمایش همه کاربران</a>
                </div>
                <!-- /.box-footer -->
              </div>
	</div>
</div>
@endsection
@section('script')
<!-- Jalali Calendar -->
{{-- <script src="{{ asset('dist/js/persian-date-0.1.8.min.js') }}"></script>
<script src="{{ asset('dist/js/persian-datepicker-0.4.5.min.js') }}"></script>
<script src="{{ asset('dist/js/task.js') }}"></script> --}}
@endsection