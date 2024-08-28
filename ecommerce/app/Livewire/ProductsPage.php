<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsPage extends Component
{
    use WithPagination;
    #[Url]
    public $selected_categories = [];
    public $selected_brand = [];
    public $featured;
    public $on_sale;
    #[Url]
    public $price_range = 100000000;

    public function render()
    {
        $products = Product::query()->where('is_active', 1);

        if (!empty($this->selected_categories)) {
            $products->whereIn('category_id', $this->selected_categories);
        }
        if (!empty($this->selected_brand)) {
            $products->whereIn('brand_id', $this->selected_brand);
        }
        if ($this->featured) {
            $products->where('is_featured', 1);
        }
        if ($this->on_sale) {
            $products->where('on_sale', 1);
        }
        if ($this->price_range >= 1000) {
            $products->whereBetween('price', [0, $this->price_range]);
        }

        $categories = Category::where('is_active', 1)->get(['id', 'name', 'slug']);
        $brands = Brand::where('is_active', 1)->get(['id', 'name', 'slug']);

        return view('livewire.products-page', [
            'brands' => $brands,
            'categories' => $categories,
            'products' => $products->paginate(9),
        ]);
    }
}
