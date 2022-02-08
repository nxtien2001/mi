@extends('dashboard')

@section('title','Thay đổi mật khẩu')

@section('content')
<br><br>
<p style="font-size: 20px;font-weight:bold">Thay đổi mật khẩu</p>
<br>
<form action="{{route('change.password.post')}}" method="post">
    @if(session('error'))
    <p style="color: red;">{{session('error')}}</p>
    @endif
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Mật khẩu cũ</label>
        <input type="password" name="oldpassword" class="form-control" id="" aria-describedby="emailHelp">
        @error('oldpassword')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Mật khẩu mới</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Xác nhận mật khẩu mới</label>
        <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1">
        @error('password_confirmation')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Thay đổi</button>
</form>

@endsection