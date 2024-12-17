<x-layout>

    <h1 class="font-bold text-4xl mb-5 text-center">Detail Contact</h1>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-10">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Phone</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Image</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Age</th>
                    <th scope="col" class="px-6 py-3">Country</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <td class="px-6 py-4">{{ $contact->phone }}</td>
                    <td class="px-6 py-4">{{ $contact->email }}</td>
                    @if ($contact->person->image)
                    <td class="px-6 py-4 w-40"><img src="{{ asset('storage/image/'.$contact->person->image )}}" alt=""></td>
                    @else
                    <td class="px-6 py-4 w-40">-</td>
                    @endif
                    <td class="px-6 py-4">{{ $contact->person->name }}</td>
                    <td class="px-6 py-4">{{ $contact->person->age }}</td>
                    <td class="px-6 py-4">{{ $contact->person->country }}</td>
                </tr>
            </tbody>
        </table>
    </div>


</x-layout>
