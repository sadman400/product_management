<x-layout>

    <div class="container mx-auto">
        <h1 class="text-center py-5 font-bold text-3xl">Create Product</h1>

        <a href="{{route('products.index')}}" class="bg-blue-500 text-white px-4 py-2 w-16  mb-6 rounded-md hover:bg-blue-600 transition duration-300">&larr; Go back</a>

        <div class="flex justify-center">
            <form action="{{route('products.store')}}" enctype="multipart/form-data" class="flex flex-col justify-center items-center w-1/2" method="post">
                @csrf

                <div class="mb-4 w-full">
                    <label for="product_id" class="block text-gray-700 text-sm font-bold mb-2">Product ID</label>
                    <input type="text" name="product_id" value="{{old('product_id')}}" id="product_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('product_id')
                        <p class="text-red-500 text-xs italic">{{$message}}</p>
                    @enderror
                </div>


                <div class="mb-4 w-full">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <input type="text" name="name" value="{{old('name')}}" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('name')
                        <p class="text-red-500 text-xs italic">{{$message}}</p>
                    @enderror
                </div>


                <div class="mb-4 w-full">
                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                    <input type="text" name="price" value="{{old('price')}}" id="price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('price')
                        <p class="text-red-500 text-xs italic">{{$message}}</p>
                    @enderror
                </div>


                <div class="mb-4 w-full">
                    <label for="stock" class="block text-gray-700 text-sm font-bold mb-2">Stock</label>
                    <input type="text" name="stock" value="{{old('stock')}}" id="stock" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('stock')
                        <p class="text-red-500 text-xs italic">{{$message}}</p>
                    @enderror
                </div>


                <div class="mb-4 w-full">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                    <textarea name="description" id="description" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                    @error('description')
                        <p class="text-red-500 text-xs italic">{{$message}}</p>
                    @enderror
                </div>


                <div class="mb-4 w-full">
                    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                    <input type="file" name="image" value="{{old('image')}}"  id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('image')
                        <p class="text-red-500 text-xs italic">{{$message}}</p>
                    @enderror
                </div>


                <div class="mb-4 w-full">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Create
                    </button>


            </form>
        </div>

    </div>

</x-layout>

