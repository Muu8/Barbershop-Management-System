@extends('layouts.master')

@section('title', 'اضافة وسيلة دفع جديدة')

@section('page_title', 'الدفع')


@section('content')

<form action="{{route('payments.store')}}" method="POST">
    @csrf
    <div class="row">
      <div class="col">
        <label for="name">اسم وسيلة الدفع</label>
        <input type="text" name="name"  class="form-control" placeholder="اسم الخدمة">
      </div>

    </div>
    <div class="mt-4 text-center">
        <button type="submit" class="btn btn-primary">حفظ</button>
    </div>
</form>

@endsection


