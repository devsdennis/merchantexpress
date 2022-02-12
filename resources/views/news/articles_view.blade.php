@extends ('layouts.plane')
@section('page_heading','Form')

@section('body')
@include('menu.main_menu');
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">   
        <div class="btn-toolbar">
        <h4>Displaying News</h4>
        </div>
            </div>
                <div class="panel-body">
   				@include('errors.error_partials')
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
                <td>{{ $value->created_at }}</td>
                <td><strong>{{ $value->title }}</strong> </td>
                <td>{{ $value->description }}</td>
                         
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
@stop
