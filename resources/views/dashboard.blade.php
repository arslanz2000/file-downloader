<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Card 1 -->
                    <div class="bg-white shadow-md rounded-lg hover:shadow-lg transition-shadow">
                        <a href="{{ route('admin.products.index') }}" class="block p-6">
                            <h3 class="text-xl font-semibold text-gray-800">Products</h3>
                            <p class="text-gray-600 mt-2">
                                Manage and view all products in your inventory.
                            </p>
                        </a>
                    </div>
    
                    <!-- Card 2 -->
                    <div class="bg-white shadow-md rounded-lg hover:shadow-lg transition-shadow">
                        <a href="{{ route('categories.index') }}" class="block p-6">
                            <h3 class="text-xl font-semibold text-gray-800">Categories</h3>
                            <p class="text-gray-600 mt-2">
                                Organize your products into categories.
                            </p>
                        </a>
                    </div>
    
                    <!-- Card 3 -->
                    <div class="bg-white shadow-md rounded-lg hover:shadow-lg transition-shadow">
                        <a href="{{ route('upcoming-products.index') }}" class="block p-6">
                            <h3 class="text-xl font-semibold text-gray-800">Upcoming Products</h3>
                            <p class="text-gray-600 mt-2">
                                Preview and manage upcoming product launches.
                            </p>
                        </a>
                    </div>
    
                    <!-- Card 4 -->
                    <div class="bg-white shadow-md rounded-lg hover:shadow-lg transition-shadow">
                        <a href="{{ route('upcoming-products.index') }}" class="block p-6">
                            <h3 class="text-xl font-semibold text-gray-800">Another Feature</h3>
                            <p class="text-gray-600 mt-2">
                                Access another key feature of the application.
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

</x-app-layout>
