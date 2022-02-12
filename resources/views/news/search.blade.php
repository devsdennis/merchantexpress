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
        @if ( !$account->count() )

            You have no projects
        @else

        @if($account->active_flag !=1)
            {{$active="No"}}
           
        @else
           {{$active="Yes"}}
           
        @endif

            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <td>ID</td>
                    <td> Account Name</td>
                    <td>Account Type</td>
                     <td>Description</td>
                    <td> Opened On</td>
                    <td> Deleted On</td>
                    <td> Created By</td>
                    <td> Active</td>
                     
                     

                </tr>
                </thead>
                <tbody>
                 Showing
                    <tr>
                        <td>{{ $account->id }}</td>
                        <td>{{ $account->name }}</td>
                        <td>{{ $account->account_type_id }}</td>
                        <td>{{ $account->description }}</td>
                        <td>{{ $account->opened_at }}</td>
                        <td>{{ $account->deleted_on }}</td>
                        <td>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</td>

                        <td>{{ $active }}</td>


                        <!-- we will also add show, edit, and delete buttons -->
                        <td>

                            <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->
                            
                            <!-- show the nerd (uses the show method found at GET /nerds/{id} -->

                            <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
 
                        </td>
                    </tr>

                </tbody>
            </table>

</div>
</div>
</div>
    @endif
@stop