<?php

namespace App\Livewire\ExitGuide;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\ExitGuide;

class Table extends Component
{
    public function render()
    {
        return view('livewire.exit-guide.table', ['guides' => $this->guides()]);
    }

    public function guides()
    {
        return ExitGuide::with(['product', 'user.person'])
            ->get()
            ->map(function ($guide) {
                return (object)[
                    'id' => $guide->id,
                    'productName' => $guide->product->name,
                    'productPhotoUri' => $guide->product->photo_uri,
                    'status' => $guide->status,
                    'prevStock' => $guide->prev_stock,
                    'currentStock' => $guide->current_stock,
                    'quantity' => $guide->quantity,
                    'total' => 'S/ ' . $guide->total,
                    'createdBy' => ucwords(strtolower($guide->user->person->full_name)),
                    'date' => Carbon::parse($guide->order_at)->format('d-m-Y H:i a'),
                ];
            });
    }
}
