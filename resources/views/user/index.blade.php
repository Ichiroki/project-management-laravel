@extends('layout.main')

@section('content')
<div class="container mt-16">
    <h1 class="text-3xl font-semibold uppercase text-stone-800">User Management</h1>
    <div x-data="{open: false}">
        <a href="{{ route('user.create') }}" class="inline-block px-5 py-2 my-6 transition bg-green-600 rounded-full text-stone-50 hover:bg-green-800" @click="open = true">Add new User</a>

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


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        {{-- <th scope="col" class="px-6 py-3">
                            Profile Picture
                        </th> --}}
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Registered Since
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $u)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            {{-- <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if ($u->avatar == '')
                                    <img src="{{ asset('storage/img/person.png') }}" alt="" class="w-[75px]">
                                @endif
                                <img src="{{ asset('storage/img/' . $u->avatar) }}" alt="" class="w-[75px]">
                            </th> --}}
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $u->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $u->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $u->created_at->diffForHumans() }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('user.detail', ['id' => $u->id, 'name' => $u->firstName]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                                <a href="{{ route('user.edit', ['id' => $u->id, 'name' => $u->firstName]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <form action="{{ route('user.delete', ['id' => $u->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    <div class="my-5">
        {{ $user->links() }}
    </div>
</div>
@endsection
