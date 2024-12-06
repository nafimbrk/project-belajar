<x-layout>

    <h1 class="font-bold text-4xl mb-5 text-center">Detail Person</h1>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-10">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Age</th>
                    <th scope="col" class="px-6 py-3">Country</th>
                    <th scope="col" class="px-6 py-3">Phone</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <td class="px-6 py-4">{{ $person->name }}</td>
                    <td class="px-6 py-4">{{ $person->age }}</td>
                    <td class="px-6 py-4">{{ $person->country }}</td>
                    @forelse ($person->contact as $item)
                        <td class="px-6 py-4">{{ $item->phone }}</td>
                        <td class="px-6 py-4">{{ $item->email }}</td>
                    @empty
                        <td class="px-6 py-4">-</td>
                        <td class="px-6 py-4">-</td>
                    @endforelse
                </tr>
            </tbody>
        </table>
    </div>


</x-layout>
