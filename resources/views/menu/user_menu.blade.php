
@if(isset($users))
 	
<nav class="navbar navbar-inverse">
<ul  class="nav nav-pills"  >
	@foreach($users as $menu_item)
    <li role="presentation"><a href="{{URL::to($menu_item->path)}}">{{$menu_item->display_name}}</a></li>
 
	@endforeach
</ul>
</nav>
	@endif


 
 <!--                
   
<nav class="navbar navbar-inverse">
 
 <ul  class="nav nav-pills"  >
 	<li role="presentation"><a href="{{URL::to('userprofile')}}">My Profile</a></li>
 	 <li role="presentation"><a href="{{URL::to('reset/password')}}">Reset Password</a></li>
 	<li role="presentation"><a href="{{URL::to('users')}}">Users</a></li>
    <li role="presentation"><a href="{{URL::to('roles')}}">Profiles</a></li>
    <li role="presentation"><a href="{{URL::to('permissions')}}">Permissions</a></li>
    <li role="presentation"><a href="{{URL::to('persons/create')}}">Assign Profiles</a></li>
    
  
    <li role="presentation"><a href="{{URL::to('masterreset')}}">Master Reset</a></li>
    <li role="presentation"><a href="{{URL::to('activate')}}">Activate Users</a></li>
    <li role="presentation"><a href="{{URL::to('deactivate/create')}}">Deactivate Users</a></li>
 
  </ul>


</nav> 
 
 -->