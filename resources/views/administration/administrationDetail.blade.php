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

    <div class="container">

    <h2><Strong>ADMINISTRATION</Strong></h2>
    <br><br>
    
    <div class="form-group">
        <div class="row">
            <div class="col-sm-3">
                <label>Name : </label> 
                <label>{{$name}}</label>
                <br>
                
                <label>E-mail : </label> 
                <label>{{$email}}</label> 
            </div>
            <div class="col-sm-2">
                <label>Job : </label> 
                <label>{{$job}}</label> 
                <br>
                <label>Qualified : </label> 
                <label>{{$qualified}}</label> 
            </div>
        </div>
    															
    <table class="table" id="table" border="1">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Item Check List</th>
                <th class="text-center">Penerimaan</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($dataAdmin as $dataAdmin)
                
            <tr>
                <td>{{$dataAdmin->sort_no}}</td>
                <td>{{$dataAdmin->admin_combo_param}}</td>
                <td>
                    <select name="penerimaan" id="terima" >
                        @foreach($comboPenerimaan as $combo)
                            <option value="{{$combo->parameter}}" {{ $combo->parameter == $dataAdmin->received_data_param ? 'selected="selected"' : '' }}>{{ $combo->parameter}}</option>
                        @endforeach   
                    </select>
                </td>
                <td>
                    <a href="/updateAdminDetail/{{$employeeId}}/{{$dataAdmin->id}}"> <input type="submit" value="Save"></a>
                </td>
            </tr>
        @endforeach    
        </tbody>
    </table>
    </div>

@endsection