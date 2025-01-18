<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit Product</title>
</head>

<body class="bg-gray-100">
    <div class="mx-auto mt-20 max-w-screen-md bg-white shadow-md rounded-lg overflow-hidden">
        <div class="w-full border-b bg-gray-50 flex justify-between">
            <h1 class="text-2xl text-center text-blue-800 font-bold p-4 ">Edit Product</h1>
            <a href="{{ route('products.index') }}" class="m-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-md px-4 py-2 focus:outline-none ">Back</a>
        </div>
        <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" class="p-8 text-center">
            @csrf <!-- CSRF Token -->
            @method('PUT')

            <div class="formArea">
                <!-- Product Name -->
                <div class="col-span-2 mb-4">
                    <label for="name" class="block mb-1 text-md font-medium text-gray-900 text-left pl-1">Product Name:</label>
                    <input type="text" name="name" value="{{ $product->name }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        required>
                </div>

                <!-- Product Price and Stock -->
                <div class="flex justify-between items-center gap-4 mb-4 w-full">
                    <div class="w-1/2">
                        <label for="price" class="block mb-1 text-md font-medium text-gray-900 text-left pl-1">Product Price:</label>
                        <input type="number" name="price" value="{{ $product->price }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            required>
                    </div>
                    <div class="w-1/2">
                        <label for="stock" class="block mb-1 text-md font-medium text-gray-900 text-left pl-1">Product Stock:</label>
                        <input type="number" name="stock" value="{{ $product->stock }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            required>
                    </div>
                </div>

                <!-- Description -->
                <div class="col-span-2 mb-4">
                    <label for="description" class="block mb-1 text-md font-medium text-gray-900 text-left pl-1">Description: </label>
                    <textarea name="description" id="description" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ $product->description }}</textarea>
                </div>

                <!-- Product Image -->
                <label class="block mb-1 text-md font-medium text-gray-900 text-left pl-1">Product Image: </label>
                <div class="flex justify-start items-center gap-4 p-6 bg-gray-50 border border-gray-300 rounded-md">
                    <!-- Image Upload Input -->
                    <input type="file" name="image" id="imageInput" class="hidden" accept="image/*" onchange="handleImageUpload(event)">
                    <label for="imageInput" class="cursor-pointer bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow w-36">Choose Image</label>

                    <!-- Image Display Frame -->
                    <div id="imageFrame" class="w-48 h-52 border-4 border-gray-300 rounded-lg flex items-center justify-center overflow-hidden bg-gray-50 bg-white">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    </div>

                    <!-- Image Name -->
                    <p id="imageName" class="text-gray-700 w-1/4 break-words text-start">{{ $product->image }}</p>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="mt-5 text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 text-center">
                Update
            </button>
        </form>

    </div>


    <script>
        function handleImageUpload(event) {
            const file = event.target.files[0];
            const imageFrame = document.getElementById("imageFrame");
            const imageName = document.getElementById("imageName");

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imageFrame.innerHTML = `<img src="${e.target.result}" alt="Uploaded Image" class="w-full h-full object-cover">`;
                };
                reader.readAsDataURL(file);

                imageName.textContent = file.name;
            } else {
                imageFrame.innerHTML = `<img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">`;
                imageName.textContent = "{{ $product->image }}";
            }
        }
    </script>

</body>

</html>