@extends ('layouts.plane')
@section('page_heading','Form')

@section('body')
 
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">   
        <p></p>
        <div class="btn-toolbar">
            
        </div>

        </div>
            <div class="panel-body">
            <a class="btn btn-primary" href="{{URL::to('news')}}"> View articles</a>

            <h4>Edit</h4>   
            
            @include('errors.error_partials')

            {{ Form::model($new, array('route' => array('news.update', $new->id), 'method' => 'PUT')) }}

            <br></br>
               <div class="form-group row ">
                <label class="control-label col-sm-2" for="name">Title:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control"   name="title" value="{{ $new->title }}"
                        placeholder="Enter the Bundle name" required>
                </div>
                </div>
                <br></br>
                <div class="form-group row ">
                <label class="control-label col-sm-2" for="name">Description:</label>
                <div class="col-md-6">
                    <textarea name="description" placeholder="Enter the content" rows="6" cols="80"  required> {{ $new->description}}</textarea>
                </div>
                </div> 
                <br></br>

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