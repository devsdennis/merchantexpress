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
             

            
            @include('errors.error_partials')

            {{ Form::open(array('url' => 'userprofile') ) }}
<hr/>       {{Form:: hidden('user_id',$user->id)}}

        <div class="form-group">
              <label class="col-md-4 control-label">First Name</label>
              <div class="col-md-6">
            {{ Form::text('first_name', $user->first_name, array('class' => 'form-control col-md-5')) }}
              </div>
            </div>
 <br></br>  <br></br>
            <div class="form-group">
              <label class="col-md-4 control-label">Last Name</label>
              <div class="col-md-6">
            {{ Form::text('last_name', $user->last_name, array('class' => 'form-control col-md-5')) }}
              </div>
            </div>
 <br></br>  <br></br>
            <div class="form-group">
              <label class="col-md-4 control-label">Telephone</label>
              <div class="col-md-6">
            {{ Form::text('telephone', $user->telephone, array('class' => 'form-control col-md-5')) }}
              </div>
            </div>

 <br></br>  <br></br>
            <div class="form-group">
              <label class="col-md-4 control-label">E-Mail Address</label>
              <div class="col-md-6">
            {{ Form::text('email', $user->email, array('class' => 'form-control col-md-5')) }}
              </div>
            </div>
 <br></br>  <br></br>
            <div class="form-group">
              <label class="col-md-4 control-label">User Name</label>
              <div class="col-md-6">
            {{ Form::text('user_name', $user->user_name, array('class' => 'form-control col-md-5')) }}
              </div>
            </div>
 <br></br>  <br></br>

          
         <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              
                {{ Form::submit('Ok', array('class' => 'btn btn-primary')) }}
              
            </div>
         </div>}

            {{ Form::close() }}
 
        </div>
    </div>
</div>
@stop