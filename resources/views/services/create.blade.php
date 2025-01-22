@extends('layouts.master')

@section('title', 'اضافة خدمة جديدة')

@section('page_title', 'الخدمات')


@section('content')
<div class="container">
<form action="{{route('services.store')}}" method="POST">
    @csrf
    <div class="row">
      <div class="col">
        <label for="name">اسم الخدمة</label>
        <input type="text" name="name"  class="form-control" placeholder="اسم الخدمة">
      </div>
      <div class="col">
        <label for="price">السعر</label>
        <input  name='price' type="text"  class="form-control" placeholder="السعر">
      </div>

    </div>
    <div class="mt-4 text-center">
        <button type="submit" class="btn btn-primary">حفظ</button>
    </div>
</form>
</div>
@endsection
