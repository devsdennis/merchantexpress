@extends ('layouts.plane')
@section('page_heading','Form')

@section('body')
 
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">   
        <p></p>
        <div class="btn-toolbar">
            @include('sub_menu.investment')
        </div>
            </div>
                <div class="panel-body">
			   <h4>M -Pesa Code Reports</h4>

   				@include('errors.error_partials')

          @if(count($codes) == 0)
          {{'M-Pesa codes not found.'}}
          @else


    <table   class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Number</th>
            <th>Date</th>
            <th>Code</th>
            <th>Type</th>
            <th>Status</th>
            <th>Name</th>
            <th>Email</th>
            <th>Telephone</th>
        </tr>
        </thead>
        <tbody>
          
        @foreach($codes as $key => $value)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->created_at }}</td>
                <td>{{ $value->code}}</td>
                <td>{{ $value->type }}</td>
                
                @if($value->verify_flag == 1)
                <td class="btn-success">{{ 'Approved' }}</td>
                @elseif($value->reject_flag ==1)
                <td class="btn-danger">{{ 'Rejected'}}</td>
                @elseif(($value->verify_flag==0) && ($value->reject_flag ==0))
                <td class="btn-info">{{'Pending' }}</td>
                @endif      
                <td>{{ $value->user->name}}</td>
                <td>{{ $value->user->email}}</td>
                <td>{{ $value->user->telephone}}</td>                  
            </tr>
        @endforeach
        </tbody>         
        </tbody>
    </table>
</div>
</div>
</div>
@endif
@stop