 
@extends ('layouts.plane')
@section('page_heading','Form')

@section('body')
 
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">   
        
        @include('sub_menu.users')
        <div class="btn-toolbar">
        </div>
            </div>
                <div class="panel-body">
			    
   				@include('errors.error_partials')

          @if(count($system_users) == 0)
          {{'Users Not Added'}}
          @else


    <table   class="table table-striped table-bordered">
        <thead>
        <tr>
            
            <th>Number</th>
             <th>Name</th>
            <th> Telephone</th>
             <th> Email</th>
             <th> User Active</th>
             <th>Code</th>
             <th>Date</th>
        </tr>
        </thead>
        <tbody>
          
        @foreach($system_users as $key => $value)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->telephone}}</td>
                <td>{{ $value->email }}</td>
                 <?php
            if($value->active < 1)
                    $status="No";
                    else
                    {
                    $status="Yes";
                    }
                    ?>
                <td>{{ $status}}</td>
                <?php $codes=App\Http\Controllers\UserController::usercodes($value->id); ?>
                @if($codes !='0')
                @foreach($codes as $key=>$val)
                <td>{{$val->code  }}</td>
                @endforeach
                @else
                <td>No Code</td>
                @endif
                <td>{{$value->created_at->toFormattedDateString() }}</td>
                <!-- we will also add show, edit, and delete buttons -->
                <!-- <td>
                    < delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->
                     <td><a class="btn  btn-info " href="{{ URL::to('users/' . $value->id ) }}">View Account</a></td>
                     <td><a class="btn  btn-danger " href="{{ URL::to('users/' . $value->id . '/edit') }}">Deactivate</a></td>
                     
                        <!-- <td>
                        <a href="#" class="btn btn-small btn-warning pull-right"
                            data-toggle="modal"
                            data-target="#basicModal{{$value->id}}"
                            >Delete</a>
               
                </td> -->
            </tr>

             <div class="modal fade" id="basicModal{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                    <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel"> Confirm Delete</h4>
                          </div>

                          <div class="modal-body">
                               Are You Sure You Want To Delete?
                                
                                {{ Form::open(array('url' => 'users/' . $value->id, 'class' => 'pull-right')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                       
                                       
                          </div>
                          <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                          </div>
                                 {{ Form::close() }}
                    </div>
              </div>
    </div>
            
        @endforeach
        </tbody>
        </tbody>
    </table>
</div>
</div>
</div>
@endif
@stop