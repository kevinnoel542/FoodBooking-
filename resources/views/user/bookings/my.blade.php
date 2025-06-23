<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800">My Bookings</h2>
    </x-slot>

    @foreach($bookings as $booking)
        <div class="mb-10 p-6 bg-white rounded-lg shadow border border-gray-200">
            <h3 class="text-lg font-semibold mb-4">
                Booking #{{ $booking->id }}
                <span class="ml-4 px-3 py-1 rounded-full text-sm font-medium
                    {{ $booking->status === 'accepted' ? 'bg-green-100 text-green-800' : '' }}
                    {{ $booking->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                    {{ $booking->status === 'rejected' ? 'bg-red-100 text-red-800' : '' }}">
                    {{ ucfirst($booking->status) }}
                </span>
            </h3>

            <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-gray-300">Food</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-gray-300">Quantity</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-gray-300">Price Each</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @php $total = 0; @endphp
                    @foreach($booking->foods as $food)
                        @php
                            $subtotal = $food->price * $food->pivot->quantity;
                            $total += $subtotal;
                        @endphp
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap border-r border-gray-300">{{ $food->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border-r border-gray-300">{{ $food->pivot->quantity }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border-r border-gray-300">${{ number_format($food->price, 2) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">${{ number_format($subtotal, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-gray-50 font-semibold text-gray-900">
                    <tr>
                        <td colspan="3" class="px-6 py-3 text-right border-t border-gray-300">Total Price</td>
                        <td class="px-6 py-3 border-t border-gray-300">${{ number_format($total, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    @endforeach
</x-app-layout>
