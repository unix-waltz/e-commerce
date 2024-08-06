@extends('Admin.layout')
@section('c')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />

    <br><br>
    <div class="w-1/2 mx-auto overflow-hidden mt-2 grid grid-cols-1 md:grid-cols-2 gap-0">
        <img src="{{ asset('storage/' . $slug->product_img) }}" alt=""
            class=" w-1/2 lg:w-[90%] object-cover rounded" />
        <div class="flow-root">
            <dl class="-my-3 divide-y divide-gray-100 text-sm">
                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Product Name</dt>
                    <dd class="text-gray-700 sm:col-span-2">{{ $slug->product_name }}</dd>
                </div>

                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Category</dt>
                    <dd class="text-gray-700 sm:col-span-2">{{ $slug->product_category }}</dd>
                </div>

                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Quantity/Stock</dt>
                    <dd class="text-gray-700 sm:col-span-2">{{ $slug->product_quantity }}</dd>
                </div>

                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Price</dt>
                    <dd class="text-gray-700 sm:col-span-2">RP.{{ number_format($slug->product_price, 0, ',', '.') }} IDR
                    </dd>
                </div>

                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Description</dt>
                    <dd class="text-gray-700 sm:col-span-2">{{ $slug->product_description }}
                    </dd>
                </div>
                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Status</dt>
                    <dd class="text-gray-700 sm:col-span-2">
                        @if ($slug->status == 'active')
                            <span
                                class="inline-flex items-center justify-center rounded-full bg-emerald-100 px-2.5 py-0.5 text-emerald-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="-ms-1 me-1.5 h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                                <p class="whitespace-nowrap text-sm"> {{ $slug->status }}</p>
                            </span>
                        @else
                            <span
                                class="inline-flex items-center justify-center rounded-full bg-red-100 px-2.5 py-0.5 text-red-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="-ms-1 me-1.5 h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>

                                <p class="whitespace-nowrap text-sm">{{ $slug->status }}</p>
                            </span>
                        @endif



                        <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots"
                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none  focus:ring-gray-50 "
                            type="button">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 4 15">
                                <path
                                    d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownDots"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                            <ul class="py-2 text-sm text-gray-700 "
                                aria-labelledby="dropdownMenuIconButton">
                                <li>
                                    <a href="/admin/product/status/{{ $slug->status }}/{{ $slug->slug }}"
                                        class="block px-4 py-2 hover:bg-gray-100 ">{{ $slug->status == 'active' ? 'nonactive this product' : 'active this product' }}</a>
                                </li>
                            </ul>

                        </div>


                    </dd>
                </div>
            </dl>
            <div class="mt-3">
                <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                    class="group relative inline-flex items-center overflow-hidden rounded bg-gray-600 px-9 py-3 text-white focus:outline-none focus:ring active:bg-gray-500">
                    <span class="absolute -start-full transition-all group-hover:start-4">
                        <svg class="size-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </span>

                    <span class="text-sm font-medium transition-all group-hover:ms-4"> Edit </span>
                </button>

                <a class="inline-block rounded border border-red-600 px-9 py-2 text-sm font-medium text-red-600 hover:bg-red-600 hover:text-white focus:outline-none focus:ring active:bg-red-500"
                    href="/admin/delete/{{ $slug->slug }}">
                    Delete
                </a>
            </div>

        </div>

    </div>
    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <form action="/admin/product/edit" method="post" class="relative bg-white rounded-lg shadow"
                enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="hidden" name="old_img" value="{{ $slug->product_img }}">
                <input type="hidden" name="slug" value="{{ $slug->slug }}">
                <div class="flex items-center justify-between p-4 md:p-5 rounded ">
                    <h3 class="text-xl font-semibold text-gray-900 ">
                        Edit Product
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
                    <section class="bg-white ">
                        <div class=" px-4 mx-auto max-w-2xl">
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="sm:col-span-2">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Product
                                        Name</label>
                                    <input type="text" name="product_name" id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5   "
                                        placeholder="Type product name" value="{{ $slug->product_name }}" required>
                                </div>
                                <div class="w-full">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 "
                                        for="user_avatar">Upload
                                        file</label>
                                    <input name="product_img"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none "
                                        aria-describedby="user_avatar_help" id="user_avatar" type="file">
                                    <div class="mt-1 text-sm text-gray-500 " id="user_avatar_help">A
                                        Product Image</div>
                                </div>
                                <div class="w-full">
                                    <label for="price"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                                    <input type="number" name="product_price" id="price"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5    "
                                        placeholder="$2999" value="{{ $slug->product_price }}" required>
                                </div>
                                <div>
                                    <label for="category"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Category</label>
                                    <select id="category" name="product_category"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5    ">
                                        <option selected="Fashion">Fashion</option>
                                        <option value="Electronic">Electronic</option>
                                        <option value="Gadged">Gadged</option>
                                        <option value="Accesoris">Accesoris</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="quantity-input"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Choose
                                        quantity/stock:</label>
                                    <div class="relative flex items-center max-w-[8rem]">
                                        <button type="button" id="decrement-button"
                                            data-input-counter-decrement="quantity-input"
                                            class="bg-gray-100  hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100  focus:ring-2 focus:outline-none">
                                            <svg class="w-3 h-3 text-gray-900 " aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                            </svg>
                                        </button>
                                        <input type="text" id="quantity-input" data-input-counter
                                            name="product_quantity" aria-describedby="helper-text-explanation"
                                            class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 "
                                            placeholder="999" value="" required />
                                        <button type="button" id="increment-button"
                                            data-input-counter-increment="quantity-input"
                                            class="bg-gray-100  hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100  focus:ring-2 focus:outline-none">
                                            <svg class="w-3 h-3 text-gray-900 " aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="description"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                                    <textarea id="description" rows="8" name="product_description"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500    "
                                        placeholder="Your description here" required>{{ $slug->product_description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="flex items-center p-4 md:p-5 rounded ">
                    <button type="submit"
                        class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Edit</button>
                    <button data-modal-hide="default-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-gray-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Decline</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
@endsection
