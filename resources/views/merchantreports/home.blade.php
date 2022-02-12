@extends ('layouts.plane')

@section('body')

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">   
           
            <div class="btn-toolbar">
            @include('sub_menu.medic')
            </div>
        </div>
        
        <div class="panel-body">
        <h4>Medic Home</h4>
            @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <div>
            
             </div>
            <div class="form-group">
            </div>
            </hr>
            
        </div>
 
        <br></br>
        
       
</div>
 </div>
@stop