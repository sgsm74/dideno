@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            گروه آموزشی دیدنو  
        @endcomponent
    @endslot
{{-- Body --}}
    {{$user->fullname}} گرامی
      از این که در وبسایت گروه آموزشی دیدنو عضو شده اید سپاسگذاریم


{{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset
{{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}
        @endcomponent
    @endslot
@endcomponent