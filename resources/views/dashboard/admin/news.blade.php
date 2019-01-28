@extends('dashboard.layouts.layout')
@section('pageName')
مطالب
@endsection
@section('content')
<div class="row" style="margin:0;">
  <section class="col-md-12">
    <div class="box box-info">
      <div class="box-header">
        <i class="fa fa-info-circle"></i>
        <h3 class="box-title">همه مطالب</h3>

      </div>
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tbody>
          <tr>
            <th style="width: 20px;">شماره</th>
            <th>عنوان</th>
            <th style="width: 120px">تاریخ</th>
            <th style="width: 120px">عملیات</th>
          </tr>
            @php
              $count=1;
            @endphp
            @if($posts)
              @foreach($posts as $post)
                <tr>
                  <td>{{ $count++ }}</td>
                  <td><a href="{{ route('showBlog', $post->id) }}">{{ $post->title }}</a></td>
                  <td>{{ DateHelper::setToJalaliDate($post->created_at) }}</td>
                  <td>
                    <a style="padding-left: 2px" href="{{ route('admin.news.show',$post->id) }}" title="ویرایش"><span class="fa fa-edit (alias)"></span></a>
                    <a style="padding-left: 2px" href="{{ route('admin.news.delete', $post->id) }}" title="حذف"><span class="fa fa-trash"></span></a>
                      
                  </td>
                </tr>
             @endforeach
           @else
          <tr>
            <td colspan="7">در حال حاضر هیچ رویدادی در پیش رو نمی باشد.</td>
          </tr>
          @endif

        </tbody></table>
      </div> {{ $posts->links() }}
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