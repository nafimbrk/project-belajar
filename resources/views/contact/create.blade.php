<x-layout>
    <h1 class="font-bold text-4xl text-center mt-10 mb-5">Tambah Data</h1>
    <form class="max-w-sm mx-auto" action="{{ route('contact.store') }}" method="POST">
        @csrf
        <div class="mb-5">
            <label for="people_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
            @error('people_id')
                <div class="text-red-500 font-bold italic">{{ $message }}</div>
            @enderror
            <select name="people_id" id="">
                <option value="" disabled>pilih orang</option>
                @foreach ($person as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-5">
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
            @error('phone')
                <div class="text-red-500 font-bold italic">{{ $message }}</div>
            @enderror
            <input type="number" name="phone" id="phone"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value="{{ old('phone') }}" />
        </div>
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            @error('email')
                <div class="text-red-500 font-bold italic">{{ $message }}</div>
            @enderror
            <input type="email" name="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value="{{ old('email') }}" />
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

</x-layout>
