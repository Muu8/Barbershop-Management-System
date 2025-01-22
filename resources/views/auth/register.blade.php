@extends('layouts.master')

@section('title', 'تسجيل')

@section('page_title', 'الحساب')



@section('content')

    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5 text-right" action="{{ route('register') }}" method="POST">
                @csrf
                <h3 class="text-center text-dark">التسجيل</h3>

                <div class="form-group">
                    <label for="name" class="text-dark">:اسم الحساب</label><br>
                    <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control">
                </div>
                @error('name')
                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror

                <div class="form-group mt-3">
                    <label for="password" class="text-dark">:  كلمة المرور</label><br>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                @error('password')
                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
                <div class="form-group mt-3">
                    <label for="password_confirmation" class="text-dark">: تأكيد كلمة المرور</label><br>
                    <input type="password" name="password_confirmation"  id="confirm-password" class="form-control">
                </div>
                @error('password_confirmation')
                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <label for="remember-me" class="text-dark"></label><br>
                    <input type="submit" name="submit" class="btn btn-dark btn-md" value="تسجيل الحساب">
                </div>
                <div class="text-right mt-2">
                    <a href="/login" class="text-dark">تسجيل الدخول من هنا</a>
                </div>
            </form>
        </div>
    </div>


@endsection
