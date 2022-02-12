@extends ('layouts.plane')
@section('page_heading','Form')

@section('body')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">   
        <p></p>
        <div class="btn-toolbar">
            <h4>Continue to order</h4>
        </div>

        </div>
             @include('errors.error_partials')
            <div class="panel-body"></div>
            <h4>Merchant Name</h4>
            <input type="text" value="{{$merchant->title}}"  readonly>
            {{$merchant->telephone}}
            {{ Form::model($order, array('route' => array('order.update', $merchant->id), 'method' => 'PUT')) }}
            <br></br>
                <div class="form-group row ">
                <label class="control-label col-sm-2" for="name">Continue to order:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control"   name="amount"  value="{{$order->amount}}" readonly
                        placeholder="Enter the package name" required>
                </div>
                </div>
            <br></br>
           <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                         {{ Form::submit('Order', array('class' => 'btn btn-primary')) }}
                    </div>
            </div>

            {{ Form::close() }}
 
        </div>
</div>
    </div>
</div>
@stop