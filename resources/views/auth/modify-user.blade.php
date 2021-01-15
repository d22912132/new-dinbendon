@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>修改會員資料</h2>
        @if ($hint === '1')
            <div class="alert alert-success">
                <strong>會員資料已經完成修改！</strong><a href="{{ route('modify.user') }}" class="alert-link">點擊此處請重新整理頁面</a>
            </div>
        @elseif ($hint === '2')
        <div class="alert alert-danger">
            <strong>密碼錯誤！</strong>資料尚未被修改
        </div>
        @endif
        <hr>
        <form action="{{route('modify.user.data')}}" method="POST" class="was-validated">
            @csrf
            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
            <div class="form-group">
                <label for="uname">E-mail：(不可修改)</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
            </div>
            <div class="form-group">
                <label for="name">使用者名稱：</label>
                <input type="text" class="form-control" id="name" placeholder="請輸入姓名" name="name" value="{{ Auth::user()->name }}" required>
                <div class="valid-feedback">完成填寫</div>
                <div class="invalid-feedback">請填寫此欄位</div> 
            </div>
            <div class="form-group">
                <label for="sex">性別：</label>
                <select class="form-control" id="sex" name="sex">
                    @if (Auth::user()->sex === 'M')
                        <option value="M" selected>男生(Man)-目前性別</option>
                        <option value="W">女生(Woman)</option>
                    @else
                    <option value="M">男生(Man)</option>
                    <option value="W" selected>女生(Woman)-目前性別</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="telephone">電話：</label>
                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="請輸入電話" value="{{Auth::user()->telephone}}" required>
                <div class="valid-feedback">完成填寫</div>
                <div class="invalid-feedback">請填寫此欄位</div>
            </div>

            <div class="form-group">
                <label for="birthday">生日：</label>
                <input type="date" class="form-control" id="birthday" name="birthday" value="{{explode(' ',Auth::user()->birthday, 2)[0]}}" required>
                <div class="valid-feedback">完成填寫</div>
                <div class="invalid-feedback">請填寫此欄位</div>
            </div>

            <div class="form-group">
                <label for="birthday">備忘錄：</label>
                <textarea class="form-control" id="memo" name="memo" maxlength="255" value="{{Auth::user()->memo}}"></textarea>
                <div class="valid-feedback">完成填寫</div>
                <div class="invalid-feedback">請填寫此欄位</div>
            </div>

            <div class="form-group">
                <label for="password">密碼：<b class="text-danger">(請輸入目前密碼以修改會員資料)</b></label>
                <input type="password" class="form-control" placeholder="請輸入密碼" id="password" name="password"  required>
                <div class="valid-feedback">完成填寫</div>
                <div class="invalid-feedback">請填寫此欄位</div>
            </div>
            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">送出修改</button>
        </form>
    </div>
@endsection 