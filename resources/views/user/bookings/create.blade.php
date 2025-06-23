<x-app-layout>
  <x-slot name="header">
    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Book Food</h2>
  </x-slot>

  <form method="POST" action="{{ route('bookings.store') }}" class="max-w-3xl mx-auto space-y-6">
    @csrf

    {{-- Validation Errors --}}
    @if ($errors->any())
      <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div id="foods-container" class="grid grid-cols-1 sm:grid-cols-2 gap-6">
      @foreach($foods as $food)
        <label
          for="food_{{ $food->id }}"
          class="flex items-center p-4 rounded-lg shadow-md cursor-pointer
                 bg-gray-100 dark:bg-gray-800 hover:bg-indigo-600 hover:text-white transition-colors duration-300"
        >
          <input
            type="checkbox"
            name="foods[{{ $food->id }}][selected]"
            value="1"
            id="food_{{ $food->id }}"
            class="w-5 h-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
            {{ old("foods.$food->id.selected") ? 'checked' : '' }}
          />

          <div class="ml-4 flex-1">
            <div class="text-lg font-semibold">{{ $food->name }}</div>
            <div class="text-sm text-gray-600 dark:text-gray-300">${{ number_format($food->price, 2) }}</div>
          </div>

          <input
            type="number"
            name="foods[{{ $food->id }}][quantity]"
            min="1"
            value="{{ old("foods.$food->id.quantity", 1) }}"
            class="w-16 px-2 py-1 border border-gray-300 rounded text-gray-900 dark:text-gray-100 dark:bg-gray-700 focus:ring-indigo-500 focus:border-indigo-500"
          />
        </label>
      @endforeach
    </div>

    <div class="flex justify-end">
      <button
        type="submit"
        class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded shadow focus:outline-none focus:ring-2 focus:ring-indigo-500"
      >
        Submit Booking
      </button>
    </div>
  </form>
</x-app-layout>
