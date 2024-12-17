<x-layout>

    <h1 class="font-bold text-4xl text-center mt-10 mb-5">Tambah Data</h1>
    <form class="max-w-sm mx-auto" action="{{ route('job.store') }}" method="POST">
        @csrf
        <div class="mb-5">
            <label for="people_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
            @error('people_id')
            <div class="text-red-500 font-bold italic">{{ $message }}</div>
            @enderror
            <select name="people_id" id="">
                <option value="" disabled>pilih nama</option>
                @foreach ($person as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-5">
            <label for="job_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
            @error('job_title')
            <div class="text-red-500 font-bold italic">{{ $message }}</div>
            @enderror
            <input type="text" name="job_title" id="job_title"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('age') }}" />
        </div>
        <div class="mb-5">
            <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company</label>
            @error('company')
            <div class="text-red-500 font-bold italic">{{ $message }}</div>
            @enderror
            <input type="text" name="company" id="company"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('country') }}" />
        </div>
        <div class="mb-5">
            <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start
                @error('start_date')
                    <div class="text-red-500 font-bold italic">{{ $message }}</div>
                @enderror</label>
            <input type="date" name="start_date" id="start_date"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
        </div>
        <div class="mb-5">
            <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End
                @error('end_date')
                    <div class="text-red-500 font-bold italic">{{ $message }}</div>
                @enderror</label>
            <input type="date" name="end_date" id="end_date"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

</x-layout>