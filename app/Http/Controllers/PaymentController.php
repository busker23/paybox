<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class PaymentController extends Controller
{
    public function index() {

    	$result = App\Payment::getInvoices();
    	return view('payment', compact('result'));
    }

    public function create(Request $req) {

    	date_default_timezone_set('Asia/Almaty');
    	$invoice = 'invoice_' . time();
    	$sum = $req->input('sum');
    	$date_created = date('d.m.Y');
    	$tel = $req->input('tel');
    	$email = $req->input('email');

    	$data = array('invoice_number' => $invoice, 'sum' => $sum, 'date_created' => $date_created, 'telephone_number' => $tel, 'email' => $email);


    	$res =App\Payment::addPayment($data);

    	if($res)
    	$result = App\Payment::getInvoices();


    	return view('payment', compact('result'));

    }


}
