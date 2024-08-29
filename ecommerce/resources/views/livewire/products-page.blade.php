<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <section class="py-10 rounded-lg bg-gray-50 font-poppins dark:bg-gray-800">
        <div class="px-4 py-4 mx-auto max-w-7xl lg:py-6 md:px-6">
            <div class="flex flex-wrap mb-24 -mx-3">
                <div class="w-full pr-2 lg:w-1/4 lg:block">
                    <div class="p-4 mb-5 bg-white border border-gray-200 dark:border-gray-900 dark:bg-gray-900">
                        <h2 class="text-2xl font-bold dark:text-gray-400">Categories</h2>
                        <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-gray-400"></div>
                        <ul>
                            @foreach ($categories as $category)
                                <li class="mb-4" wire:key="{{ $category->id }}">
                                    <label for="" class="flex items-center dark:text-gray-400">
                                        <input type="checkbox" class="w-4 h-4 mr-2"
                                            wire:model.live="selected_categories" id="{{ $category->slug }}"
                                            value="{{ $category->id }}">
                                        <span class="text-lg">{{ $category->name }}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="p-4 mb-5 bg-white border border-gray-200 dark:bg-gray-900 dark:border-gray-900">
                        <h2 class="text-2xl font-bold dark:text-gray-400">Brand</h2>
                        <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-gray-400"></div>
                        <ul>
                            @foreach ($brands as $brand)
                                <li class="mb-4" wire:key="{{ $brand->id }}">
                                    <label for="" class="flex items-center dark:text-gray-400">
                                        <input type="checkbox" class="w-4 h-4 mr-2" wire:model.live="selected_brand"
                                            id="{{ $brand->slug }}" value="{{ $brand->id }}">
                                        <span class="text-lg">{{ $brand->name }}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="p-4 mb-5 bg-white border border-gray-200 dark:bg-gray-900 dark:border-gray-900">
                        <h2 class="text-2xl font-bold dark:text-gray-400">Product Status</h2>
                        <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-gray-400"></div>
                        <ul>
                            <li class="mb-4">
                                <label for="" class="flex items-center dark:text-gray-300">
                                    <input type="checkbox" id="featured" wire:model.live='featured' value="1"
                                        class="w-4 h-4 mr-2">
                                    <span class="text-lg dark:text-gray-400">Featured Products</span>
                                </label>
                            </li>
                            <li class="mb-4">
                                <label for="" class="flex items-center dark:text-gray-300">
                                    <input type="checkbox" class="w-4 h-4 mr-2" id="on_sale" wire:model.live='on_sale'
                                        value="1">
                                    <span class="text-lg dark:text-gray-400">On Sale</span>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <div class="p-4 mb-5 bg-white border border-gray-200 dark:bg-gray-900 dark:border-gray-900">
                        <h2 class="text-2xl font-bold dark:text-gray-400">Price</h2>
                        <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-gray-400"></div>
                        <div>
                            <div class="font-semibold">{{ Number::currency($price_range, 'VND') }}
                            </div>
                            <input type="range" wire:model.live='price_range'
                                class="w-full h-1 mb-4 bg-blue-100 rounded appearance-none cursor-pointer"
                                min="100000" max="100000000" step="1">
                            <div class="flex justify-between ">
                                <span
                                    class="inline-block text-lg font-bold text-blue-400 ">{{ Number::currency(100000, 'VND') }}
                                </span>
                                <span
                                    class="inline-block text-lg font-bold text-blue-400 ">{{ Number::currency(100000000, 'VND') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full px-3 lg:w-3/4">
                    <div class="px-3 mb-4">
                        <div class="relative inline-block w-full text-gray-700">
                            <div class="flex items-center justify-between">
                                <select wire:model.live="sort" name="" id=""
                                    class="w-1/2 h-10 px-4 placeholder-gray-600 border rounded-lg appearance-none teyxt-base p-r-6 ppl-3 focus:shadow-outline"
                                    placeholder="Regular input">
                                    <option value="latest">Sort by latest</option>
                                    <option value="price_desc">Sort from The Most Expensive Price</option>
                                    <option value="price_asc">Sort from Lowest Price</option>
                                </select>
                                {{-- <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center">
                        @foreach ($products as $product)
                            <div class="w-full px-3 mb-6 sm:w-1/2 md:w-1/3" wire:key="{{ $product->id }}">
                                <div class="border border-gray-300 dark:border-gray-700">
                                    <div class="relative bg-gray-200">
                                        <a href="{{ route('products.show', ['slug' => $product->slug]) }}">
                                            @php
                                                // Assuming $product->images is a comma-separated string or array
                                                $images = is_array($product->images)
                                                    ? $product->images
                                                    : explode(',', $product->images);
                                            @endphp

                                            @if (count($images) > 0)
                                                <img src="{{ asset('storage/' . $images[0]) }}" alt="Product Image"
                                                    class="object-cover w-full h-56 mx-auto">
                                            @else
                                                <p>No images available.</p>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="p-3">
                                        <div class="flex items-center justify-between gap-2 mb-2">
                                            <h3 class="text-xl font-medium dark:text-gray-400">
                                                {{ $product->name }}
                                            </h3>
                                        </div>
                                        <p class="text-lg">
                                            <span
                                                class="text-green-600 dark:text-green-600">{{ Number::currency($product->price, 'VND') }}</span>
                                        </p>
                                    </div>
                                    <div class="flex justify-center p-4 border-t border-gray-300 dark:border-gray-700">
                                        <a href="#"
                                            class="flex items-center space-x-2 text-gray-500 dark:text-gray-400 hover:text-red-500 dark:hover:text-red-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="w-4 h-4 bi bi-cart3 " viewBox="0 0 16 16">
                                                <path
                                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                                                </path>
                                            </svg><span>Add to Cart</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- pagination start -->
                    <div class="flex justify-end mt-6">
                        {{ $products->links() }}
                    </div>
                    <!-- pagination end -->
                </div>
            </div>
        </div>
    </section>
</div>
