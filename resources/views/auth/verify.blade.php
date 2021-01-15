@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">驗證您的電子郵件地址</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            新的驗證連結已發送到您的電子郵件地址
                        </div>
                    @endif
                    如果您沒有收到該電子郵件,
                    在繼續之前，請檢查您的電子郵件以獲取驗證鏈接。
                    
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">點擊這裡申請另一個</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
