@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">會員管理系統</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    歡迎光臨<b>{{Auth::user()->name}}</b>，您已經登入！
                </div>
                <div class="card-body alert">
                    <strong>1.</strong>您可以 <a href="{{route('modify.user')}}" class="alert-link">修改會員資料</a>
                </div>
                <div class="card-body alert">
                    <strong>2.</strong>您可以 <a href="{{route('modify.user.pwd')}}" class="alert-link">修改會員密碼</a>
                </div>
                <div class="card-body alert">
                    <strong>3.</strong>您可以 <a href="{{route('delete.user')}}" class="alert-link text-danger">刪除會員帳號</a>
                </div>
                <div class="card-body alert">
                    <strong>4.</strong>您可以 <a href="{{route('logout')}}" class="alert-link text-success"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">點擊此處登出</a>
                <form id = "logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                @csrf
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
