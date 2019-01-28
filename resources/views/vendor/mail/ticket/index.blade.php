@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            گروه آموزشی دیدنو  
        @endcomponent
    @endslot
{{-- Body --}}
    {{$user->fullname}} گرامی

      از شرکت شما در رویداد {{$event->title}} سپاسگذاریم
      
      تاریخ رویداد: {{DateHelper::setToJalaliDate($event->date)}}
      مکان رویداد: {{$event->location}}

      شماره پیگیری پرداخت: {{$cash->RefId}}
      زمان  پرداخت: {{DateHelper::setToJalaliDate($cash->created_at)}}

       بلیت شرکت در رویداد پیوست گردیده است


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