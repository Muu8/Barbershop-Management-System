@extends('layouts.master')

@section('title', 'الحلاقين')

@section('page_title', 'لوحة التحكم')


@section('content')

<div class="container">
<div class="mb-3 mx-2">
<a class="btn btn-primary" href="{{route('sellers.create')}}"><i class="fa-solid fa-scissors"></i> اضافة حلاق</a>
</div>

<table class="table text-center border">
    <thead>

      <tr>
        <th scope="col">اسم الحلاق</th>
        <th scope="col">ادارة</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($sellers as $seller)
      <tr>
        <td> {{$seller->name}} </td>
        <td>
            <a href="{{route('sellers.show', $seller->id)}}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
            <a href="{{route('sellers.edit', $seller->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
        <form style="display: inline-block" action="{{ route('sellers.destroy', $seller->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger" ><i class="fa-solid fa-delete-left"></i></button>
        </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

