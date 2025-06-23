<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            Manage Booking #{{ $booking->id }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-8">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <div class="mb-4">
                <p class="text-lg text-gray-700 dark:text-gray-200"><strong>User:</strong> {{ $booking->user->name }}</p>
                <p class="text-lg text-gray-700 dark:text-gray-200"><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
            </div>

            <form method="POST" action="{{ route('admin.bookings.update', $booking->id) }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Update Status</label>
                    <select id="status" name="status" class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-gray-800 dark:text-gray-100">
                        <option value="pending" @selected($booking->status == 'pending')>Pending</option>
                        <option value="accepted" @selected($booking->status == 'accepted')>Accepted</option>
                        <option value="rejected" @selected($booking->status == 'rejected')>Rejected</option>
                    </select>
                </div>

                <div>
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                        Update Status
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg mt-6 p-6">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Foods in this booking:</h3>
            <ul class="space-y-2 list-disc list-inside text-gray-700 dark:text-gray-300">
                @foreach($booking->foods as $food)
                    <li>
                        {{ $food->name }} &times; {{ $food->pivot->quantity }} 
                        <span class="text-sm text-gray-500">(${{ number_format($food->price, 2) }})</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
