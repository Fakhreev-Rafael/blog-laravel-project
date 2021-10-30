@extends('blog.user.layouts.layout')

@section('page.title', auth()->user()->name)

@section('content')
    <main class="main">
        <div class="container">
            <div class="authentication-main-wrp">
                <form action="{{ route('blog.user.account.update') }}" class="form" method="POST">
                    @csrf
                    @error('account-edit-form-error')
                        <ul class="form-error-list">
                            <li class="form-error-element">
                                {{ $message }}
                            </li>
                        </ul>
                    @enderror
                    <section class="form-section">
                        <label class="form-label">{{ __('Name') }}</label>
                        <input type="text" class="form-input" name="name" value="{{ auth()->user()->name }}" autocomplete="off">
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
                        <input type="email" class="form-input" name="email" value="{{ auth()->user()->email }}" autocomplete="off">
                    </section>
                    @unless (auth()->user()->is_email_confirmed)
                        <ul class="form-error-list">
                            <li class="form-error-element">
                                {{ __('The email is not confirmed') }}
                            </li>
                        </ul>
                    @endunless
                    @error('email')
                        <ul class="form-error-list">
                            <li class="form-error-element">
                                {{ $message }}
                            </li>
                        </ul>
                    @enderror
                    <section class="form-section">
                        <a href="#" class="header-contol-link link-button"
                                title="{{ __('Change password') }}">
                                {{ __('Change password') }}
                            </a>
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