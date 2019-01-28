@extends('dashboard.layouts.layout')
@section('pageName')
مطالب
@endsection
@section('content')
<div class="row" style="margin:0;">
  <section class="col-md-12">
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">مطلب جدید</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="title" class="col-md-2 control-label">عنوان مطلب</label>

                  <div class="col-md-4">
                    <input type="text" class="form-control" id="title" name="title" placeholder="عنوان رویداد" value="{{ old('title') }}">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-12">
                    <textarea class="form-control" id="content" name="content" rows="10" cols="80" >{{ old('content') }}</textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-5">
                    <div class="upload-btn-wrapper">
                      <button class="btn1">تصویر شاخص</button>
                      <input type="file" name="thumbnail" class="form-control" />
                    </div>
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success">ایجاد</button>
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
<script>
CKEDITOR.replace( 'content', {
      language: 'fa'
    });
</script>
@endsection