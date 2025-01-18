<!-- Search Results Table -->
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
        <a href="{{ route('products.show', $product->id) }}" class="font-medium text-blue-600 hover:underline">Show</a>
        <a href="{{ route('products.edit', $product->id) }}" class="font-medium text-green-700 hover:underline">Edit</a>
        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this product?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="font-medium text-red-600 hover:underline">Delete</button>
        </form>
    </td>
</tr>
@endforeach