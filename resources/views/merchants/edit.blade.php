@extends ('layouts.plane')
@section('page_heading','Form')

@section('body')
 
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">   
        <p></p>
        <div class="btn-toolbar">
        <a class="btn btn-primary" href="{{URL::to('merchants/create')}}"> New Merchant </a>
        <a class="btn btn-primary" href="{{URL::to('merchants')}}"> View Merchants</a>
        </div>

        </div>
            <div class="panel-body">
          

            <h4>Edit</h4>   
            
            @include('errors.error_partials')

            {{ Form::model($merchant, array('route' => array('merchants.update', $merchant->id), 'method' => 'PUT')) }}

            <br></br>
            <div class="form-group row ">
                <label class="control-label col-sm-2" for="name">Title:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control"   name="title" value="{{ $merchant->title}}"
                        placeholder="Enter the merchant name" required>
                </div>
                </div>
                <div class="form-group row ">
                <label class="control-label col-sm-2" for="name">Description:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control"   name="description" value="{{ $merchant->description}}"
                        placeholder="Enter the brief description" required>   
                </div>
                </div>
                <div class="form-group row ">
                <label class="control-label col-sm-2" for="name">Telephone:</label>
                <div class="col-md-6">
                    <input type="number" class="form-control"   name="telephone" min="0" value="{{ $merchant->telephone}}"
                        placeholder="Enter the primary telephone" required>
                </div>
                </div>
                <div class="form-group row ">
                <label class="control-label col-sm-2" for="name">Email:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control"   name="email" min="0" value="{{ $merchant->email}}"
                        placeholder="Enter the email" required>
                </div>
                </div>
                <div class="form-group row ">
                <label class="control-label col-sm-2" for="name">Location:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control"   name="location" value="{{ $merchant->location}}"
                        placeholder="Enter the merchant location" required>   
                </div>
                </div>
                <div class="form-group row ">
                <label class="control-label col-sm-2" for="name">Payment Method:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control"   name="pmethod" value="{{ $merchant->pmethod}}"
                        placeholder="Enter the payment method" required>   
                </div>
                </div>
                <div class="form-group row ">
                <label class="control-label col-sm-2" for="name">Account:</label>
                <div class="col-md-6">
                    <input type="number" class="form-control"   name="account" min="0" value="{{ $merchant->account}}"
                        placeholder="Enter the payment account" required>
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