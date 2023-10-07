@extends('layout.main')

@section('content')
    <div class="flex items-center mt-12 h-96 jumbotron bg-stone-50">
        <div class="container">
            <h1 class="text-5xl font-bold uppercase">Welcome</h1>
            <p class="mt-3">My name is Fahrezi Rizqiawan, i am a college student and love to code</p>
        </div>
    </div>

    <div class="mt-9 header">
        <div class="container">
            <h1 class="text-3xl font-bold text-center uppercase">What's my purpose to make this website ?</h1>
            <div class="flex flex-col items-center justify-center gap-5 mt-16 lg:flex-row lg:items-stretch">
                <div class="relative block max-w-sm p-6 transition duration-200 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <i class="absolute top-[-45px] text-5xl right-[39%] bi bi-book border-4 border-gray-200 p-4 rounded-full bg-white"></i>
                    <h5 class="mt-8 mb-2 text-2xl font-bold tracking-tight text-center text-gray-900 dark:text-white">Learning</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">I learn laravel by build this website to fill my own projects and post it on my portfolio</p>
                </div>

                <div class="relative block max-w-sm p-6 transition duration-200 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <i class="absolute top-[-45px] text-5xl right-[39%] bi bi-laptop border-4 border-gray-200 p-4 rounded-full bg-white"></i>
                    <h5 class="mt-8 mb-2 text-2xl font-bold tracking-tight text-center text-gray-900 dark:text-white">Better Understanding</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">To improve my laravel knowledge, CRUD, Authentication, and Authorization understanding.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
