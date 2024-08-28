<?php

namespace App\Livewire;

use App\Models\Product;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;

class ProductDetailPage extends Component
{
    public $product;
    public function mount($slug)
    {
        // Fetch the product based on the ID
        $this->product = Product::where('slug', $slug)->first();

        // Optionally handle the case where the product is not found
        if (!$this->product) {
            abort(404, 'Product not found');
        }
    }

    public function render()
    {
        return view('livewire.product-detail-page', ['product' => $this->product]);
    }
}
