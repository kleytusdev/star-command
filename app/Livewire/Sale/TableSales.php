<?php

namespace App\Livewire\Sale;

use App\Models\Sale;
use App\Models\SaleDetail;
use Carbon\Carbon;
use Livewire\Component;

class TableSales extends Component
{
    public function render()
    {
        // dd($this->sales());
        return view('livewire.sale.table-sales', ['sales' => $this->sales()]);
    }

    public function sales()
    {
        return Sale::with(['saleDetails', 'client'])
            ->get()
            ->map(function ($sale) {
                return (object)[
                    'id' => $sale->id,
                    'productsUri' => $this->getProductsUri($sale->id),
                    'discount' => $sale->discount,
                    'igv' => $sale->igv,
                    'subtotal' => $sale->subtotal,
                    'total' => $sale->total,
                    'paymentMethod' => $sale->payment_method,
                    'client' => ucwords(strtolower($sale->client->clientable->full_name)),
                    'date' => Carbon::parse($sale->created_at)->format('d-m-Y'),
                ];
            });
    }

    public function getProductsUri(int $saleId)
    {
        return (object) SaleDetail::where('sale_id', $saleId)->with('products')
            ->get()
            ->map(function ($saleDetails) {
                return (object) [
                    'uri' => $saleDetails->products?->photo_uri
                ];
            });
    }
}
