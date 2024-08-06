@extends('Customers.layout')
@section('c')
    <section>
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
            <div class="mx-auto max-w-3xl">
                <header class="text-center">
                    <h1 class="text-xl font-bold text-gray-900 sm:text-3xl">Your Cart</h1>
                </header>
                @if ($c_pending->isEmpty())
                    <div class="mt-4 w-full flex justify-center">
                        <div class="w-1/5 text-center text-gray-500">No product found</div>
                    </div>
                @else
                    <div class="mt-8">
                        <ul class="space-y-4">
                            @foreach ($c_pending as $c)
                            
                                <li class="flex items-center gap-4">
                                    <img src="{{ asset('storage/' . $c->cartProduct->product_img) }}" alt=""
                                        class="size-20 rounded object-cover" />

                                    <div>
                                        <h3 class="text-sm text-gray-900">{{ $c->cartProduct->product_name }}</h3>

                                        <dl class="mt-0.5 space-y-px text-[15px] text-gray-600">
                                            <div>
                                                <dt class="inline">Price:</dt>
                                                <dd class="inline"> RP{{ number_format($c->cartProduct->product_price, 0, ',', '.') }}
                                                    IDR</dd>
                                            </div>
                                            <div class="text-[13px]">
                                                <dt class="inline">Category:</dt>
                                                <dd class="inline">{{ $c->cartProduct->product_category }}</dd>
                                            </div>

                                            <div class="text-[13px]">
                                                <dt class="inline">Stock:</dt>
                                                <dd class="inline">{{ $c->cartProduct->product_quantity }}</dd>
                                            </div>
                                        </dl>
                                    </div>

                                    <div class="flex flex-1 items-center justify-end gap-2">

                                        <div class="relative flex items-center max-w-[7rem]">
                                            <form action="/update/cart-quantity" method="post">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name="type" value="decrement">
                                                <input type="hidden" name="v_cart"
                                                    value="{{ $c->cartProduct->product_quantity }}">
                                                <input type="hidden" name="v_quantity" value="{{ $c->quantity }}">
                                                <input type="hidden" name="cartid" value="{{ $c->id }}">
                                                <button type="submit" id="decrement-button{{ $c->id }}"
                                                    @if ($c->cartProduct->product_quantity <= 1 && $c->quantity == 1) disabled @endif
                                                    data-input-counter-decrement="quantity-input{{ $c->id }}"
                                                    class="bg-gray-100  hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-9 focus:ring-gray-100  focus:ring-2 focus:outline-none">
                                                    <svg class="w-2 h-2 text-gray-900 " aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 18 2">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                            <input type="text" min="1" max="12"
                                                id="quantity-input{{ $c->id }}" data-input-counter
                                                name="product_quantity" aria-describedby="helper-text-explanation"
                                                class="bg-gray-50 border-x-0 border-gray-300 h-9 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 "
                                                placeholder="999" value="{{ $c->quantity }}" required />
                                            <form action="/update/cart-quantity" method="post">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name="type" value="increment">
                                                <input type="hidden" name="v_cart"
                                                    value="{{ $c->cartProduct->product_quantity }}">
                                                <input type="hidden" name="v_quantity" value="{{ $c->quantity }}">
                                                <input type="hidden" name="cartid" value="{{ $c->id }}">
                                                <button type="submit" id="increment-button{{ $c->id }}"
                                                    @if ($c->quantity >= $c->cartProduct->product_quantity) disabled @endif
                                                    data-input-counter-increment="quantity-input{{ $c->id }}"
                                                    class="bg-gray-100  hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-9 focus:ring-gray-100  focus:ring-2 focus:outline-none">
                                                    <svg class="w-2 h-2 text-gray-900 " aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 18 18">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>

                                        <form action="/update/cart-remove" method="post">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" name="cartid" value="{{ $c->id }}">
                                            <button type="submit" class="text-gray-600 transition hover:text-red-600">
                                                <span class="sr-only">Remove item</span>

                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <div class="mt-8 flex justify-end border-t border-gray-100 pt-8">
                            <div class="w-screen max-w-lg space-y-4">
                                <dl class="space-y-0.5 text-sm text-gray-700">
                                    <div class="flex justify-between">
                                        <dt>Quantity Total :</dt>
                                        <dd>{{$totalQuantity}}</dd>
                                    </div>

                                    <div class="flex justify-between">
                                        <dt>Product Types</dt>
                                        <dd>{{$totalTypes}}</dd>
                                    </div>
                                    <div class="flex justify-between !text-base font-medium">
                                        <dt>Total Price</dt>
                                        <dd>RP{{ number_format($totalPrice, 0, ',', '.') }}
                                            IDR</dd>
                                    </div>
                                </dl> 

                                {{-- <div class="flex justify-end">
                                    <span
                                        class="inline-flex items-center justify-center rounded-full bg-indigo-100 px-2.5 py-0.5 text-indigo-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="-ms-1 me-1.5 h-4 w-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                                        </svg>

                                        <p class="whitespace-nowrap text-xs">2 Discounts Applied</p>
                                    </span>
                                </div>--}}

                                <div class="flex justify-end">
                                    <a href="#"
                                        class="block rounded bg-gray-700 px-5 py-3 text-sm text-gray-100 transition hover:bg-gray-600">
                                        Checkout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
