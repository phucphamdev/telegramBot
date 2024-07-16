@extends('version2.layouts.master')
@section('title')
    @lang('Withdraws version 2')
@endsection
@section('content')
    @component('version2.components.breadcrumb')
        @slot('li_1')
            @lang('Withdraws')
        @endslot
        @slot('title')
            @lang(' Withdraws Version 2')

        @endslot
    @endcomponent



@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/prismjs/prismjs.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection