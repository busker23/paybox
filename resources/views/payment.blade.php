@extends('home')

@section('payment')
<center>
	<button class="btn btn-primary btn-lg mt-2" id="create_invoice" data-toggle="modal" data-target="#addInvoice">Создать</button>
</center>

<table class="table table-striped mt-4">
@foreach ($result as $res)
		<tr>
			<td>{{ $res->id }}</td>
			<td>Счет {{ $res->invoice_number }}</td>
			<td>{{ $res->sum }} тенге</td>
			<!-- <td><a href="/home/payment/{{ $res->invoice_number }}" target="_blank">Ссылка на оплату</a></td> -->
			<td><a href="{{url('/home/payment', ['number' => $res->invoice_number, 'email' => $res->email, 'tel' => $res->telephone_number]) }}" target="_blank">Ссылка на оплату</a></td>
		</tr>	
@endforeach
</table>

<!-- The Modal -->
<div class="modal" id="addInvoice">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Новый счет оплаты</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form action="/home/payment" method="POST">
      	@csrf
      <div class="modal-body">
       
        	<div class="form-group">
        	<label class="mt-2" for="sum">Сумма (KZT):</label>
        	<input type="text" class="form-control" name="sum" id="sum">
        	<label class="mt-2" for="tel">Телефон:</label>
        	<input type="text" class="form-control" name="tel" id="tel">
        	<label class="mt-2" for="email">E-mail:</label>
        	<input type="text" class="form-control" name="email" id="email">
        	<input type="text" id="invoice_id" name="invoice_id" hidden>
        	</div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" id="create_payment" name="create" class="btn btn-success">Создать</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
      </div>
		</form>
    </div>
  </div>
</div>

@endsection

