@extends('layouts.template')

@section('content')
    <div class="p-10 mt-10 sm:ml-64">
        <h1 class="text-2xl mb-1 font-bold">Data Rayon</h1>
        <h3 class="mb-2"><a href="{{ route('dashboard') }}" class="text-blue-500">Dashboard</a> / <span class="font-semibold">Data Rayon</span></h3>

        @if (Session::get('success'))
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Success alert!</span> {{ Session::get('success') }}
                </div>
            </div>
        @endif

        <div class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            <a href="{{ route('admin.rayon.create') }}" class="inline-flex items-end justify-center p-2.5 mb-2 me-2 overflow-hidden text-sm font-medium text-white bg-gradient-to-br from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800 rounded-md">
                Tambah Data Rayon
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800">
                <thead>
                    <tr>
                        <th class="py-3 px-6 bg-blue-500 text-white">No.</th>
                        <th class="py-3 px-6 bg-blue-500 text-white">Rayon</th>
                        <th class="py-3 px-6 bg-blue-500 text-white">PS</th>
                        <th class="py-3 px-6 bg-blue-500 text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rayons as $rayon)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-900">
                            <td class="py-2 px-6">{{ ($rayons->currentpage() - 1) * $rayons->perpage() + $loop->index + 1 }}</td>
                            <td class="py-2 px-6">{{ $rayon['rayon'] }}</td>
                            <td class="py-2 px-6">{{ $rayon['user']['name'] }}</td>
                            <td class="py-2 px-6">
                                <a href="{{ route('admin.rayon.edit', $rayon['id']) }}" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <button class="text-red-600 dark:text-red-500 hover:underline" onclick="deleteRayon({{ $rayon['id'] }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3">@if ($rayons->count())
            {{ $rayons->links() }}
        @endif</div>
    </div>

    <script>
        function deleteRayon(rayonId) {
            // Implement your delete logic here
            // You can use JavaScript to make an AJAX request to delete the record
            console.log('Deleting Rayon with ID:', rayonId);
        }
    </script>
@endsection
