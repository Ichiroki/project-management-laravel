@extends('layout.main')

@section('content')
<div class="container">
    <div class="mt-16">
        <h1 class="text-3xl font-semibold uppercase text-stone-800">Project Details : {{ $project->nama }}</h1>
        <div class="p-3 mt-6 mb-3 text-stone-900 bg-stone-200">
            <h1 class="text-2xl">{{ $project->nama }}</h1>
            <div class="flex flex-col">
                <p>Tim Project : {{ $project->tim }}</p>
                <p>Klien : {{ $project->klien }}</p>
            </div>
            <p class="mt-3 line-clamp-1">Status : {{ $project->status }}</p>
            <p class="mt-3 line-clamp-1">Deskripsi : {{ $project->deskripsi }}</p>
            <p class="mt-3 line-clamp-1">Anggaran : Rp. {{ $project->anggaran }}</p>
            <div class="flex gap-3 mt-3">
                <a href="{{ route('project') }}" class="px-5 py-2 transition rounded-full bg-cyan-400 text-stone-900 hover:bg-cyan-600 hover:text-stone-50">Back to Project Page</a>
            </div>
        </div>
    </div>
</div>
@endsection
