<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-dark overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-white">
                <h4>Create A Product</h4>
                <form action="{{ route('products.store') }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label text-light">Name</label>
                        <input type="text" class="form-control bg-dark text-black border-secondary" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label text-light">Quantity</label>
                        <input type="number" class="form-control bg-dark text-black border-secondary" id="quantity" name="quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label text-light">Price</label>
                        <input type="number" class="form-control bg-dark text-black border-secondary" id="price" name="price" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label text-light">Description</label>
                        <textarea class="form-control bg-dark text-black border-secondary" id="description" name="description" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
