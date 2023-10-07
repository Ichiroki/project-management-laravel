@extends('layout.main')

@section('content')
<div class="container">
    <h1 class="pb-3 mt-6 mb-3 text-3xl border-b text-stone-800">Tambah Proyek</h1>
    <form action="{{ route('project.add') }}" method="POST" novalidate>
        @method('post')
        @csrf
        <div class="mb-6">
            <label for="project_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Proyek</label>
            <input type="text" id="project_name" name="project_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Masukkan nama proyek">
            @error('project_name')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <input type="hidden" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
        </div>
        <div class="mb-6">
            <label for="project_division" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tim Proyek</label>
            <input type="text" id="project_division" name="project_division" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            @error('project_division')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="project_client" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Klien Proyek</label>
            <input type="text" id="project_client" name="project_client" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            @error('project_client')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="project-status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Proyek</label>
            <select id="project-status" name="project-status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($status as $s)
                <option value="{{ $s }}">{{ $s }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-6">
            <label for="project_budget" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Anggaran Proyek</label>
            <input type="text"  name="project_budget" id="project_budget" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            @error('project_budget')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="project_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
            <textarea id="project_description" name="project_description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Deskripsi"></textarea>
            @error('project_description')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center justify-between pt-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
            <button type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-300">Tambah</button>
            <a href="{{ route('project') }}" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-300">Kembali Ke Manajemen Proyek</a>
        </div>
    </form>
</div>
@endsection
