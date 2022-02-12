@extends ('layouts.plane')
@section('page_heading','Form')

@section('body')
 
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">   
        <div class="btn-toolbar">
        <a class="btn btn-primary" href="{{URL::to('merchants/create')}}"> New Merchant </a>
        <a class="btn btn-primary" href="{{URL::to('merchants')}}"> View Merchants</a>
        </div>

            </div>
            <div class="panel-body">
            
                @include('errors.error_partials')

                {{ Form::open(array('url' => 'merchants')) }}
                <br></br>
               <div class="form-group row ">
                <label class="control-label col-sm-2" for="name">Title:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control"   name="title"
                        placeholder="Enter the merchant name" required>
                </div>
                </div>
                <div class="form-group row ">
                <label class="control-label col-sm-2" for="name">Description:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control"   name="description"
                        placeholder="Enter the brief description" required>   
                </div>
                </div>
                <div class="form-group row ">
                <label class="control-label col-sm-2" for="name">Telephone:</label>
                <div class="col-md-6">
                    <input type="number" class="form-control"   name="telephone" min="0"
                        placeholder="Enter the primary telephone" required>
                </div>
                </div>
                <div class="form-group row ">
                <label class="control-label col-sm-2" for="name">Email:</label>
                <div class="col-md-6">
                    <input type="email" class="form-control"   name="email" 
                        placeholder="Enter the primary email" required>
                </div>
                </div>
                <div class="form-group row ">
                <label class="control-label col-sm-2" for="name">Location:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control"   name="location"
                        placeholder="Enter the merchant location" required>   
                </div>
                </div>
                <div class="form-group row ">
                <label class="control-label col-sm-2" for="name">Payment Method:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control"   name="pmethod"
                        placeholder="Enter the payment method" required>   
                </div>
                </div>
                <div class="form-group row ">
                <label class="control-label col-sm-2" for="name">Account:</label>
                <div class="col-md-6">
                    <input type="number" class="form-control"   name="account" min="0"
                        placeholder="Enter the payment account" required>
                </div>
                </div>
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