

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left info">
        <p>User</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
 

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li style="background-color: white; color:black" class="header"><h5>MENU<h5></li>
      <!-- Optionally, you can add icons to the links -->
     <li>

   @if(Auth::user()->cust_flag == 1)
    <li role="presentation"><a href="{{URL::to('home')}}"><strong>Home</strong></a></li>
    <li role="presentation"><a href="{{URL::to('order/create')}}"><strong>Orders</strong></a></li>
    <li role="presentation"><a href="{{URL::to('#')}}"><strong>Profile</strong></a></li>
  @elseif(Auth::user()->merchant_flag == 1)
    <li role="presentation"><a href="{{URL::to('home')}}"><strong>Home</strong></a></li>
    <li role="presentation"><a href="{{URL::to('merchanthome')}}"><strong>Deliveries</strong></a></li>
    <li role="presentation"><a href="{{URL::to('#')}}"><strong>Finance</strong></a></li>
    <li role="presentation"><a href="{{URL::to('#')}}"><strong>Profile</strong></a></li>
  @else
    <li role="presentation"><a href="{{URL::to('home')}}"><strong>Home</strong></a></li>
    <li role="presentation"><a href="{{URL::to('merchants/create ')}}"><strong>Merchants</strong></a></li>
    <li role="presentation"><a href="{{URL::to('cashbook/mpesacodes')}}"><strong>Mpesa</strong></a></li>
    <li role="presentation"><a href="{{URL::to('#')}}"><strong>Finance</strong></a></li>
    <li role="presentation"><a href="{{URL::to('news')}}"><strong>Alerts</strong></a></li>
    <li role="presentation"><a href="{{URL::to('users')}}"><strong>Users</strong></a></li>  
  @endif                            
    </li>
    </ul><!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>