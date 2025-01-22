@extends('layouts.master')

@section('title', 'تسجيل')

@section('page_title', 'لوحة التحكم')



@section('content')

    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" action="{{ route('auth.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <h3 class="text-center text-dark">تعديل على الحساب</h3>

                <div class="form-group">
                    <label for="name" class="text-dark">اسم الحساب</label><br>
                    <input type="text" value="{{$user->name}}" name="name" id="name" class="form-control">
                </div>
                @error('name')
                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror

                <select name="is_user" class="form-control  mb-4" aria-label="Small select example">
                    <option selected value="0">الصلاحيات</option>
                        <option value="1">محاسب</option>
                        <option value="0">بدون صلاحيات</option>
                </select>
                <div class="form-group">
                    <label for="remember-me" class="text-dark"></label><br>
                    <input type="submit" name="submit" class="btn btn-dark btn-md" value="حفظ">
                </div>
            </form>
        </div>
    </div>


@endsection
