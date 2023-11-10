<?php

namespace App\Livewire\EntryGuide;

use App\Models\EntryGuide;
use App\Models\Guide;
use Carbon\Carbon;
use Livewire\Component;

class TableEntryGuides extends Component
{
    public function render()
    {
        return view('livewire.entry-guide.table-entry-guides', ['guides' => $this->guides()]);
    }

    public function guides()
    {
        return Guide::with(['entryGuides'])
            ->get()
            ->map(function ($guide) {
                return (object)[
                    'id' => $guide->id,
                    'productsPhotoUri' => $this->getProductsPhotoUri($guide->id)->all(),
                    'observation' => $guide->observation,
                    'quantity' => $guide->entryGuides->sum('quantity'),
                    'unitPrice' => $guide->entryGuides->sum('unit_price'),
                    'total' => $guide->entryGuides->sum('total'),
                    'date' => Carbon::parse($guide->order_at)->format('d-m-Y H:i a'),
                ];
            });
    }

    public function getProductsPhotoUri(int $guideId)
    {
        return EntryGuide::where('guide_id', $guideId)->with('products')
            ->get()
            ->map(function ($entryGuide) {
                return (object) [
                    'status' => $entryGuide->status,
                    'uri' => $entryGuide->products?->photo_uri
                ];
            });
    }
}
