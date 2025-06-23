<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800">My Bookings</h2>
    </x-slot>

    @if(session('success'))
        <div class="mb-6 rounded-md bg-green-100 border border-green-400 p-4 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    @forelse($bookings as $booking)
        @php
            $status = strtolower(trim($booking->status));
            $statusClasses = [
                'accepted' => 'bg-green-100 text-green-800',
                'pending'  => 'bg-yellow-100 text-yellow-800',
                'rejected' => 'bg-red-100 text-red-800',
            ];
            $badgeClass = $statusClasses[$status] ?? 'bg-gray-100 text-gray-600';
        @endphp

        <div class="mb-6 rounded-lg shadow-md border border-gray-200 bg-white hover:shadow-lg transition-shadow duration-300">
            <div class="p-5">
                <div class="flex justify-between items-center mb-3">
                    <h3 class="text-lg font-semibold text-gray-900">Booking #{{ $booking->id }}</h3>
                    <span class="capitalize px-3 py-1 rounded-full text-sm font-medium {{ $badgeClass }}">
                        {{ $booking->status }}
                    </span>
                </div>

                <ul class="mb-4 list-disc list-inside text-gray-700">
                    @foreach($booking->foods as $food)
                        <li>{{ $food->name }} x {{ $food->pivot->quantity }} (${{ number_format($food->price, 2) }} each)</li>
                    @endforeach
                </ul>

                <p class="font-semibold text-gray-900 text-right text-lg">
                    Total: ${{ number_format($booking->foods->sum(fn($f) => $f->price * $f->pivot->quantity), 2) }}
                </p>
            </div>
        </div>
    @empty
        <p class="text-gray-600 text-center mt-10 text-lg">You have no bookings yet.</p>
    @endforelse
</x-app-layout>
