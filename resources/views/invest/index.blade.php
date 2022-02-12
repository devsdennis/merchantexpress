@extends ('layouts.plane')
@section('page_heading','Form')

@section('body')
@include('menu.main_menu');
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">   
        <p></p>
        <div class="btn-toolbar">
          
        </div>
        @include('sub_menu.investment')
            </div>
                <div class="panel-body">
               
			   <h4>Displaying Investment</h4>

   				@include('errors.error_partials')

@if (count($journals) === 0)
{{'Transactions not found.'}}
@else

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            
            <th>Number</th>
             <th>Date</th> 
             <th>Transaction Number</th>      
             <th>Ref/Cheque</th>
               <th>Description</th> 
            <th>Particulars</th>   
           <th>Payee</th>     
            <th>Category</th>      
            <th>Amount </th>
            <th>Code</th>
        </tr>
        </thead>
        <tbody>
          
        @foreach($journals as $key => $value)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->transaction->voucher->transaction_date }}</td>                               
      
                <td>{{ $value->transaction->voucher->transaction_no }}</td>   
                <td>  {{$value->transaction->voucher->ref }}</td>             
                <td>  {{$value->transaction->voucher->description }}</td>
                <td>  {{$value->transaction->voucher->particulars }}</td>
                <td>  {{$value->transaction->voucher->payees_name }}</td>
                @if($value->transaction->voucher->credit ==1)
               <td> {{'Cash'}} </td>
                @else 
               <td> {{'Bank'}} </td>
                @endif
                <td>{{ $value->transaction->voucher->amount}}</td>       
                <td>{{ $value->transaction->voucher->code }}</td>
                <td>
                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->
                     <a class="btn btn-small btn-info " href="{{ URL::to('postjournal/' . $value->id ) }}">Approve</a>
                    </td>
                    <td> <a class="btn btn-small btn-danger " href="{{ URL::to('invest/' . $value->id ) }}">Reject</a></td>
            </tr>

            
            
        @endforeach
        </tbody>
    </table>
</div>
  
    <!-- {{ Form::open(array('url' => 'postjournal')) }}

    {{ Form::submit('Approve', array('class' => 'btn btn-small btn-success align:center')) }}

    {{ Form::close() }} -->
 

</div>
@endif
</div>
@stop
           
 