@extends('dashboard.layouts.layout')
@section('pageName')
شرکت کنندگان
@endsection
@section('content')
<div class="row" style="margin:0;">
  <section class="col-md-12">
    <div class="box box-info">
      <div class="box-header">
        <i class="fa fa-info-circle"></i>
        <h3 class="box-title">شرکت کنندگان</h3>

      </div>
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tbody>
          <tr>
            <th style="width: 20px;">شماره</th>
            <th>نام و نام خانوادگی</th>
            <th>شماره تلفن</th>
            <th>شماره ملی</th>
            <th>تحصیلات</th>
            <th>دانشگاه</th>
          </tr>
            @php
              $count=1;
            @endphp
            @if($users)
              @foreach($users as $user)
                <tr>
                  <td>{{ $count++ }}</td>
                  <td>{{ $user->fullname }}</td>
                  <td>{{ $user->phoneNumber }}</td>
                  <td>{{ $user->SN }}</td>
                  <td>{{ $user->education }}</td>
                  <td>{{ $user->university }}</td>
                </tr>
             @endforeach
           @else
            <tr>
              <td colspan="7">تاکنون کاربری در این رویداد شرکت نکرده است</td>
            </tr>
          @endif

        </tbody></table>
      </div>
    </div>
  </section>
</div>
@endsection
@section('script')


@endsection