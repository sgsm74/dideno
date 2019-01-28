@extends('dashboard.layouts.layout')
@section('pageName')
رویدادها
@endsection
@section('content')
<div class="row" style="margin:0;">
  <section class="col-md-12">
    <div class="box box-info">
      <div class="box-header">
        <i class="fa fa-info-circle"></i>
        <h3 class="box-title">اطلاعات رویدادها</h3>
      </div>
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tbody>
          <tr>
            <th style="width: 20px;">شماره</th>
            <th>عنوان</th>
            <th>زمان</th>
            <th>مکان</th>
            <th>هزینه</th>
            <th>ظرفیت</th>
            <th>عملیات</th>
          </tr>
            @php
            $count=1;
            @endphp
            @if($events->count()!=0)
              @foreach($events as $event)
                <tr>
                  <td>{{ $count++ }}</td>
                  <td>{{ $event->title }}</td>
                  <td>{{ DateHelper::setToJalaliDate($event->date) }}</td>
                  <td>{{ $event->location }}</td>
                  <td>{{ $event->cost }} تومان</td>
                  <td>{{ $event->capacity }}</td>
                  <td>
                    @if($event->capacity && $event->date > now())
                      <a href="{{ route('user.event.show',$event->id) }}" class="label label-success three-d" >ثبت نام</a>
                    @elseif(!$event->capacity)
                      <span class="label label-danger three-d">ظرفیت تکمیل</span>
                    @elseif($event->date < now())
                      <a href=""><span class="label label-info">برگزار شده</span></a>
                    @endif
                    <a href="{{ route('showEvent', $event->id) }}" class="label label-warning three-d" target="_blank">اطلاعات بیشتر</a>
                  </td>
                </tr>
             @endforeach
           @else
            <tr>
              <td colspan="7">در حال حاضر هیچ رویدادی در پیش رو نمی باشد.</td>
            </tr>
          @endif
           @include('layouts.errors')
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