@extends ('layouts.plane')

@section('body')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">   
            <div class="btn-toolbar">
               <h4><strong>Home</strong></h4> 
            </div>
        </div>
        
        <div class="panel-body">
            @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <div>
            
             </div>
            <div class="form-group">
            </div>
             <button  class="btn-info btn-lg">  Balance {{0}}</button>
            </hr>
            
        </div>
</div>
</div>
@stop