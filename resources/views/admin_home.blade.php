@extends ('layouts.plane')

@section('body')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">   
            <div class="btn-toolbar">
               <h4><strong>Home&Notifications</strong></h4> 
            </div>
        </div>
         
    
        
        <table class="table table-responsive table-striped table-condensed table-bordered">
        <thead>
        <tr>
            <th>Number</th>
            <th>Date</th>
            <th>Title</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        
        @foreach($news as $key => $value)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->created_at->toFormattedDateString() }}</td>
                <td><strong>{{ $value->title }}</strong> </td>
                <td>{{ $value->description }}</td>
                        
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
 </div>
@stop