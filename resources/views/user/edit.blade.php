@extends('layout.main')

@section('content')
<div class="container">
    <h1 class="pb-3 mt-6 mb-3 text-3xl border-b text-stone-800">Tambah Anggota</h1>
    <form action="{{ route('user.add') }}" method="POST" enctype="multipart/form-data">
        @method('post')
        @csrf
        <div class="mb-6 flex justify-between items-center gap-5">
            <div class="w-1/2">
                <label for="firstName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Depan</label>
                <input type="text" id="firstName" name="firstName" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Masukkan nama depan" value={{ $user->firstName }}>
                @error('firstName')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-1/2">
                <label for="lastName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Belakang</label>
                <input type="text" id="lastName" name="lastName" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Masukkan nama belakang" value={{ $user->lastName }}>
                @error('lastName')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" id="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value={{ $user->email }}>
            @error('email')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="born" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
            <input type="date" id="born" name="born" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value={{ $user->born }}>
            @error('born')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <div>
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Rumah</label>
                <textarea name="address" id="address" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">{{ $user->address }}</textarea>
                @error('address')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-between gap-5 mt-6">
                <div class="w-1/2">
                    <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota</label>
                    <input type="text" id="city" name="city" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{ $user->city }}">
                    @error('city')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                    <input type="text" id="state" name="state" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{ $user->city }}">
                    @error('state')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mt-6">
                <div class="flex justify-between gap-5">
                    <div class="w-1/2">
                        <img alt="" class="img-preview w-[175px] mx-auto" src={{ asset('storage/img/'. $user->avatar) }}>
                    </div>
                    <div class="w-1/2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="avatar">Picture</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="avatar" name="avatar" type="file" onchange="previewImage()">
                        @error('avatar')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="oldPic" name="oldPic" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">


        <div class="flex items-center justify-between pt-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
            <button type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-300">Create</button>
            <a href="{{ route('project') }}" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-300">Back to User Page</a>
        </div>
    </form>
</div>

<script>
    function previewImage() {
        const img = document.querySelector('#avatar')
        const imgPrev = document.querySelector('.img-preview')

        imgPrev.style.display = 'block'

        const ofReader = new FileReader()
        ofReader.readAsDataURL(img.files[0])

        ofReader.onload = function(oFREvent) {
            imgPrev.src = oFREvent.target.result
        }
    }
</script>
@endsection
