@extends('layouts.master')

@section('title', 'ادخال المبيعات')

@section('page_title', 'المبيعات')


@section('content')




<form method="post" action="{{route('sales.store')}}">
    @csrf
    <select name="name" class="form-control  mb-4" aria-label="Small select example">
        <option  selected>الخدمة</option>
        @foreach($services as $service)
            <option value="{{$service->name}}">{{$service->name}} </option>
        @endforeach
    </select>

    <input type="text" class="form-control mb-4" name="price" placeholder="المبلغ" >

    <select name="seller_id" class="form-control mb-4" aria-label="Small select example">
        <option  selected>اسم الحلاق</option>
        @foreach($sellers as $seller)
            <option value="{{$seller->id}}">{{$seller->name}}</option>
        @endforeach
    </select>

    <select name="payment" class="form-control mb-4" aria-label="Small select example">
        <option  selected>طريقة الدفع</option>
        @foreach($payments as $payment)
            <option value="{{$payment->name}}">{{$payment->name}}</option>
        @endforeach
    </select>
    <div class="mt-4">
        <button class="btn btn-primary">اضافة</button>
    </div>

</form>


@endsection


