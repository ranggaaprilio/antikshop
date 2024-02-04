<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4 flex justify-between">
                        <h3 class="font-bold text-2xl">Create Product</h3>
                    </div>
                    <div>
                        <x-splade-form :for="$form" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
