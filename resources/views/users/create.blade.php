@extends ('layouts.plane')
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
            <h4 class="text-info">Add User</h4>
            
                @include('errors.error_partials')

                {{ Form::open(array('url' => 'users')) }}

                @include('includes.user_data')

                @include('users.edit_partials')

              
                <hr/>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                         {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
                    </div>
                </div>

                {{  Form::close()  }}
        </div>
    </div>
</div>
@stop