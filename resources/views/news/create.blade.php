@extends ('layouts.plane')
@section('page_heading','Form')

@section('body')
 
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">   
        <h4 class="text-info">Create a New article </h4>
        <div class="btn-toolbar">
             
        </div>

            </div>
            <div class="panel-body">
            <a class="btn btn-primary" href="{{URL::to('news')}}"> View Bundles</a>
            
                @include('errors.error_partials')

                {{ Form::open(array('url' => 'news')) }}
                <br></br>
               <div class="form-group row ">
                <label class="control-label col-sm-2" for="name">Title:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control"   name="title"
                        placeholder="Enter the Bundle name" required>
                </div>
                </div>
                <br></br>
                <div class="form-group row ">
                <label class="control-label col-sm-2" for="name">Description:</label>
                <div class="col-md-6">
                    <textarea name="description" placeholder="Enter the content" rows="6" cols="80" required></textarea>
                </div>
                </div> 
                <br></br> 
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