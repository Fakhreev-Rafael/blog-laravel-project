@extends('blog.user.layouts.layout')

@section('page.title', __('Forgot password'))

@section('content')
    <main class="main">
        <div class="container">
            <div class="authentication-main-wrp">
                <form action="{{ route('blog.user.forgot.password.execute') }}" class="form" method="POST">
                    @csrf
                    @error('forgot-password-form-error')
                        <ul class="form-error-list">
                            <li class="form-error-element">
                                {{ $message }}
                            </li>
                        </ul>
                    @enderror
                    <section class="form-section">
                        <label class="form-label">{{ __('Email') }}</label>
                        <input type="email" name="email" class="form-input" autocomplete="off">
                    </section>
                    @error('email')
                        <ul class="form-error-list">
                            <li class="form-error-element">
                                {{ $message }}
                            </li>
                        </ul>
                    @enderror
                    <section class="form-section">
                        <button type="submit" class="button" title="{{ __('Send') }}">
                            {{ __('Send') }}
                        </button>
                    </section>
                </form>
            </div>
        </div>    
    </main>    
@endsection