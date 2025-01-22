@extends('layouts.master')

@section('title', 'التعديل على الخدمة')

@section('page_title', 'الخدمات')


@section('content')
<div class="container">
<form action="{{route('services.update', $service->id)}}" method="POST">
    @method('PUT')
    @csrf
    <div class="row">
      <div class="col">
        <label for="name">اسم الخدمة</label>
        <input type="text" name="name" value="{{$service->name}}" class="form-control" placeholder="name">
      </div>
      <div class="col">
        <label for="price">السعر</label>
        <input  name='price' type="text" value="{{$service->price}}" class="form-control" placeholder="price">
      </div>

    </div>
    <div class="mt-4 text-center">
        <button type="submit" class="btn btn-primary">حفظ</button>
    </div>
</form>
</div>
@endsection

