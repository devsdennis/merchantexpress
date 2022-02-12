@extends ('layouts.plane')
@section('page_heading','Form')

@section('body')

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">   
        <div class="btn-toolbar">
            
        </div>
             @include('sub_menu.medic')
            </div>
                <div class="panel-body">
             
			   <h4>Displaying pending deliveries</h4>
   				@include('errors.error_partials')
 

      <table class="table table-responsive table-striped table-condensed table-bordered">
        <thead>
        <tr>
            <th>Number</th>
            <th>Date</th>
            <th>Client</th>
            <th>Telephone</th>
            <th>Code</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        
        @foreach($orders as $key => $value)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->created_at }} </td>
                <td>{{ $value->user->name}}</td>
                <td>{{ $value->user->telephone }}</td>
                <td> {{ $value->code }}</td>
                <td> {{ 'Pending'}}</td>
                <td>
                     <a class="btn btn-small btn-success" href="{{ URL::to('merchantorder/' . $value->id ) }}">Complete</a>
                </td>  
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
@stop
