<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class HistoryController extends Controller
{
    public function index() {
    	$result = App\Payment::getPayments();
    	if($result) {

    		return view('history', compact('result'));

    	} else return view('history');

    }

    public function single($id) {
    	$payment = App\Payment::getPayment($id);
    	if($payment) {

    		return view('single', compact('payment'));
    	}
    }
}
