@extends('layout.main')

@section('content')
    <div class="mt-16">
        <h1 class="text-3xl text-stone-800 font-semibold uppercase">Project Management</h1>
        <div x-data="{open: false}">
            <button type="button" class="my-6 py-2 px-5 bg-green-600 text-stone-50 rounded-full hover:bg-green-800
            inline-block" @click="open = true" data-modal-target="staticModal" data-modal-toggle="staticModal">Create New Project</button>

            <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full" x-show="open">
                <div class="relative w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Create Project
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="staticModal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <form action="{{ route('project.add') }}" method="POST">
                                @method('post')
                                @csrf
                                <div class="mb-6">
                                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Proyek</label>
                                    <input type="nama" id="nama" name="nama" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Masukkan nama proyek" required>
                                    <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    <span class="font-medium">Oh, snapp!</span> Some error message.</p>
                                </div>
                                <div class="mb-6">
                                    <label for="tim" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tim Proyek</label>
                                    <input type="text" id="tim" name="tim" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                                </div>
                                <div class="mb-6">
                                    <label for="klien" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Klien Proyek</label>
                                    <input type="text" id="klien" name="klien" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                                </div>
                                <div class="mb-6">
                                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Proyek</label>
                                    <input type="text" name="status" id="status" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                                </div>
                                <div class="mb-6">
                                    <label for="anggaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Anggaran Proyek</label>
                                    <input type="text"  name="anggaran" id="anggaran" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                                </div>
                                <div class="mb-6">
                                    <label for="tim" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                                    <input type="text" id="deskripsi" name="deskripsi" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                                </div>
                                <div class="flex items-center pt-3 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <button type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-300">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @foreach ($project as $p)
            <div class="p-3 text-stone-900 bg-stone-200 mb-3 border-l-4 border-l-stone-900 rounded-md">
                <h1 class="text-2xl">{{ $p->nama }}</h1>
                <div class="flex flex-col">
                    <p>Tim Project : {{ $p->tim }}</p>
                    <p>Klien : {{ $p->klien }}</p>
                </div>
                <p class="line-clamp-1 mt-3">{{ $p->deskripsi }}</p>
                <div class="mt-3 flex gap-3">
                    <a href="{{ route('project.detail') }}" class="py-2 px-5 bg-green-600 text-stone-50 rounded-full hover:bg-green-800">Detail</a>
                    <a href="" class="py-2 px-5 bg-cyan-400 text-stone-900 rounded-full hover:bg-cyan-600 hover:text-stone-50">Update</a>
                    <a href="" class="py-2 px-5 bg-red-600 text-stone-50 rounded-full hover:bg-red-800">Delete</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
