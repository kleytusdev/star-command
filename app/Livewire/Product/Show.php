<?php

namespace App\Livewire\Product;

use App\Models\Product;
use App\Models\SaleDetail;
use Livewire\Component;

class Show extends Component
{
    public $product;
    public $totalAmount;
    public $totalQuantity;

    public function mount($productId)
    {
        $this->product = Product::find($productId);
        $this->totalAmount = SaleDetail::where('product_id', $productId)->sum('total');
        $this->totalQuantity = SaleDetail::where('product_id', $productId)->sum('quantity');
    }

    public function render()
    {
        return view('livewire.product.show');
    }
}
