<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-dark overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-white">
                <button type="button" class="btn btn-primary"><a href="{{route('products.create')}}">Add a product</a></button>
                <table id="productsTable" class="table table-dark table-striped border border-light">
                    <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Data will be populated here by DataTables -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
