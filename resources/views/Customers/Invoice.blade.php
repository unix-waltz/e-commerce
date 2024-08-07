@extends('Customers.layout')
@section('c')

    <div class="container mx-auto overflow-x-auto rounded-lg border border-gray-200">
        @if ($cart->isEmpty())
            <div class="mt-4 w-full flex justify-center">
                <div class="w-1/5 text-center text-gray-500">No product found</div>
            </div>
        @else
            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                <thead class="ltr:text-left rtl:text-right">
                    <tr>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Product</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Satatus</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Quantity</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Category</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">1/Price</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($cart->reverse() as $c)
                        <tr>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                {{ $c->cartProduct->product_name }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $c->status }}</td>

                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $c->quantity }}</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $c->cartProduct->product_category }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                RP{{ number_format($c->cartProduct->product_price, 0, ',', '.') }} IDR
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>
    <br><br>
@endsection
