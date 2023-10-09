@extends('layout.main')

@section('content')
<div class="container">
    <div class="mt-16">
        <h1 class="text-3xl font-semibold uppercase text-stone-800">User Details</h1>
        <div class="p-3 mt-6 mb-3 text-stone-900 bg-stone-200 rounded-3xl flex justify-between">
            <div class="w-1/2">
                @if($user->avatar === '')
                    <img src="{{ asset('storage/img/person.png') }}" alt="" width="250" class="rounded-full border-4 border-stone-600 mx-auto">
                @endif
                <img src="{{ asset('storage/img/' . $user->avatar) }}" alt="" width="250" class="rounded-full border-4 border-stone-600 mx-auto">
            </div>
            <div class="w-1/2">
                <h1 class="text-2xl">{{ $user->firstName }} {{ $user->lastName }}</h1>
                <div class="flex flex-col">
                    <p>Email : {{ $user->email }}</p>
                    <p>Tanggal Lahir : {{ $user->born }}</p>
                </div>
                <p class="mt-3 line-clamp-1">Alamat : {{ $user->address }}</p>
                <div class="flex gap-5">
                    <p class="mt-3 line-clamp-1">Kota : {{ $user->city }}</p>
                    <p class="mt-3 line-clamp-1">Kecamatan : Rp. {{ $user->state }}</p>
                </div>
                <div class="flex gap-3 mt-3">
                    <a href="{{ route('user') }}" class="px-5 py-2 transition rounded-full bg-cyan-400 text-stone-900 hover:bg-cyan-600 hover:text-stone-50">Back to User Page</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
