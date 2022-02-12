 <?php 
 
 $patient_id=Auth::user()->id;
 ?>
 <a class="btn  btn-primary" href="{{URL::to('order/create')}}">New Order</a>
<a class="btn btn-primary" href="{{ URL::to('order/' . $patient_id ) }}">My requests</a></a>
<a class="btn  btn-primary" href="{{URL::to('#')}}">Merchants</a>
  


 