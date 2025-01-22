@extends('layouts.master')
@section('title', 'تسجيل الدخول')
@section('page_title', 'الحساب')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5 text-right" action="{{ route('login') }}" method="POST">
                @csrf
                <h3 class="text-center text-dark">تسجيل الدخول</h3>

                <div class="form-group ">
                    <label for="name"  class="text-dark">: اسم المستخدم</label><br>
                    <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control">
                </div>
                @error('name')
                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
                <div class="form-group mt-3">
                    <label for="password" class="text-dark">: كلمة المرور</label><br>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                @error('password')
                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <label for="remember-me" class="text-dark"></label><br>
                    <input type="submit" name="submit" class="btn btn-dark btn-md" value="تسجيل الدخول">
                </div>
                <div class="text-right mt-2">
                    <a href="{{route('register')}}" class="text-dark">تسجيل حساب جديد</a>
                </div>
            </form>
        </div>
    </div>
@endsection
