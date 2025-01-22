@extends('layouts.master')


@section('title', 'الخدمات')

@section('page_title', 'لوحة التحكم')


@section('content')


<div class="mb-3 mx-2">
<a class="btn btn-primary" href="{{route('services.create')}}"><i class="fa-brands fa-servicestack"></i> اضافة خدمة جديدة</a>
</div>
<table class="table border text-center">
    <thead>

      <tr>
        <th scope="col">اسم الخدمة</th>
        <th scope="col">السعر</th>
        <th scope="col">اداراة</th>
      </tr>

    </thead>
    <tbody>
    @foreach ($services as $service)
      <tr>
        <td> {{$service->name}} </td>
        <td>{{$service->price}} </td>
        <td>
            <a class="btn btn-primary" href="{{ route('services.edit', $service->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
        <form style="display: inline-block" action="{{ route('services.destroy', $service->id) }}" method="POST">
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



