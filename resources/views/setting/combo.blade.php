@extends('layout.master')

@section('title','combo')

@section('navigation')
    @include('include.nav')
@endsection

@section('css')
<style>
#top30 {
    margin-top: 30px;
}

#aligncombo {
	width: 200px;
	height: 30px;
	margin-top: 15px;
}

hr{
	display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #000;
    margin: 1em 0;
    padding: 0;
}

</style>
@endsection

@section('content')
    <div ng-app="SettingApp">
        <div ui-view></div>
    </div>
@endsection
@section('script')
    <script src="/assets/app/setting/js/module.js"></script>
    <script src="/assets/app/setting/js/controller.js"></script>
    <script src="/assets/app/setting/js/service.js"></script>
@endsection