@extends('layouts.master')

@section('title', 'الدفع')

@section('page_title', 'لوحة التحكم')


@section('content')


<div class="mb-3 mx-2">
<a class="btn btn-primary" href="{{route('payments.create')}}"><i class="fa-solid fa-credit-card"></i> اضافة وسيلة دفع </a>
</div>
<table class="table border text-center">
    <thead>

      <tr>
        <th scope="col">طريقة الدفع</th>
        <th scope="col">اداراة</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($payments as $payment)
      <tr>
        <td> {{$payment->name}} </td>
        <td>
        <form style="display: inline-block" action="{{ route('payments.destroy', $payment->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger" ><i class="fa-solid fa-delete-left"></i></button>
        </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection

