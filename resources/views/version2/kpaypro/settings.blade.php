@extends('version2.layouts.master')
@section('title')
    @lang('translation.basic-tables')
@endsection
@section('content')
    @component('version2.components.breadcrumb')
        @slot('li_1')
            settings
        @endslot
        @slot('title')
            settings
        @endslot
    @endcomponent



@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/prismjs/prismjs.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection