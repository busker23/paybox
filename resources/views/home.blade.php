@extends('layouts.app')

@section('content')
<div class="containe-fluid">

        <center>
            <div class="navs">
            <a href="{{ route('/home/history') }}">История платежей</a>
            <a href="{{ route('/home/payment') }}">Выставить счет</a>
            </div>
        </center>
        @yield('history')
        @yield('payment')
        @yield('single')
</div>
@endsection
