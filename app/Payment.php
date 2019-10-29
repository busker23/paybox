<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public static function addPayment($arr) {

    	return static::insertGetId($arr);

    }

    public static function getInvoices() {

    	return static::where('status_id', 3)->get();

    }

    public static function payInvoice($card, $number, $date_paid) {

	return static::where('invoice_number', $number)->update(['card_number' => $card, 'date_paid' => $date_paid, 'status_id' => 1]);

    }

    public static function checkInvoice($number) {
    	return static::select('sum')->where('invoice_number', $number)->first();
    }

   	public static function getPayments() {
   		return static::join('status', 'status.id', '=', 'payments.status_id')
   		->select('payments.id AS id', 'payments.invoice_number AS invoice', 'payments.sum AS sum',
   	 'status.name AS status', 'payments.date_created as date_created', 'payments.date_paid AS date_paid',
   	 'payments.email AS email', 'payments.telephone_number AS tel', 'payments.card_number AS card')->get();
   	}

   	public static function getPayment($id) {
   		return static::join('status', 'status.id', '=', 'payments.status_id')
   		->select('payments.id AS id', 'payments.invoice_number AS invoice', 'payments.sum AS sum',
   	 'status.name AS status', 'payments.date_created as date_created', 'payments.date_paid AS date_paid',
   	 'payments.email AS email', 'payments.telephone_number AS tel', 'payments.card_number AS card')->where('payments.id', $id)->first();
   	}

}
