@extends('layouts.master')

@section('title', 'اضافة مصاريف جديدة')

@section('page_title', 'المصاريف')


@section('content')
<div class="container">
<form action="{{route('expenses.store')}}" method="POST">
    @csrf
    <div class="row">
      <div class="col">
        <label for="name">المصاريف</label>
        <input type="text" name="name"  class="form-control" placeholder="نوع المصاريف">
      </div>
      <div class="col">
        <label for="price">المبلغ</label>
        <input  name='price' type="text"  class="form-control" placeholder="المبلغ">
      </div>

    </div>
    <div class="mt-4 text-center">
        <button type="submit" class="btn btn-primary">حفظ</button>
    </div>
</form>
</div>
@endsection
