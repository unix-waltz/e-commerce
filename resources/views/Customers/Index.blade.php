@extends('Customers.layout')
@section('c')

    <section>
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
            <header>
                <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">Product Collection</h2>

                <p class="mt-4 max-w-md text-gray-500">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque praesentium cumque iure
                    dicta incidunt est ipsam, officia dolor fugit natus?
                </p>
            </header>

            <div class="mt-8 sm:flex sm:items-center sm:justify-between">
                <div class="block sm:hidden">
                    <button
                        class="flex cursor-pointer items-center gap-2 border-b border-gray-400 pb-1 text-gray-900 transition hover:border-gray-600">
                        <span class="text-sm font-medium"> Filters & Sorting </span>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4 rtl:rotate-180">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>
                </div>

                <div class="hidden sm:flex sm:gap-4">
                   

                    <div class="relative">
                        <details class="group [&_summary::-webkit-details-marker]:hidden">
                            <summary
                                class="flex cursor-pointer items-center gap-2 border-b border-gray-400 pb-1 text-gray-900 transition hover:border-gray-600">
                                <span class="text-sm font-medium"> Price </span>

                                <span class="transition group-open:-rotate-180">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </span>
                            </summary>

                            <div
                                class="z-50 group-open:absolute group-open:top-auto group-open:mt-2 ltr:group-open:start-0">
                                <form action="" class="w-96 rounded border border-gray-200 bg-white">
                                    <header class="flex items-center justify-between p-4">
                                        <span class="text-sm text-gray-700"> The highest price is
                                            RP.{{ number_format(100000000, 0, ',', '.') }}</span>

                                        <a href="/" class="text-sm text-gray-900 underline underline-offset-4">
                                            Reset
                                        </a>
                                    </header>

                                    <div class="border-t border-gray-200 p-4">
                                        <div class="flex justify-between gap-4">
                                            <label for="FilterPriceFrom" class="flex items-center gap-2">
                                                <span class="text-sm text-gray-600">RP.</span>

                                                <input type="number" name="from" id="FilterPriceFrom" placeholder="From"
                                                    class="w-full rounded-md border-gray-200 shadow-sm sm:text-sm" />
                                            </label>

                                            <label for="FilterPriceTo" class="flex items-center gap-2">
                                                <span class="text-sm text-gray-600">RP.</span>

                                                <input type="number" name="to" id="FilterPriceTo" placeholder="To"
                                                    class="w-full rounded-md border-gray-200 shadow-sm sm:text-sm" />
                                            </label>
                                        </div>
                                        <button type="submit" class="mt-3 text-sm text-gray-900 underline underline-offset-4">
                                        submit
                                    </button>
                                    </div>
                                  
                                </form>
                            </div>
                        </details>
                    </div>
                </div>

                <div class="hidden sm:block">
                    <label for="SortBy" class="sr-only">SortBy</label>

                    <select id="SortBy" class="h-10 rounded border-gray-300 text-sm">
                        <option>&nbsp;&nbsp;Sort By</option>
                        <option value="desc">&nbsp;&nbsp;DESC</option>
                        <option value="asc">&nbsp;&nbsp;ASC</option>
                        <option value="pricedesc">&nbsp;&nbsp;Price, DESC</option>
                        <option value="priceasc">&nbsp;&nbsp;Price, ASC</option>
                    </select>

                </div>
            </div>
            @if ($products->isEmpty())
                <div class="mt-4 w-full flex justify-center">
                    <div class="w-1/5 text-center text-gray-500">No product found</div>
                </div>
            @else
                <ul class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($products as $p)
                        <li>
                            <a href="/product/detail/{{$p->slug}}" class="group block overflow-hidden">
                                <img src="{{ asset('storage/' . $p->product_img) }}" alt=""
                                    class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[450px]" />

                                <div class="relative bg-white pt-3">
                                    <h3 class="text-xs text-gray-700 group-hover:underline group-hover:underline-offset-4">
                                        {{ $p->product_name }}
                                    </h3>

                                    <p class="mt-2">
                                        <span class="sr-only"> Regular Price </span>

                                        <span
                                            class="tracking-wider text-gray-900">RP.{{ number_format($p->product_price, 0, ',', '.') }}
                                            IDR</span>
                                    </p>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
                {{ $products->links() }}
            @endif
        </div>
    </section>
    <script>
        document.getElementById('SortBy').addEventListener('change', function() {
            var value = this.value;
            if (value) {
                window.location.href = '?sortby=' + value;
            }
        });
    </script>

@endsection
