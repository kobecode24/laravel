<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session("success"))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                <p class="font-bold">Success</p>
                <p>{{ session("success") }}</p>
            </div>
        @endif
        @if (session("error"))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                <p class="font-bold">Error</p>
                <p>{{ session("error") }}</p>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Books</h1>
                    <div class="grid grid-cols-3 gap-4">
                        @foreach($books as $book)
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <h1>{{ $book->title }}</h1>
                                    <p>{{ $book->author }}</p>
                                    <p>{{ $book->description }}</p>
                                    <p>{{ $book->status }}</p>
                                    <form action="{{ route('reserve', $book->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Reserve</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
