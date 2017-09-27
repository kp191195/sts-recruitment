@extends('layout.master')

@section('title','Administration Detail')

@section('navigation')
    @include('include.nav')
@endsection
@section('css')
<style>
.container {
    padding-top: 10px;
    padding: 16px;
}

</style>
@endsection
@section('content')

    <div class="container" ng-app="AdministrasiApp" ng-controller="AdministrasiCtrl" >

        <h2><Strong>ADMINISTRATION</Strong></h2>
        <br><br>
        
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-1">Name :</div>
                    <div class="col-md-1">{{$name}}</div>
                    <div class="col-md-1"> </div>
                    <div class="col-md-1">Job : </div>
                    <div class="col-md-2">{{$job}}</div>
                    
                </div>
                <div class="row">
                    <div class="col-md-1">E-mail : </div>
                    <div class="col-md-2">{{$email}}</div>
                    <div class="col-md-2">Qualified : </div>
                    <div class="col-md-1">{{$qualified}}</div>
                </div>
            </div>
        </div>
        
        <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-1">No</div>
                <div class="col-md-4">Item Check List</div>
                <div class="col-md-4">Penerimaan</div>
                <div class="col-md-3">Action</div>
            </div>
        </div>
            <div class="panel-body">
                @foreach ($dataAdmin as $row)
                    <div class="row">
                        <div class="col-md-1">{{$row->sort_no}}</div>
                        <div class="col-md-4">{{$row->admin_combo_param}}</div>
                        <div class="col-md-4">
                            <select name="penerimaan" id="terima" ng-model="selectedValue{{$row->sort_no}}" >
                                @foreach($comboPenerimaan as $combo)
                                    <option ng-selected= "'{{$combo->parameter}}' == '{{$row->received_data_param}}'" value="{{$combo->parameter}}">{{ $combo->parameter}}</option>
                                @endforeach 
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button ng-click="actionButton({{$employeeId}},{{$row->id}},'{{$row->admin_combo_param}}',selectedValue{{$row->sort_no}})" class="btn btn-default" type="button">Save</button>
                        </div>
                    </div>
                @endforeach
            </div>
</div>
    </div>
    

@endsection
@section('script')
    <script src="/assets/app/administrasi/js/administrasi.js"></script>
@endsection