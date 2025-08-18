@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        {{-- <!--============================
            WEEKLY BEST ITEM START
        ==============================--> --}}
        @include('frontend.home.sections.advertisements')
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
@endsection
