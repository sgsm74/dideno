@if (Session::has('msg'))
   <div class="alert alert-danger">{{ Session::get('msg') }}</div>
@endif