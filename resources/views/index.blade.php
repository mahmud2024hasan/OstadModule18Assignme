<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Product Manager</title>
</head>

<body class="bg-gray-50">
    <div>
        <h1 class="text-4xl text-center text-blue-700 font-bold pt-5 mt-3">Product Manager</h1>
        <p class="text-md text-center text-orange-600 mt-1 mb-5">This is a project of laravel CRUD operation.</p>

        <section class="p-3 sm:p-5">
            <div class="mx-auto max-w-screen-2xl px-4">
                <div class="bg-white relative shadow-lg rounded-md border border-gray-200 overflow-hidden">

                    <!-- Product Table Heading Area -->
                    <div class="flex flex-col md:flex-row items-center justify-between space-y-5 space-x-5 p-5">
                        <!-- Product Search Area -->
                        <div class="w-full md:w-1/2">
                            <form id="searchForm" class="flex items-center">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" id="searchInput" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2" placeholder="Search products by name" required>
                                </div>
                            </form>
                        </div>

                        <!-- Product Add Button Area -->
                        <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <a href="{{ route('products.create') }}" class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">
                                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>
                                Add new product
                            </a>
                        </div>
                    </div>

                    <!-- Product Table Area -->
                    <div class="overflow-x-auto mx-5">
                        <table class="w-full text-md text-left text-gray-700">
                            <thead class="text-sm text-center text-gray-700 uppercase bg-gray-100">
                                <tr>
                                    <!-- Sortable SL No Column -->
                                    <th scope="col" class="px-4 py-3 w-[80px]">
                                        <a href="{{ route('products.index', ['sort' => 'product_id', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}" class="text-blue-600 flex justify-center items-center">
                                            ID 
                                            @if(request('sort') === 'product_id')
                                            @if(request('direction') === 'asc')
                                            <span>&#9650;</span> <!-- Up Arrow -->
                                            @else
                                            <span>&#9660;</span> <!-- Down Arrow -->
                                            @endif
                                            @endif
                                        </a>
                                    </th>

                                    <!-- Product Image Column -->
                                    <th scope="col" class="px-4 py-3 w-[150px]">Product Image</th>

                                    <!-- Sortable Product Name Column -->
                                    <th scope="col" class="px-4 py-3 w-[250px]">
                                        <a href="{{ route('products.index', ['sort' => 'name', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}" class="text-blue-600 flex justify-center items-center">
                                            Product Name 
                                            @if(request('sort') === 'name')
                                            @if(request('direction') === 'asc')
                                            <span>&#9650;</span> <!-- Up Arrow -->
                                            @else
                                            <span>&#9660;</span> <!-- Down Arrow -->
                                            @endif
                                            @endif
                                        </a>
                                    </th>

                                    <!-- Description Column -->
                                    <th scope="col" class="px-4 py-3 w-[450px]">Description</th>

                                    <!-- Sortable Price Column -->
                                    <th scope="col" class="px-4 py-3">
                                        <a href="{{ route('products.index', ['sort' => 'price', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}" class="text-blue-600 flex justify-center items-center">
                                            Price 
                                            @if(request('sort') === 'price')
                                            @if(request('direction') === 'asc')
                                            <span>&#9650;</span> <!-- Up Arrow -->
                                            @else
                                            <span>&#9660;</span> <!-- Down Arrow -->
                                            @endif
                                            @endif
                                        </a>
                                    </th>

                                    <!-- Sortable Stock Column -->
                                    <th scope="col" class="px-4 py-3">
                                        <a href="{{ route('products.index', ['sort' => 'stock', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}" class="text-blue-600 flex justify-center items-center">
                                            Stock 
                                            @if(request('sort') === 'stock')
                                            @if(request('direction') === 'asc')
                                            <span>&#9650;</span> <!-- Up Arrow -->
                                            @else
                                            <span>&#9660;</span> <!-- Down Arrow -->
                                            @endif
                                            @endif
                                        </a>
                                    </th>

                                    <!-- Actions Column -->
                                    <th scope="col" class="px-4 py-3">Actions</th>
                                </tr>

                            </thead>
                            <tbody id="product-table-body">
                                @foreach ($products as $product)
                                <tr class="border-b text-center">
                                    <!-- SL No -->
                                    <td class="p-3">{{ $product->product_id }}</td>

                                    <!-- Product Image -->
                                    <td class="p-3">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="80" height="100">
                                    </td>

                                    <!-- Product Name -->
                                    <th class="p-3">{{ $product->name }}</th>

                                    <!-- Truncated Description -->
                                    <td class="p-3 text-justify">{{ Str::words($product->description, 30, '...') }}</td>

                                    <!-- Price -->
                                    <td class="p-3">{{ $product->price }}</td>

                                    <!-- Stock -->
                                    <td class="p-3">{{ $product->stock }}</td>

                                    <!-- Actions -->
                                    <td class="p-3">
                                        <a href="{{ route('products.show', $product->id) }}" class="font-medium text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:ring-green-300 rounded-md text-sm p-2 focus:outline-none mr-2">
                                            <i class="fas fa-eye"></i> Show
                                        </a>
                                        <a href="{{ route('products.edit', $product->id) }}" class="font-medium text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-md text-sm p-2 focus:outline-none mr-2">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-medium text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 rounded-md text-sm p-2 focus:outline-none">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Area -->
                    <nav id="pagination-links" class="flex flex-col justify-between items-center space-y-5 p-4" aria-label="Table navigation">
                        {{ $products->appends(request()->query())->links() }}
                    </nav>
                </div>
            </div>
        </section>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Ajax Search Script Area -->
    <script>
        $(document).ready(function() {
            $('#searchInput').on('input', function() {
           
                // Get the search query
                let query = $(this).val();

                // AJAX request
                $.ajax({
                    // Fetch search results
                    url: "{{ route('products.search') }}",
                    method: 'GET',
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('tbody').html(data);
                    },

                    // Error handling
                    error: function() {
                        console.log('Search failed. Plz try again.');
                    }
                });
            });
        });
    </script>


</body>

</html>