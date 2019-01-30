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
            @if($events)
            @foreach($events as $event)
          <tr>
            <td>{{ $count++ }}</td>
            <td><a href="{{ route('showEvent', $event->id) }}">{{ $event->title }}</a></td>
            <td>{{ DateHelper::setToJalaliDate($event->date) }}</td>
            <td>{{ $event->location }}</td>
            <td>{{ $event->cost }} تومان</td>
            <td>{{ $event->capacity }}</td>
            <td>
              <a style="padding-left: 2px" href="{{ route('admin.events.show',$event->id) }}" title="ویرایش"><span class="fa fa-edit (alias)"></span></a>
              <a style="padding-left: 2px" href="{{ route('admin.events.delete', $event->id) }}" title="حذف"><span class="fa fa-trash"></span></a>
              <a style="padding-left: 2px" href="{{ route('admin.events.users', $event->id) }}" title="شرکت کنندگان"><span class="fa fa-users"></span></a>
              <a style="padding-left: 2px" href="{{ route('admin.discounts', $event->id) }}" title="ایجاد کد تخفیف"><span class="fa fa-money"></span></a>
                
            </td>
          </tr>
           @endforeach
           @else
          <tr>
            <td colspan="7">در حال حاضر هیچ رویدادی در پیش رو نمی باشد.</td>
          </tr>
          @endif

        </tbody></table>
      </div> {{ $events->links() }}
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