@extends('layouts.master')


@section('title', 'المستخدمين')

@section('page_title', 'لوحة التحكم')


@section('content')


<div class="mb-3 mx-2">
</div>
<table class="table border text-center">
    <thead>

      <tr>
        <th scope="col">اسم المستخدم</th>
        <th scope="col">تاريخ التسجيل</th>
        <th scope="col">الصلاحيات</th>
        <th scope="col">اداراة</th>
      </tr>

    </thead>
    <tbody>
    @foreach ($users as $user)
      <tr>
        <td> {{$user->name}} </td>
        <td> {{$user->created_at->format('Y-m-d')}} </td>
        @if ($user->is_admin)
            <td>ادارة</td>
        @elseif($user->is_user)
            <td>محاسب</td>
        @else
            <td>لا يوجد صلاحيات</td>
        @endif
        @if ($user->is_admin == 0)
        <td>
            <a class="btn btn-primary" href="{{ route('auth.edit', $user->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>

        <form style="display: inline-block" action="{{ route('auth.destroy', $user->id) }}" method="POST">
            @method('DELETE')
            @csrf

            <button class="btn btn-danger" ><i class="fa-solid fa-delete-left"></i></button>
        </form>
        @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection
