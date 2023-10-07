@extends('layout.main')

@section('content')
<div class="container mt-16">
    <h1 class="text-3xl font-semibold uppercase text-stone-800">Project Management</h1>
    <div x-data="{open: false}">
        <a href="{{ route('project.create') }}" class="inline-block px-5 py-2 my-6 transition bg-green-600 rounded-full text-stone-50 hover:bg-green-800" @click="open = true">Create New Project</a>

        @if (session('success'))
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert" id="alerts">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
              <span class="font-medium">{{ session('success') }}</span>
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alerts" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
              </button>
        </div>
        @endif
    </div>

    @foreach ($project as $p)
        <div class="p-3 mb-3 border-l-4 text-stone-900 bg-stone-200 border-l-stone-400">
            <div class="flex justify-between">
                <div class="w-9/12">
                    <h1 class="text-2xl font-semibold">{{ $p->nama }}</h1>
                    <div class="flex flex-col">
                        <p>Tim Project : {{ $p->tim }}</p>
                        <p>Klien : {{ $p->klien }}</p>
                    </div>
                    <p class="mt-3 line-clamp-1">{{ $p->deskripsi }}</p>
                    <div class="flex items-center gap-3 mt-3">
                        <a href="{{ route('project.detail', ['slug' => $p->slug]) }}" class="px-5 py-2 transition bg-green-600 rounded-full text-stone-50 hover:bg-green-800">Detail</a>
                        <a href="{{ route('project.edit', ['id' => $p->id]) }}" class="px-5 py-2 transition rounded-full bg-cyan-400 text-stone-900 hover:bg-cyan-600 hover:text-stone-50">Update</a>
                        <form action="{{ route('project.delete', ['id' => $p->id]) }}" class="inline mb-0" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="px-5 py-2 transition bg-red-600 rounded-full text-stone-50 hover:bg-red-800">Delete</button>
                        </form>
                    </div>
                </div>
                <div class="w-2/12">
                    <div class="flex flex-col">
                        <h1>Status</h1>
                        @if ($p->status === "Belum Dikerjakan")
                            <p class="font-semibold text-red-600">{{ $p->status }}</p>
                        @elseif ($p->status === "Sedang Dikerjakan")
                            <p class="font-semibold text-yellow-600">{{ $p->status }}</p>
                        @elseif ($p->status === "Menunggu Diterima")
                            <p class="font-semibold text-cyan-600">{{ $p->status }}</p>
                        @else
                            <p class="font-semibold text-green-600">{{ $p->status }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="my-5">
        {{ $project->links() }}
    </div>
</div>
@endsection
