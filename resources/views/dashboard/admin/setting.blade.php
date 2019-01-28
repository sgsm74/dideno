@extends('dashboard.layouts.layout')
@section('pageName')
تنظیمات سایت
@endsection
@section('content')
<div class="row" style="margin:0;">
  <div class="col-md-12">
    <div class="row">
      <div class="col-lg-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">تنظیمات حساب</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <div class="card-body" style="padding: 20px;">
            <form method="POST" action="{{ route('admin.setting.update') }}">
              @csrf
              @method('PATCH')
              <div class="form-group row">
                <label for="title" class="col-md-2 col-form-label text-md-right">عنوان </label>
                <div class="col-md-4">
                  <input id="title" type="text" class="form-control" name="title" value="{{ $setting->title }}" required autofocus>
                </div>
                <label for="phone" class="col-md-2 col-form-label text-md-right">تلفن</label>
                <div class="col-md-4">
                  <input id="phone" type="text" class="form-control" name="phone" value="{{ $setting->phone }}" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label text-md-right">ایمیل</label>
                <div class="col-md-4">
                  <input id="email" type="email" class="form-control" name="email" value="{{ $setting->email }}" required>
                </div>
                <label for="address" class="col-md-2 col-form-label text-md-right">آدرس</label>
                <div class="col-md-4">
                  <input id="address" type="text" class="form-control" name="address" value="{{ $setting->address }}" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="instagram" class="col-md-2 col-form-label text-md-right">لینک اینستاگرام</label>
                <div class="col-md-4">
                  <input id="instagram" type="text" class="form-control" name="instagram" value="{{ $setting->instagram }}" required>
                </div>
                <label for="telegram" class="col-md-2 col-form-label text-md-right">لینک تلگرام</label>
                <div class="col-md-4">
                  <input id="telegram" type="text" class="form-control" name="telegram" value="{{ $setting->telegram }}" required>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="facebook" class="col-md-2 col-form-label text-md-right">لینک فیس بوک</label>
                <div class="col-md-4">
                  <input id="facebook" type="text" class="form-control" name="facebook" value="{{ $setting->facebook }}" required>
                </div>
                <label for="twitter" class="col-md-2 col-form-label text-md-right">لینک توییتر</label>
                <div class="col-md-4">
                  <input id="twitter" type="text" class="form-control" name="twitter" value="{{ $setting->twitter }}" required>
                </div>
              </div>
              <div class="form-group row">
                  <div class="col-md-12">
                    <textarea class="form-control" id="about" name="about" rows="10" cols="80" >{{ $setting->about }}</textarea>
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
  </div>
</div>
@endsection
@section('customScript')
<script src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'about', {
      language: 'fa'
    });
</script>
@endsection