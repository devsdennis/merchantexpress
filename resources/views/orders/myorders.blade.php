@extends ('layouts.plane')
@section('page_heading','Form')

@section('body')
 
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">   
        <div class="btn-toolbar">
            
        </div>
             @include('sub_menu.client')
            </div>
                <div class="panel-body">
 
   				@include('errors.error_partials')
 

      <table class="table table-responsive table-striped table-condensed table-bordered">
        <thead>
        <tr>
            <th>Number</th>
            <th>Date</th>
            <th>Merchant</th>
            <th>Telephone</th>
            <th>Location</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        
        @foreach($orders as $key => $value)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->created_at }} </td>
                <td>{{ $value->merchant->title }}</td>
                <td>{{ $value->merchant->telephone }}</td>
                <td>{{ $value->merchant->location }}</td>
                <td> {{ 'Pending'}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
@stop
