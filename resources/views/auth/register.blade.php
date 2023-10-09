@extends('layout.auth')

@section('content')
    <div class="container flex items-center justify-center h-screen w-full">
        <div class="w-96 shadow p-6 rounded-3xl">
        <h1 class="pb-3 mt-6 mb-3 text-3xl border-b text-stone-800">Register</h1>
        <form action="{{ route('register.store') }}" method="POST" novalidate>
            @method('post')
            @csrf
                <div class="mb-6">
                    <x-label for="name">Name</x-label>
                    <x-input type="text" id="name" name="name" />
                    @error('name')
                        <x-error-paragraph>{{ $message }}</x-error-paragraph>
                    @enderror
                </div>
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
                <div class="mb-6">
                    <x-label for="confPassword">Confirm Password</x-label>
                    <div class="flex items-center gap-5">
                        <x-input type="password" id="confPassword" name="confPassword" />
                        <x-info-button data-tooltip-placement="right" data-tooltip-target="tooltip-right" type="button">?</x-info-button>
                        <div id="tooltip-right" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            You have to type your password again
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </div>
                    <div class="mt-3">
                        @error('confPassword')
                            <x-error-paragraph>{{ $message }}</x-error-paragraph>
                        @enderror
                    </div>
                </div>
                <div class="mb-6 flex items-center justify-between">
                    <x-success-button>Register</x-success-button>
                    <x-primary-link href="{{ route('login') }}">Login</x-primary-link>
                </div>
            </form>
        </div>
    </div>
@endsection
