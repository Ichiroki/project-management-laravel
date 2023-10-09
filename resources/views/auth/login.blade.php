@extends('layout.auth')

@section('content')
    <div class="container flex flex-col items-center justify-center h-screen gap-3 w-full">
        @if(session('success'))
            <x-alert type="green">test</x-alert>
        @endif
        <div class="w-96 shadow p-6 rounded-3xl">
        <h1 class="pb-3 mt-6 mb-3 text-3xl border-b text-stone-800">Login</h1>
        <form action="{{ route('project.add') }}" method="POST" novalidate>
            @method('post')
            @csrf
                <div class="mb-6">
                    <x-label for="email">Email</x-label>
                    <x-input type="email" id="email" name="email" />
                    @error('email')
                        <x-error-paragraph>{{ $message }}</x-error-paragraph>
                    @enderror
                </div>
                <div class="mb-6">
                    <x-label for="password">Password</x-label>
                    <x-input type="password" id="password" name="password" />
                    @error('password')
                        <x-error-paragraph>{{ $message }}</x-error-paragraph>
                    @enderror
                </div>
                <div class="mb-6 flex justify-between w-full">
                    <x-success-button>Login</x-success-button>
                    <x-primary-link href="{{ route('register') }}">Register</x-primary-link>
                </div>
            </form>
        </div>
    </div>
@endsection
