@extends ('layouts.plane')
@section('page_heading','Form')

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
             <a class="btn btn-primary" href="{{URL::to('accounts/create')}}"> Create an Account</a>
            <a class="btn btn-primary" href="{{URL::to('accounts')}}"> View accounts</a>
            
               <h4>Displaying Account</h4>

                @include('errors.error_partials')
        </nav>
         

            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th> Account Name</th>
                    <th>Vote Head Name</th>
                     <th>Description</th>
                    <th> Opened On</th>                     
                    <!-- <th> Created By</th>                 -->

                </tr>
                </thead>
                <tbody>
                 Showing
                    <tr>
                        <td>{{ $account->id}}</td>
                        <td>{{ $account->name}}</td>
                        <td>{{ $account->name }}</td>
                        <td>{{ $account->description }}</td>
                        <td>{{ $account->created_at }}</td>
                        <!--
                        <td>{{ $account->deleted_on }}</td> -->
<!--   --> 
                         
                    </tr>

                </tbody>
            </table>

</div>
</div>
</div>
     
@stop