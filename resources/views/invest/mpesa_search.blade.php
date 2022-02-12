@extends ('layouts.plane')
@section('page_heading','School Information')

@section('body')
 

<div class="container">
        <div class="panel panel-default">
            
            <div class="panel-heading">   
                <p></p>
                <div class="btn-toolbar">
                    @include('sub_menu.investment')
                </div>
            </div>

        <div class="panel-body">
            <h4 class="text-info">Enter Dates to Search M-Pesa Code</h4>
               
            {{ Form::open(array('url' => 'cashbook/postmpesacodes') ) }}
                      
            <form role="form">
            @include('errors.error_partials')
                  
         <div class="form-group">
	         <label class="col-md-4 control-label">First Date</label>
	         <div class="col-md-6">
             <input type="date" name="first_date"  class="form-control col-md-4" placeholder="Date" required="required">	         </div>

        </div>

				<br> <br/><br> <br/>
         
         <div class="form-group">
            <label class="col-md-4 control-label">Second Date</label>
            <div class="col-md-6">
             <input type="date" name="second_date"  class="form-control col-md-4" placeholder="Date" required="required">            </div>
        </div>

         
 
<br></br><br></br>
         <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              
                {{ Form::submit('Search', array('class' => 'btn btn-primary')) }}
              
            </div>
         </div>

                {{ Form::close() }}
 
        </div>
    </div>
</div>
@stop