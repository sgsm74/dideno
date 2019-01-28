@extends('dashboard.layouts.layout')
@section('pageName')
مدیران
@endsection
@section('content')
<div class="row" style="margin:0;">
  <section class="col-md-12">
    <div class="box box-info">
      <div class="box-header">
        <i class="fa fa-info-circle"></i>
        <h3 class="box-title">مدیران</h3>

      </div>
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tbody>
          <tr>
            <th style="width: 20px;">شماره</th>
            <th>نام و نام خانوادگی</th>
            <th>شماره تلفن</th>
            <th>ایمیل</th>
            <th>تحصیلات</th>
            <th>دانشگاه</th>
            <th>زمان ثبت نام</th>
            <th>عملیات</th>
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
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->education }}</td>
                  <td>{{ $user->university }}</td>
                  <td>{{ DateHelper::setToJalaliTime($user->created_at) }}</td>
                  <td>
                    <a style="padding-left: 2px" href="{{ route('admin.users.show',$user->id) }}" title="مشاهده"><span class="fa fa-info-circle"></span></a>
                    <a style="padding-left: 2px" href="{{ route('admin.users.delete', $user->id) }}" title="حذف"><span class="fa fa-trash"></span></a>
                    <a style="padding-left: 2px" href="{{ route('admin.users.downgrade', $user->id) }}" title="تنزل"><span class="fa fa-arrow-circle-down"></span></a>
                  </td>
                </tr>
             @endforeach
           @else
          <tr>
            <td colspan="7">تاکنون کاربری در این رویداد شرکت نکرده است</td>
          </tr>
          @endif

        </tbody></table>
      </div> {{ $users->links() }}
    </div>
  </section>
</div>
@endsection
@section('script')


@endsection