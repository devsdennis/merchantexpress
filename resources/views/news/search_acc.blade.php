@extends ('layouts.plane')
@section('page_heading','School Information')

@section('body')
@include('menu.main_menu');

<div class="container">
        <div class="panel panel-default">
            
            <div class="panel-heading">   
                <p></p>
                <div class="btn-toolbar">
                    @include('menu.fnc_menu')
                </div>
            </div>

        <div class="panel-body">
               
            {{ Form::open(array('url' => 'search/accounts') ) }}
                    <h4 class="text-info">Search Accounts</h4>
            <form role="form">
            @include('errors.error_partials')
                  
         <div class="form-group">
             <label class="col-md-4 control-label">Account Id</label>
             <div class="col-md-6">
                {{ Form::text('account_id', null , array('class' => 'form-control col-md-3')) }} 
             </div>

        </div>

                <br> <br/><br> <br/>

        <div class="form-group">

                 <label class="col-md-4 control-label">Account Name</label>
                 <div class="col-md-6">
                    {{ Form::text('account_name', null , array('class' => 'form-control col-md-3')) }} 
                 </div>

        </div>

                <br> <br/><br> <br/>

        <div class="form-group">
                 <label class="col-md-4 control-label">Vote Head Name</label>
                 <div class="col-md-6">
                    {{ Form::text('votehead_name', null , array('class' => 'form-control col-md-3')) }} 
                 </div>

        </div>

                <br> <br/><br> <br/>
         
        
         

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