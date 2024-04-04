@extends('layouts.app')
@section('title')
    Đăng kí
@endsection
@section('content')
    <div class="form-wrapper">

        <!-- logo -->
        <div class="logo my-5">
            <img src="{{asset('assets/media/img/logo-full-2x.png')}}" alt="logo">
        </div>
        <!-- ./ logo -->

        <h5>Tạo tài khoản</h5>

        <!-- form -->
        <form>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Họ" name="first_name" required autofocus>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Tên" name="last_name" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Mật khẩu" name="password" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Nhập lại mật khẩu"
                       ng-model="password_confirmation" required>
            </div>
            <button class="btn btn-primary">Đăng kí</button>
            <div class="my-5">
                Đã có tài khoản? <a href="{{route('login')}}">Đăng nhập ngay!</a>
            </div>
        </form>
        <!-- ./ form -->
    </div>
@endsection
