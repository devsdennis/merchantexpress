<?php namespace App\Http\Controllers;

use App\Brief;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Interest;
use App\Ledger;
use App\Voucher;
use App\Financial;
use App\Transaction;
use App\Statement;
use App\Invest;
use App\Withdraw;
use App\Payment;
use Session;
use Redirect;
use Auth;
use Carbon;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Http\Request;

class CashBookController extends Controller {

	//Function to request mpesa codes
	public  function Mpesacodes(){

		return view('invest.mpesa_search' );

	}//end fo the getform function
	 
	//Function to handle post of mpesa codes
	public function postmpesacodes(Request $request){

		$first_date = $request->input('first_date');
		$second_date = $request->input('second_date');

		$codes=Payment::whereBetween('created_at', array($first_date, $second_date))
						->orderBy('created_at','desc')
						->get();

		return view('invest.mpesa_codes_report',compact('codes'));
	}//end of postmpesacodes

}
