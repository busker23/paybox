<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class InvoiceController extends Controller
{
    public function index($number, $email, $tel) {

    	$sum_pay = App\Payment::checkInvoice($number);

    	if(isset($_POST['button_pay'])) {

    		if(!empty($_POST['card_pay'])) {

    			$card = $_POST['card_pay'];
    			$sum = $sum_pay->sum;
    			$date_paid = date('d.m.Y');

    			$res = App\Payment::payInvoice($card, $number, $date_paid);

    			if($res) {

    			$data = ['invoice' => $number, 'email' => $email, 'tel' => $tel, 'sum' => $sum_pay->sum,
    			'date_paid' => $date_paid, 'status' => 'Оплата прошла успешно', 'card' => $card];

    			return view('invoice', compact('data'));	

    			} else {
    				$data = ['invoice' => $number, 'email' => $email, 'tel' => $tel, 'sum' => $sum_pay->sum,
    			'date_paid' => $date_paid, 'status' => 'Произошла ошибка при оплате', 'card' => $card];
    			}

    			}

    	} else {

    	$data = ['invoice' => $number, 'email' => $email, 'tel' => $tel, 'sum' => $sum_pay->sum];

    	return view('invoice', compact('data'));

    	}
    
}

}