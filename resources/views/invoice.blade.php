<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>invoice</title>
	    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
	<?php 
	$card = isset($data['card']) ? $data['card'] : '';
	 ?>
	<center>
		<div class="pay_form" style="width: 40%;">
		<form action="/home/payment/{{ $data['invoice'] }}/{{ $data['email'] }}/{{ $data['tel'] }}" method="POST">
			@csrf
			<div class="form-group form-body">
				<h3>СЧЕТ {{$data['invoice']}}</h3>
			<label class="mt-3" for="card_pay">Номер карты:</label>
			<input name="card_pay" type="text" class="form-control" id="card_pay" value="{{ $card }}">
			<label class="mt-3" for="sum_pay">Сумма (KZT):</label>
			<input name="sum_pay" type="text" class="form-control" id="sum_pay" value="{{ $data['sum'] }}" disabled>
			<label class="mt-3" for="email_pay">Email:</label>
			<input name="email_pay" type="text" class="form-control" id="email_pay" value="{{$data['email']}}" disabled>
			<label class="mt-3" for="tel_pay">Телефон:</label>
			<input name="tel_pay" type="text" class="form-control" id="tel_pay" value="{{$data['tel']}}" disabled>
			<input type="text" name="invoice_pay" hidden value="{{$data['invoice']}}">
			<button class="btn btn-success btn-lg mt-3" type="submit" name="button_pay">Оплатить</button>
			</div>
		</form>
		</div>
			
			<div class="payment_result">
				@if(isset($data['date_paid']) && isset($data['status']))
				<p>Дата оплаты: {{$data['date_paid']}}</p>
				<p>Сумма: {{$data['sum']}}</p>
				<p>Статус: {{$data['status']}}</p>
				@endif
			</div>

	</center>
</body>
</html>