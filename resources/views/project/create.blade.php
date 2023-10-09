@extends('layout.main')

@section('content')
<div class="container">
    <h1 class="pb-3 mt-6 mb-3 text-3xl border-b text-stone-800">Tambah Proyek</h1>
    <form action="{{ route('project.add') }}" method="POST" novalidate>
        @method('post')
        @csrf
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Proyek</label>
            <input type="text" id="name" name="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Masukkan nama proyek">
            @error('name')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <input type="hidden" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
        </div>
        <div class="mb-6">
            <label for="client" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Klien Proyek</label>
            <x-input :type="text" :id="client" :name="client"/>
            @error('client')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <x-label>Status Proyek</x-label>
            <select id="project-status" name="project-status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($status as $s)
                <option value="{{ $s }}">{{ $s }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-6">
            <label for="budget" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Anggaran Proyek</label>
            <input type="text"  name="budget" id="budget" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            @error('budget')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
            <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Deskripsi"></textarea>
            @error('description')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center justify-between pt-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
            <x-success-button>Tambah</x-success-button>
            <x-primary-button>Kembali Ke Manajemen Proyek</x-primary-button>
        </div>
    </form>
</div>
@endsection
