<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add Product</title>
</head>

<body class="bg-gray-100">
    <div class="mx-auto mt-20 max-w-screen-md bg-white shadow-md rounded-lg overflow-hidden">
        <div class="w-full border-b bg-gray-50 flex justify-between">
            <h1 class="text-2xl text-center text-[#111C43] font-bold p-4 ">Add New Product</h1>
            <a href="{{ route('products.index') }}" class="m-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-md px-4 py-2 focus:outline-none ">Back</a>
        </div>
        <form method="POST" action="{{ route('products.store') }}" class="p-8 text-center" enctype="multipart/form-data">
            @csrf <!-- CSRF Token -->

            <div class="">
                <!-- Product Name -->
                <div class="col-span-2 mb-4">
                    <label for="name" class="block mb-1 text-md font-medium text-gray-900 text-left pl-1">Product Name:</label>
                    <input type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type product name" required>
                </div>

                <!-- Product Price and Stock -->
                <div class="flex justify-between items-center gap-4 mb-4 w-full">
                    <div class="w-1/2">
                        <label for="price" class="block mb-1 text-md font-medium text-gray-900 text-left pl-1">Product Price:</label>
                        <input type="number" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type product price" required>
                    </div>
                    <div class="w-1/2">
                        <label for="stock" class="block mb-1 text-md font-medium text-gray-900 text-left pl-1">Product Stock:</label>
                        <input type="number" name="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type product stock" required>
                    </div>
                </div>

                <!-- Product Description -->
                <div class="col-span-2 mb-4">
                    <label for="description" class="block mb-1 text-md font-medium text-gray-900 text-left pl-1">Description: </label>
                    <textarea name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write product description here"></textarea>
                </div>

                <!-- Product Image -->
                <label class="block mb-1 text-md font-medium text-gray-900 text-left pl-1">Product Image: </label>
                <div class="flex justify-start items-center gap-4 p-6 bg-gray-50 border border-gray-300 rounded-md">
                    <!-- Image Upload Input -->
                    <div class="p-1">
                        <input type="file" name="image" id="imageInput" class="hidden" accept="image/*" onchange="handleImageUpload(event)" />
                        <label for="imageInput" class="cursor-pointer bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow w-36">Choose Image</label>
                        <p class="text-gray-500 mt-3 text-sm">Maximum file size: 2MB</p>
                    </div>
                    <!-- Image Display Frame -->
                    <div id="imageFrame" class="w-48 h-52 border-4 border-gray-300 rounded-lg flex items-center justify-center overflow-hidden bg-gray-50 bg-white">
                        <p class="text-gray-500">No image selected</p>
                    </div>

                    <!-- Image Name -->
                    <p id="imageName" class="text-gray-700 w-1/4 break-words text-start"></p>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="mt-5 text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
                Add Product
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
                    // Display image inside the frame
                    imageFrame.innerHTML = `<img src="${e.target.result}" alt="Uploaded Image" class="w-full h-full object-cover">`;
                };
                reader.readAsDataURL(file);

                // Display image name
                imageName.textContent = file.name;
            } else {
                // Reset frame and name if no file is selected
                imageFrame.innerHTML = `<p class="text-gray-500">No image selected</p>`;
                imageName.textContent = "";
            }
        }
    </script>
</body>

</html>