@extends('dashboard.layouts.layout')
@section('pageName')
رویدادها
@endsection
@section('content')
<div class="row" style="margin:0;">
  <section class="col-md-12">
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">رویداد جدید</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="{{ route('admin.events.update', $event->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              <div class="box-body">
                <div class="form-group">
                  <label for="title" class="col-md-2 control-label">عنوان رویداد</label>

                  <div class="col-md-4">
                    <input type="text" class="form-control" id="title" name="title" placeholder="عنوان رویداد" value="{{ $event->title }}">
                  </div>

                  <label for="location" class="col-md-2 control-label">مکان رویداد</label>

                  <div class="col-md-4">
                    <input type="text" class="form-control" id="location" name="location" placeholder="مکان رویداد" value="{{ $event->location }}">
                  </div>
                </div>
                <div class="form-group">
                  
                  <label for="date" class="col-md-2 control-label">زمان رویداد</label>
                  <div class="col-md-3">
                    <input type="text" id="tarikh" class="form-control pull-right" value="{{ $event->date }}">
                    <input type="hidden" id="tarikhAlt" class="form-control" name="date">
                  </div>

                  <label for="cost" class="col-md-2 control-label">هزینه رویداد</label>
                  <div class="col-md-2">
                    <input type="text" name="cost" id="cost" class="form-control" placeholder="هزینه رویداد به تومان" value="{{ $event->cost }}">
                  </div>

                  <label for="capacity" class="col-md-2 control-label">ظرفیت</label>
                  <div class="col-md-1">
                    <input type="text" name="capacity" id="capacity" class="form-control" placeholder="ظرفیت رویداد" value="{{ $event->capacity }}">
                  </div>

                </div>
                <div class="form-group">
                  <div class="col-md-12">
                    <textarea class="form-control" id="describtion" name="describtion" rows="10" cols="80" >{{ $event->describtion }}</textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-5">
                    <div class="upload-btn-wrapper">
                      <button class="btn1">پوستر</button>
                      <input type="file" name="poster" class="form-control"/>
                    </div>
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success">به روز رسانی</button>
                <button type="reset" class="btn btn-warning">بازنشانی</button>
              </div>
              <!-- /.box-footer -->
            @include('layouts.error')
            </form>
          </div>
  </section>
</div>
@endsection
@section('customScript')
<script src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
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
CKEDITOR.replace( 'describtion', {
      language: 'fa'
    });
</script>
@endsection