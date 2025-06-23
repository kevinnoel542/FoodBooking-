<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Edit Food
        </h2>
    </x-slot>

    <div class="py-8 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('admin.foods.update', $food->id) }}"
              class="bg-white p-6 rounded-lg shadow-lg space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">
                    Food Name <span class="text-red-500">*</span>
                </label>
                <input type="text" name="name" id="name" required
                       value="{{ old('name', $food->name) }}"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-gray-900 bg-gray-50">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">
                    Description (optional)
                </label>
                <textarea name="description" id="description" rows="3"
                          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-gray-900 bg-gray-50">{{ old('description', $food->description) }}</textarea>
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">
                    Price ($) <span class="text-red-500">*</span>
                </label>
                <input type="number" step="0.01" min="0" name="price" id="price" required
                       value="{{ old('price', $food->price) }}"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-gray-900 bg-gray-50">
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md shadow-sm transition">
                    Update Food
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
