@extends ('layouts.plane')
@section('page_heading','Form')

@section('body')
 
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">   
       
        <div class="btn-toolbar">
            @include('sub_menu.client')
        </div>

            </div>
            <div class="panel-body">
             
                @include('errors.error_partials')

                {{ Form::open(array('url' => 'order')) }}
                <br></br>
               <div class="form-group row ">
                <label class="control-label col-sm-2" for="name">Location:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control"   name="location"
                        placeholder="Enter the location" required>
                </div>
                </div>
                <br></br>
                 <input type="hidden" value="2" name="package_id">
                <div class="form-group row ">
                <label class="control-label col-sm-2" for="name">Select to pay for other:</label>
                <div class="col-md-6">
                    <input type="checkbox"  name="other" value="1">
                </div>
                </div>
                <hr/>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                         {{ Form::submit('Search', array('class' => 'btn btn-primary')) }}
                    </div>
                </div>
                {{  Form::close()  }}
        </div>
    </div>
</div>
@stop