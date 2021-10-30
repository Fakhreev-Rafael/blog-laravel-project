@extends('blog.user.layouts.layout')

@section('page.title', __('Authentication'))

@section('content')
    <main class="main">
        <div class="container">
            <div class="authentication-main-wrp">
                <form action="{{ route('blog.user.authentication.execute') }}" class="form" method="POST">
                    @csrf
                    @error('authentication-form-error')
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
                        <label class="form-label">{{ __('Password') }}</label>
                        <input type="password" name="password" id="password" class="form-input" autocomplete="off">
                        <label>
                            <input type="checkbox" data-for="password" class="form-checkbox-password">
                            {{ __('Show password') }}
                        </label>
                    </section>
                    @error('password')
                        <ul class="form-error-list">
                            <li class="form-error-element">
                                {{ $message }}
                            </li>
                        </ul>
                    @enderror
                    <section class="form-section">
                        <button type="submit" class="button" title="{{ __('Authenticate') }}">
                            {{ __('Authenticate') }}
                        </button>
                    </section>
                    <section class="form-section">
                        <a href="{{ route('blog.user.forgot.password') }}" class="header-contol-link link-button"
                                title="{{ __('Forgot password') }}">
                                {{ __('Forgot password') }}
                            </a>
                    </section>
                </form>
            </div>
        </div>    
    </main>    
@endsection