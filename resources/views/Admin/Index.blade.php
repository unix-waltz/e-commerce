@extends('Admin.layout')
@section('c')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <section>
        <div class="mx-auto max-w-full px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
            <header>
                <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                    class="inline-block rounded border border-gray-600 bg-gray-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-gray-600 focus:outline-none focus:ring active:text-gray-500">
                    Add New Product
                </button>
                <br><br>
                <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">Product Collection</h2>
            </header>
            @if ($products->isEmpty())
                <div class="mt-4 w-full flex justify-center">
                    <div class="w-1/5 text-center text-gray-500">No product found</div>
                </div>
            @else
                <div class="mt-8">
                    <p class="text-sm text-gray-500">Showing <span>
                            @if ($products->count() >= 8)
                                8
                            @else
                                {{ $products->count() }}
                            @endif
                        </span> of {{ $products->count() }}</p>
                </div>
                <div class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($products as $p)
                        <div>
                            <a href="/admin/product/{{ $p->slug }}" class="group block overflow-hidden">
                                <img src="{{ asset('storage/' . $p->product_img) }}" alt=""
                                    class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[450px]" />

                                <div class="relative bg-white pt-3">
                                    <h3 class="text-xs text-gray-700 group-hover:underline group-hover:underline-offset-4">
                                        {{ $p->product_name }}
                                    </h3>

                                    <p class="mt-2">
                                        <span class="sr-only"> Regular Price </span>

                                        <span class="tracking-wider text-gray-900"> RP.{{number_format($p->product_price, 0, ',', '.')}} IDR </span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                {{$products->links()}}
            @endif

        </div>
    </section>


    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <form action="/admin/create" method="post" class="relative bg-white rounded-lg shadow"
                enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="flex items-center justify-between p-4 md:p-5 rounded ">
                    <h3 class="text-xl font-semibold text-gray-900 ">
                        Create a new product
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                        data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <hr>
                    <section class="bg-white dark:bg-gray-900">
                        <div class=" px-4 mx-auto max-w-2xl">
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="sm:col-span-2">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                                        Name</label>
                                    <input type="text" name="product_name" id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type product name" required>
                                </div>
                                <div class="w-full">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="user_avatar">Upload
                                        file</label>
                                    <input name="product_img"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        aria-describedby="user_avatar_help" id="user_avatar" type="file" required>
                                    <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A
                                        Product Image</div>
                                </div>
                                <div class="w-full">
                                    <label for="price"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                    <input type="number" name="product_price" id="price"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="RP.{{number_format(200000, 0, ',', '.')}}" required>
                                </div>
                                <div>
                                    <label for="category"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                    <select id="category" name="product_category"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="Fashion">Fashion</option>
                                        <option value="Electronic">Electronic</option>
                                        <option value="Gadged">Gadged</option>
                                        <option value="Accesoris">Accesoris</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="quantity-input"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose
                                        quantity/stock:</label>
                                    <div class="relative flex items-center max-w-[8rem]">
                                        <button type="button" id="decrement-button"
                                            data-input-counter-decrement="quantity-input"
                                            class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                            <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                            </svg>
                                        </button>
                                        <input type="text" id="quantity-input" data-input-counter
                                            name="product_quantity" aria-describedby="helper-text-explanation"
                                            class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="999" required />
                                        <button type="button" id="increment-button"
                                            data-input-counter-increment="quantity-input"
                                            class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                            <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="description"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                    <textarea id="description" rows="8" name="product_description"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Your description here" required></textarea>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="flex items-center p-4 md:p-5 rounded ">
                    <button type="submit"
                        class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Add</button>
                    <button data-modal-hide="default-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-gray-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Decline</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
@endsection