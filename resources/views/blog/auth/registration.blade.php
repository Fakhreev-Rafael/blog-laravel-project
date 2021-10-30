@extends('blog.user.layouts.layout')

@section('page.title', __('Registration'))

@section('content')
    <main class="main">
        <div class="container">
            <div class="registration-main-wrp">
                <form action="{{ route('blog.user.registration.execute') }}" class="form" method="POST">
                    @csrf
                    @error('authentication-form-error')
                        <ul class="form-error-list">
                            <li class="form-error-element">
                                {{ $message }}
                            </li>
                        </ul>
                    @enderror
                    <section class="form-section">
                        <label class="form-label">{{ __('Your name') }}</label>
                        <input type="text" class="form-input" name="name" autocomplete="off">
                    </section>
                    @error('name')
                        <ul class="form-error-list">
                            <li class="form-error-element">
                                {{ $message }}
                            </li>
                        </ul>
                    @enderror
                    <section class="form-section">
                        <label class="form-label">{{ __('Email') }}</label>
                        <input type="email" class="form-input" name="email" autocomplete="off">
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
                        <input type="password" class="form-input" id="password" name="password" autocomplete="off">
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
                        <label class="form-label">{{ __('Password confirm') }}</label>
                        <input type="password" class="form-input" id="password_confirm" name="password_confirm" autocomplete="off">
                        <label>
                            <input type="checkbox" data-for="password_confirm" class="form-checkbox-password">
                            {{ __('Show password') }}
                        </label>
                    </section>
                    @error('password_confirm')
                        <ul class="form-error-list">
                            <li class="form-error-element">
                                {{ $message }}
                            </li>
                        </ul>
                    @enderror
                    <section class="form-section">
                        <button type="submit" class="button" title="{{ __('Registrate') }}">
                            {{ __('Registrate') }}
                        </button>
                    </section>
                </form>
            </div>
        </div>    
    </main>    
@endsection