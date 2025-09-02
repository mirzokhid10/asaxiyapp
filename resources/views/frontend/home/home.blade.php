@extends('frontend.layouts.master')

@section('content')
    <main>
        <div class="">
            {{-- <!--============================
               WEEKLY BEST ITEM START
           ==============================--> --}}

            @include('frontend.home.sections.super_price')

            {{-- <!--============================
                WEEKLY BEST ITEM END
            ==============================--> --}}

            {{-- <!--============================
                WEEKLY BEST ITEM START
            ==============================--> --}}
{{--            @include('frontend.home.sections.advertisements')--}}
            {{-- <!--============================
                WEEKLY BEST ITEM END
            ==============================--> --}}

            {{-- <!--============================
                WEEKLY BEST ITEM START
            ==============================--> --}}
            @include('frontend.home.sections.brands')
            {{-- <!--============================
                WEEKLY BEST ITEM END
            ==============================--> --}}
        </div>
    </main>
@endsection
