<!--@extends ('layouts.plane') -->
@section('page_heading','Form')

@section('body')
@include('menu.main_menu');
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">   
        <p></p>
        <div class="btn-toolbar">
            @include('menu.user_menu')
        </div>

        </div>
            <div class="panel-body">
            <a class="btn btn-primary" href="{{URL::to('users')}}"> View Users</a>

            <h4>Edit</h4>   
            
            @include('errors.error_partials')

            {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}
<hr/>

        <div class="form-group">
              <label class="col-md-4 control-label">First Name</label>
              <div class="col-md-6">
            {{ Form::text('first_name', null, array('class' => 'form-control col-md-5')) }}
              </div>
            </div>
 <br></br>  <br></br>
            <div class="form-group">
              <label class="col-md-4 control-label">Last Name</label>
              <div class="col-md-6">
            {{ Form::text('last_name', null, array('class' => 'form-control col-md-5')) }}
              </div>
            </div>
 <br></br>  <br></br>
            <div class="form-group">
              <label class="col-md-4 control-label">Telephone</label>
              <div class="col-md-6">
            {{ Form::text('telephone', null, array('class' => 'form-control col-md-5')) }}
              </div>
            </div>

 <br></br>  <br></br>
            <div class="form-group">
              <label class="col-md-4 control-label">E-Mail Address</label>
              <div class="col-md-6">
            {{ Form::text('email', null, array('class' => 'form-control col-md-5')) }}
              </div>
            </div>
 <br></br>  <br></br>
            <div class="form-group">
              <label class="col-md-4 control-label">User Name</label>
              <div class="col-md-6">
            {{ Form::text('user_name', null, array('class' => 'form-control col-md-5')) }}
              </div>
            </div>
 <br></br>  <br></br>

          
         <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              
                {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
              
            </div>
         </div>

            {{ Form::close() }}
 
        </div>
    </div>
</div>
@stop