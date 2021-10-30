@extends('blog.user.layouts.layout')

@section('page.title', __('New password'))

@section('content')
    <main class="main">
        <div class="container">
            <div class="authentication-main-wrp">
                <form action="{{ route('blog.user.new.password.execute') }}" class="form" method="POST">
                    @csrf
                    @error('new-password-form-error')
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
                        <input type="hidden" value="{{ $request->input('email') }}" class="form-input" name="email" autocomplete="off">
                        <input type="hidden" value="{{ $request->input('key') }}" class="form-input" name="key" autocomplete="off">
                    </section>
                    <section class="form-section">
                        <button type="submit" class="button" title="{{ __('Save') }}">
                            {{ __('Save') }}
                        </button>
                    </section>
                </form>
            </div>
        </div>    
    </main>    
@endsection