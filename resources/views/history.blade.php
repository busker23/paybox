@extends('home')

@section('history')
<table class="table table-striped">
	<thead>
		<tr>
			<td>#</td>
			<td>Номер счета</td>
			<td>Сумма</td>
			<td>Статус</td>
			<td>Дата создания</td>
			<td>Дата оплаты</td>
			<td>Email</td>
			<td>Телефон</td>
			<td>Данные карты</td>
		</tr>
	</thead>
	<tbody>
		@if(isset($result))
		
		@foreach($result as $res)
			<tr style="cursor: pointer;">
			<td>{{ $res->id }}</td>	
			<td><a href="{{ url('/home/history', ['id' => $res->id]) }}">{{ $res->invoice }}</a></td>	
			<td>{{ $res->sum }}</td>	
			<td>{{ $res->status }}</td>	
			<td>{{ $res->date_created }}</td>	
			<td>{{ $res->date_paid ? $res->date_paid : 'Не оплачено' }}</td>	
			<td>{{ $res->email }}</td>	
			<td>{{ $res->tel }}</td>	
			<td>{{ $res->card ? $res->card : 'Не введены данные' }}</td>
			</tr>
		@endforeach

		@endif


	</tbody>
</table>
@endsection