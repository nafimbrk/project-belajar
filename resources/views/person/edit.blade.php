<x-layout>

    <h1 class="font-bold text-4xl text-center mt-10 mb-5">Edit Data</h1>


    <form class="max-w-sm mx-auto" action="{{ route('person.update', $person->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
            @error('name')
                <div class="text-red-500 font-bold italic">{{ $message }}</div>
            @enderror
            <input type="text" name="name" id="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value="{{ $person->name }}" />
        </div>
        <div class="mb-5">
            <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
            @error('age')
                <div class="text-red-500 font-bold italic">{{ $message }}</div>
            @enderror
            <input type="number" name="age" id="age"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value="{{ $person->age }}" />
        </div>
        <div class="mb-5">
            <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Negara</label>
            @error('country')
                <div class="text-red-500 font-bold italic">{{ $message }}</div>
            @enderror
            <input type="text" name="country" id="country"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value="{{ $person->country }}" />
        </div>
        <div class="mb-5">
            <label for="file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                Foto</label>
            @error('image')
                <div class="text-red-500 font-bold italic">{{ $message }}</div>
            @enderror
            <input type="file" name="image" id="file"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

</x-layout>
