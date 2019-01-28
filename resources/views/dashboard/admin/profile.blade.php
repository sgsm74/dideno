@extends('dashboard.layouts.layout')
@section('pageName')
تنظیمات حساب کاربری
@endsection
@section('content')
<div class="row" style="margin:0">
  <div class="col-md-3">
    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="{{ asset('storage/'.Auth::user()->avatar) }}" alt="User profile picture">
        <h3 class="profile-username text-center">{{ Auth::user()->fullname }}</h3>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- About Me Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">درباره من</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <strong><i class="fa fa-book margin-r-5"></i> تحصیلات</strong>
        <p class="text-muted">
          {{ Auth::user()->education }}
        </p>
        <hr>
        <strong><i class="fa fa-map-marker margin-r-5"></i> موقعیت</strong>
        <p class="text-muted">{{ Auth::user()->city??"مکان فعلی شما" }}</p>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="row">
      <div class="col-lg-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">تنظیمات حساب</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <div class="card-body" style="padding: 20px;">
            <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group row">
                <label for="firstName" class="col-md-2 col-form-label text-md-right">نام </label>
                <div class="col-md-4">
                  <input id="firstName" type="text" class="form-control" name="firstName" value="{{ Auth::user()->firstName }}" required autofocus>
                </div>
                <label for="lastName" class="col-md-2 col-form-label text-md-right">نام خانوادگی </label>
                <div class="col-md-4">
                  <input id="lastName" type="text" class="form-control" name="lastName" value="{{ Auth::user()->lastName }}" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label text-md-right">پست الکترونیکی</label>
                <div class="col-md-4">
                  <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" disabled>
                </div>
                <label for="phoneNumber" class="col-md-2 col-form-label text-md-right">شماره تلفن </label>
                <div class="col-md-4">
                  <input id="phoneNumber" type="text" class="form-control" name="phoneNumber" value="{{ Auth::user()->phoneNumber }}" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="SN" class="col-md-2 col-form-label text-md-right">شماره ملی</label>
                <div class="col-md-4">
                  <input id="SN" type="text" class="form-control" name="SN" value="{{ Auth::user()->SN }}" required>
                </div>
                <label for="grade" class="col-md-2 col-form-label text-md-right">مقطع تحصیلی</label>
                <div class="col-md-4">
                  <select name="grade" id="grade" class="form-control" >
                    <option value="none" {{ Auth::user()->grade=='none'?'selected':'' }}>دیپلم به پایین</option>
                    <option value="diploma" {{ Auth::user()->grade=='diploma'?'selected':'' }}>دیپلم</option>
                    <option value="associate" {{ Auth::user()->grade=='associate'?'selected':'' }}>کاردانی</option>
                    <option value="bachelor" {{ Auth::user()->grade=='bachelor'?'selected':'' }}>کارشناسی</option>
                    <option value="master" {{ Auth::user()->grade=='master'?'selected':'' }}>کارشناسی ارشد</option>
                    <option value="doctoral" {{ Auth::user()->grade=='doctoral'?'selected':'' }}>دکترا</option>
                  </select>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="major" class="col-md-2 col-form-label text-md-right">رشته</label>
                <div class="col-md-4">
                  <input id="major" type="text" class="form-control" name="major" value="{{ Auth::user()->major }}" required>
                </div>
                <label for="university" class="col-md-2 col-form-label text-md-right">دانشگاه</label>
                <div class="col-md-4">
                  <input id="university" type="text" class="form-control" name="university" value="{{ Auth::user()->university }}" required>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="fatherName" class="col-md-2 col-form-label text-md-right">نام پدر</label>
                <div class="col-md-4">
                  <input id="fatherName" type="text" class="form-control" name="fatherName" value="{{ Auth::user()->fatherName }}">
                </div>
                <label for="city" class="col-md-2 col-form-label text-md-right">شهر محل سکونت</label>
                <div class="col-md-4">
                  <input id="city" type="text" class="form-control" name="city" value="{{ Auth::user()->city }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="birthday" class="col-md-2 col-form-label text-md-right">تاریخ تولد</label>
                <div class="col-md-4">
                  <input type="text" id="tarikh" class="form-control pull-right" value="{{ Auth::user()->birthday }}">
                  <input type="hidden" id="tarikhAlt" class="form-control" name="birthday">
                </div>
                <label for="gender" class="col-md-2 col-form-label text-md-right">جنسیت</label>
                <div class="col-md-4">
                  <input type="radio" name="gender" value="male" {{ Auth::user()->gender=='male'?'checked':'' }}> مرد
                  <input type="radio" name="gender" value="female" {{ Auth::user()->gender=='female'?'checked':'' }}> زن
                </div>
              </div>
              <div class="form-group row">
                <div class="upload-btn-wrapper">
                  <button class="btn1">آواتار</button>
                  <input type="file" name="avatar" class="form-control" />
                </div>
              </div>
              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-info">
                  ویرایش
                  </button>
                </div>
              </div>
              @include('layouts.error')
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">تغییر گذرواژه</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start --> 
            <div class="card-body" style="padding: 20px;">
                    <form method="POST" action="{{ route('admin.password') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="oldPassword" class="col-md-2 col-form-label text-md-right">گذرواژه فعلی </label>

                            <div class="col-md-4">
                                <input id="oldPassword" type="password" class="form-control" name="oldPassword" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">گذرواژه جدید</label>

                            <div class="col-md-4">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirmation" class="col-md-2 col-form-label text-md-right">تکرار گذرواژه</label>

                            <div class="col-md-4">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-info">
                                    ذخیره
                                </button>
                            </div>
                        </div>
                        @include('layouts.error')
                    </form>
                </div>
          </div>
      </div>
    </div>
  </div>
  <!-- /.col -->
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