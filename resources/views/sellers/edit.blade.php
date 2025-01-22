@extends('layouts.master')


@section('title', 'التعديل على معلومات الحلاق')

@section('page_title', 'الحلاقين')


@section('content')
<div class="container">
<form action="{{route('sellers.update', $seller->id)}}" method="POST">
    @method('PUT')
    @csrf
    <div class="row">
      <div class="col">
        <label for="name">اسم الحلاق</label>
        <input type="text" name="name" value="{{$seller->name}}" class="form-control" placeholder="name">
      </div>

    </div>
    <div class="mt-4 text-center">
        <button type="submit" class="btn btn-primary">حفظ</button>
    </div>
</form>
</div>
@endsection

