<x-layout>



    <div class="container mx-auto py-12">
        <a href="{{route('products.index')}}" class="bg-blue-500 text-white px-4 py-2 w-16  mb-6 rounded-md hover:bg-blue-600 transition duration-300">&larr; Go back</a>
        <a href="{{ route('products.index') }}" class="bg-blue-500 text-white px-4 py-2 w-16  mb-6 rounded-md hover:bg-blue-600 transition duration-300">ADD</a>
        <h1 class="text-5xl font-bold text-center mb-16">{{ $product->name }}</h1>
        <div class="bg-white rounded-md shadow-md p-8">
            <div class="flex space-x-8">
                <img src="{{ asset('storage/' . $product->image) }}" alt="" class="w-1/2 h-auto object-cover rounded-md">
                <div class="flex flex-col space-y-8">
                    <p class="text-xl text-gray-600">{{ $product->description }}</p>
                    <div class="flex justify-between">
                        <p class="text-3xl font-bold mb-1">{{ $product->price }}&euro;</p>
                        <p class="text-xl text-gray-600">{{ $product->stock }} in stock</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>

