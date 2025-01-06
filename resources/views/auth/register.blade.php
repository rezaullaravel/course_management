@extends('frontend.master')

@section('title')
    {{ 'Registration Page' }}
@endsection

@section('content')
    <div class="sign-in-page">
        <div class="gap-48 flex-md-row align-items-stretch">
            <!-- left image for lg size -->
            <img class="left-img d-none d-md-block" src="{{ asset('/') }}frontend/images/login.svg" alt="" />

            <!-- logo for small size -->
            <img class="mx-auto d-md-none" src=".{{ asset('/') }}frontend/images/logo.svg" width="120px" alt="" />

            <!-- center form div -->
            <div class="d-flex justify-content-center align-items-center w-100 h-auto">
                <div class="card-wrapper">
                    <div class="card rounded-4 gap-36">
                        <!-- form heading -->
                        <h4 class="text-center color-primary">
                            @if (session()->get('lang') == 'bangla')
                                সাইন আপ করুন
                            @else
                                Sign Up
                            @endif
                        </h4>

                        @if (session('error_message'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                {{ session('error_message') }}
                            </div>
                        @endif
                        <div class="gap-40">
                            <!-- form -->
                            <form action="{{ route('user.post.register') }}" method="post" class="gap-40">
                                @csrf
                                <div class="gap-16">
                                    <!--name-->
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent border-end-0">
                                            <img src="{{ asset('/') }}frontend/images/i-email-black.svg"
                                                alt="" />
                                        </span>

                                        <input type="text" name="name" required
                                            class="form-control ps-0 border-start-0 rounded-3 rounded-start-0"
                                            aria-label="Dollar amount (with dot and two decimal places)"
                                            @if (session()->get('lang') == 'bangla') placeholder="আপনার নাম ইংরেজিতে"
                                            @else
                                            placeholder="name in english" @endif />
                                    </div>
                                    <!-- email -->
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent border-end-0">
                                            <img src="{{ asset('/') }}frontend/images/i-email-black.svg"
                                                alt="" />
                                        </span>

                                        <input type="email" name="email" required
                                            class="form-control ps-0 border-start-0 rounded-3 rounded-start-0"
                                            aria-label="Dollar amount (with dot and two decimal places)"
                                            @if (session()->get('lang') == 'bangla') placeholder="ইমেইল এড্রেস"
                                            @else
                                            placeholder="email address" @endif />
                                    </div>

                                    <!-- password -->
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent border-end-0">
                                            <img src="{{ asset('/') }}frontend/images/password.svg" alt="" />
                                        </span>

                                        <input type="password" name="password" required
                                            class="form-control ps-0 border-start-0 border-end-0"
                                            aria-label="Amount (to the nearest dollar)"
                                            @if (session()->get('lang') == 'bangla') placeholder="পাসওয়ার্ড"
                                            @else
                                            placeholder="password" @endif />
                                        <span class="input-group-text border-start-0 bg-transparent">
                                            <img src="{{ asset('/') }}frontend/images/i-password-eay.svg"
                                                alt="" />
                                        </span>


                                    </div>

                                    @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    <!--confirm password-->
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent border-end-0">
                                            <img src="{{ asset('/') }}frontend/images/password.svg" alt="" />
                                        </span>

                                        <input type="password" name="confirm-password" required
                                            class="form-control ps-0 border-start-0 border-end-0"
                                            aria-label="Amount (to the nearest dollar)"
                                            @if (session()->get('lang') == 'bangla') placeholder="পাসওয়ার্ড কনফার্ম করুন"
                                            @else
                                            placeholder="confirm password" @endif />
                                        <span class="input-group-text border-start-0 bg-transparent">
                                            <img src="{{ asset('/') }}frontend/images/i-password-eay.svg"
                                                alt="" />
                                        </span>
                                    </div>

                                </div>

                                <!-- Button -->
                                <div class="btn btn-primary">
                                    <button type="submit" class="btn-primary">
                                        @if (session()->get('lang') == 'bangla')
                                            সাইন আপ করুন
                                        @else
                                            Sign Up
                                        @endif
                                    </button>
                                </div>

                                <div class="gap-40">

                                    <!-- have an account? -->
                                    <div class="gap-8 flex-row justify-content-center">
                                        <p class="">
                                            @if (session()->get('lang') == 'bangla')
                                                অলরেডি একাউন্ট আছে?
                                            @else
                                                Already Have an account?
                                            @endif
                                        </p>
                                        <a href="{{ url('login') }}" class="color-primary fw-medium">
                                            @if (session()->get('lang') == 'bangla')
                                                লগিন করুন
                                            @else
                                                Login
                                            @endif
                                        </a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
