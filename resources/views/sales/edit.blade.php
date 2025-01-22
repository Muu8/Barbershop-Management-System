@extends('layouts.master')

@section('title', 'تعديل المبيعات')

@section('page_title', 'المبيعات')


@section('content')



<form method="post" action="{{route('sales.update', $sales->id)}}">
    @csrf
    @method('PUT')
    <select name="name" class="form-control  mb-4" aria-label="Small select example">
        <option selected>{{$sales->name}}</option>
        @foreach($services as $service)
            <option value="{{$service->name}}">{{$service->name}}</option>
        @endforeach
    </select>
    <div class="mb-4">
        <input type="text" name='price' placeholder="السعر" class="form-control" value="{{$sales->price}}" >
    </div>


    <select name="seller_id" class="form-control mb-4" aria-label="Small select example">
        <option value="{{$sales->seller->id}}" selected>{{$sales->seller->name}}</option>
        @foreach($sellers as $seller)
            <option value="{{$seller->id}}">{{$seller->name}}</option>
        @endforeach
    </select>

    <select name="payment" class="form-control mb-4" aria-label="Small select example">
        <option  selected>{{$sales->payment}}</option>
        @foreach($payments as $payment)
            <option value="{{$payment->name}}">{{$payment->name}}</option>
        @endforeach
    </select>
    <div class="mt-4">
        <button  class="btn btn-primary">تعديل</button>
    </div>

</form>


@endsection


