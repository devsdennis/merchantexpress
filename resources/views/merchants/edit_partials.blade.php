 		         <hr/>

         <div class="form-group">
            {{ Form::label('account_type', 'Vote Head Name',array('class'=>'col-md-2 control-label')) }}
            <div class="col-md-6">
            {{ Form::select('type_id', $account_types ,null, array('class' => 'form-control col-md-3')) }} 
            </div>
        </div>

        <br></br>  <br></br>
        <div class="form-group">
            {{ Form::label('name', 'Account Name',array('class'=>'col-md-2 control-label')) }}
             <div class="col-md-6">
            {{ Form::text('name',$account->ledger->name , array('class' => 'form-control col-md-5')) }}
        </div>
        </div>

         <br></br>  <br></br>

        <div class="form-group">
            {{ Form::label('description', 'Description',array('class'=>'col-md-2 control-label')) }}
             <div class="col-md-6">
            {{ Form::text('description', $account->ledger->description, array('class' => 'form-control')) }}
        </div>
        </div>
     <br></br>  <br></br>
     
<!--
      <div class="row">
        <div class="col-sm-6">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div class="form-group">
                             <label class="col-md-4 control-label">Account Active</label>
                              <div class="col-md-6">
                            {{ Form::radio('active_flag', '1', true, array('class' => 'form-control col-md-2')) }}
                            </div>
                        </div>
                    </div>
                </div>

        </div>

            <div class="col-sm-6">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div class="form-group">
                             <label class="col-md-4 control-label">Deactivate Account</label>
                              <div class="col-md-6">
                            {{ Form::radio('active_flag', '0', true, array('class' => 'form-control col-md-2')) }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
-->
    

         
 








