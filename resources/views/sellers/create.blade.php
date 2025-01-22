@extends('layouts.master')

@section('title', 'اضافة حلاق جديد')

@section('page_title', 'الحلاقين')


@section('content')
<div class="container">
<form action="{{route('sellers.store')}}" method="POST">
    @csrf
    <div class="row">
      <div class="col">
        <label for="name">اسم الحلاق</label>
        <input type="text" name="name"  class="form-control" placeholder="اسم الحلاق">
      </div>

    </div>
    <div class="mt-4 text-center">
        <button type="submit" class="btn btn-primary">حفظ</button>
    </div>
</form>
</div>
@endsection


