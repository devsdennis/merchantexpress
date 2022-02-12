@extends ('layouts.plane')
@section('page_heading','Form')

@section('body')
 
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">   
        <div class="btn-toolbar">
        <a class="btn btn-primary" href="{{URL::to('merchants/create')}}"> New Merchant </a>
        <a class="btn btn-primary" href="{{URL::to('merchants')}}"> View Merchants</a>
        </div>
            
            </div>
                <div class="panel-body">
             
			   <h4>Displaying Merchant Accounts</h4>

   				@include('errors.error_partials')
 

      <table class="table table-responsive table-striped table-condensed table-bordered">
        <thead>
        <tr>
            <th>Number</th>
            <th>Name</th>
            <th>Description</th>
            <th>Telephone</th>
            <th>Email</th>
            <th>Location</th>
             <th>Account</th>
        </tr>
        </thead>
        <tbody>
        
        @foreach($merchants as $key => $value)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->title }} </td>
                <td>{{ $value->description }}</td>
                <td>{{ $value->telephone }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->location }}</td>
                 <td>{{ $value->account }}</td>
                <td>
                     <a class="btn btn-small btn-success" href="{{ URL::to('merchants/' . $value->id . '/edit') }}">Edit</a>
                </td>        
                <td>
                        <a class="btn btn-small btn-danger" href="{{ URL::to('merchants/' . $value->id ) }}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
@stop
