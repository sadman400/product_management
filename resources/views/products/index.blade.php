<x-layout>
    <div class="container mx-auto py-12">
        <h1 class="text-4xl font-bold text-center mb-8"><a href="{{route('products.index')}}">Our Products</a></h1>

        <div class="grid grid-cols-1 gap-4">
            <div>
                <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 w-16  mb-6 rounded-md hover:bg-blue-600 transition duration-300">Create</a>
                <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 w-16  mb-6 rounded-md hover:bg-blue-600 transition duration-300">Home</a>
            </div>
            <form action="{{ route('products.index') }}" method="GET">
                <input type="text" name="search" placeholder="Search products" class="border border-gray-300 rounded-md px-4 py-2 w-1/3" value="{{ request('search') }}">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">Search</button>
            </form>

            <form action="{{ route('products.index') }}" method="GET">
                <select name="sort" class="border border-gray-300 rounded-md px-4 py-2 w-1/3" onchange="this.form.submit()">
                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Price: Low to High</option>
                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Price: High to Low</option>
                </select>
            </form>

            @foreach ($products as $product)
                <div class="bg-white rounded-md shadow-md flex p-4 space-x-4">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="" class="w-1/6 h-auto object-cover rounded-md">
                    <div class="flex-1">
                        <h2 class="text-xl font-bold mb-1">{{ $product->name }}</h2>
                        <p class="mb-2 text-gray-600 text-sm">{{ Str::limit($product->description, 80) }}</p>
                        <p class="text-lg font-bold mb-1">{{ $product->price }}&euro;</p>
                        <p class="text-xs text-gray-600">{{ $product->stock }} in stock</p>
                        <div class="flex justify-start space-x-4 mt-3">
                            <a href="{{route('products.show', $product->id)}}" class="bg-blue-500 px-3 py-2 rounded-full text-white hover:bg-blue-600 transition duration-300 text-sm">View</a>
                            <a href="{{route('products.edit', $product->id)}}" class="bg-green-600 px-3 py-2 text-white rounded-full hover:bg-gray-300 transition duration-300 text-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 px-3 py-2 rounded-full text-white hover:bg-red-600 transition duration-300 text-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            {{$products->appends(['search' => request('search'), 'sort' => request('sort')])->links()}}
        </div>
    </div>
</x-layout>

