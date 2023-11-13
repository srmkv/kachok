@extends('auth.layouts.user_type.auth')
@section('page')
    Подтвердите ваш E-mail
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Email Not Verified</div>

                    <div class="card-body">
                        There was an error verifying your email. Please try again or contact support.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
