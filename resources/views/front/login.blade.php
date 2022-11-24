@extends('front.layout.app')

@section('main_content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Login</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if (session()->get('success'))
                    <p style="color: green">{{ session()->get('success') }}</p>
                @endif
                <form action="{{ route('login_submit') }}" method="post">
                    @csrf
                    <div class="login-form">
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="text" class="form-control @error('email')is-invalid @enderror" name="email"
                                value="{{ old('email') }}">
                            @error('email')
                                <p style="color: brown">{{ $message }}</p>
                            @enderror
                            @if (session()->get('error'))
                                <p style="color: brown">{{ session()->get('error') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password')is-invalid @enderror"
                                name="password">
                            @error('password')
                                <p style="color: brown">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
