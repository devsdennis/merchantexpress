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
            <h4 class="text-info">Reset Password</h4>

              @include('errors.error_partials')
				{{ Form::open(array('url' => 'reset/password')) }}
					 
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Enter your Email</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>
						<br></br><br></br>
						<div class="form-group">
							<label class="col-md-4 control-label">Current Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						 
						<br></br><br></br>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
									Next
								</button>
 
							</div>
						</div>
					 {{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
