@extends('home')

@section('single')
	
	<center>
	<h1 class="mt-5">Информация по платежу № {{ $payment->id }}</h1>
	<b>
		<p>№ счета: {{ $payment->invoice }}</p>
		<p>Сумма: {{ $payment->sum }}</p>
		<p>Дата создания: {{ $payment->date_created }}</p>
		<p>Статус платежа: {{ $payment->status }}</p>
		<p>Дата оплаты: {{ $payment->date_paid ? $payment->date_paid : 'Не оплачено' }}</p>
		<p>Телефон плательщика: {{ $payment->tel }}</p>
		<p>Email плательщика: {{ $payment->email }}</p>
		<p>Номер карты: {{ $payment->card ? $payment->card : 'Не введены данные' }}</p>
	</b>	
	</center>

@endsection