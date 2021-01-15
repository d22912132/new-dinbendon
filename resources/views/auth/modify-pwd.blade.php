@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>修改會員密碼</h2>
        @if ($hint === '1')
            <div class="alert alert-success">
                <strong>會員密碼已經完成修改！</strong><a href="{{ route('modify.user.pwd') }}" class="alert-link">點擊此處請重新整理頁面</a>
            </div>
        @elseif ($hint === '2')
            <div class="alert alert-danger">
                <strong>目前密碼輸入錯誤！</strong>資料尚未被修改
            </div>
        @elseif ($hint === '3')
            <div class="alert alert-warning">
                <strong>密碼確認錯誤！</strong>資料尚未被修改
            </div>
        @endif
        <hr>
        <form action="{{route('modify.user.pwd.data')}}" method="POST" class="was-validated">
            @csrf
            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
            <div class="form-group">
                <label for="password-old">密碼：<b class="text-control">(請輸入目前密碼)</b></label>
                <input type="password" class="form-control" placeholder="請輸入密碼" id="password-old" name="password-old"  required>
                <div class="valid-feedback">完成填寫</div>
                <div class="invalid-feedback">請填寫此欄位</div>
            </div>
            <div class="form-group">
                <label for="password-new">新密碼：</label>
                <input type="password" class="form-control" placeholder="請輸入新密碼" id="password-new" name="password-new"  required>
                <div class="valid-feedback">完成填寫</div>
                <div class="invalid-feedback">請填寫此欄位</div>
            </div>
            <div class="form-group">
                <label for="password-conf">密碼確認：</label>
                <input type="password" class="form-control" placeholder="請輸入新密碼" id="password-conf" name="password-conf"  required autocomplete="password-conf">
                <div class="valid-feedback">完成填寫</div>
                <div class="invalid-feedback">請填寫此欄位</div>
            </div>
            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">修改密碼</button>
        </form>
    </div>    
@endsection