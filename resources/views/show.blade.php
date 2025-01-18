<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Show Product</title>
</head>

<body class="bg-gray-100">
    <div class="mx-auto mt-20 max-w-4xl bg-white shadow-md rounded-lg overflow-hidden">
        <div class="w-full border-b bg-gray-50 flex justify-between">
            <h1 class="text-2xl text-center text-blue-800 font-bold p-4 ">Product Details</h1>
            <a href="{{ route('products.index') }}" class="m-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-md px-4 py-2 focus:outline-none ">Back</a>
        </div>

        <div class="mx-auto mt-5 p-6 bg-white shadow-lg rounded-lg flex">
            <!-- Product Image -->
            <div class="w-[40%] flex justify-center items-center">
                <div class="border-4 border-gray-200 rounded-lg p-2">
                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        class="rounded-lg object-cover w-full h-[400px]">
                </div>
            </div>

            <!-- Product Details -->
            <div class="w-[60%] pl-8 flex flex-col justify-between">
                <!-- Product Name and Description -->
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 mb-4 border-b border-gray-300 pb-2">{{ $product->name }}</h1>
                    <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>
                </div>

                <!-- Product Price and Stock -->
                <div class="mt-6 mb-1 p-3 flex justify-between items-center border border-gray-300 rounded-md">
                    <p class="text-2xl font-bold text-orange-500 mb-2">${{ $product->price }}</p>
                    <p class="text-xl font-medium text-gray-500">{{ $product->stock }} In Stock</p>
                </div>
            </div>
        </div>



    </div>


</body>

</html>