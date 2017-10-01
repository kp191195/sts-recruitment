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

#headerAdminstration{
    /*background: #ddd;*/
    margin-bottom: 30px;
}

.pad30{
    padding-left: 15px;
    padding-right: 15px;
}

</style>
@endsection
@section('content')

    <div class="container" ng-app="AdministrasiApp" ng-controller="AdministrasiCtrl" >
        <h2><Strong>ADMINISTRATION</Strong></h2>
    <div class="panel panel-default">     
        <div class="panel-body">
            <div id="headerAdminstration">
                <div class="row" >
                    <div class="col-md-6">
                        <label class="col-md-4 text-right">Name :</label>
                        <div class="col-md-8">{{$name}}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="col-md-4 text-right">Job :</label>
                        <div class="col-md-8">{{$job}}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="col-md-4 text-right">Email :</label>
                        <div class="col-md-8">{{$email}}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="col-md-4 text-right">Qualified :</label>
                        @if($qualified == 'Y')
                        <div class="col-md-8">YES</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row pad30">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Item Check List</th>
                            <th>Penerimaan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataAdmin as $row)
                        <tr>
                            <td>{{$row->sort_no}}</td>
                            <td>{{$row->admin_combo_param}}</td>
                            <td>
                                <select name="penerimaan" id="terima" ng-model="selectedValue{{$row->sort_no}}" >
                                @foreach($comboPenerimaan as $combo)
                                    <option ng-selected= "'{{$combo->parameter}}' == '{{$row->received_data_param}}'" value="{{$combo->parameter}}">{{ $combo->parameter}}</option>
                                @endforeach 
                                </select>
                            </td>
                            <td>
                                <button ng-click="actionButton({{$employeeId}},{{$row->id}},'{{$row->admin_combo_param}}',selectedValue{{$row->sort_no}})" class="btn btn-default" type="button">Save</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>            
</div>
@endsection
@section('script')
    <script src="/assets/app/administrasi/js/administrasi.js"></script>
@endsection