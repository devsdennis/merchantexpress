@extends ('layouts.plane')
@section('page_heading','Form')
@section('body')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">   
            <div class="btn-toolbar">
            <a class="btn btn-primary" href="{{URL::to('news/create')}}"> Create alert</a>
            </div>
        </div>
        <div class="panel-body">
   		@include('errors.error_partials')
      <table class="table table-responsive table-striped table-condensed table-bordered">
        <thead>
        <tr>
            <th>Number</th>
            <th>Name</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach($news as $key => $value)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->title }} </td>
                <td>{{ $value->description }}</td>
                <td>
                     <a class="btn btn-small btn-success" href="{{ URL::to('news/' . $value->id . '/edit') }}">Edit</a>
                </td>        
                <td>
                     <a class="btn btn-small btn-danger" href="{{ URL::to('news/' . $value->id ) }}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
@stop
