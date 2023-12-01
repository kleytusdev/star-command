<?php

namespace App\Livewire\Dashboard;

use App\Models\Sale;
use App\Models\User;
use Livewire\Component;
use App\Models\EntryGuide;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public function render()
    {
        return view('livewire.dashboard.index', [
            'totalSumSales' => $this->totalSumSales(),
            'totalProductEntry' => $this->totalProductEntry(),
            'subuserWithMoreSales' => $this->getSubuserWithMoreSales(),
        ]);
    }

    public function totalSumSales()
    {
        return Sale::all()->sum('total');
    }

    public function totalProductEntry()
    {
        return EntryGuide::all()->sum('quantity');
    }

    public function getSubuserWithMoreSales()
    {
        $result = Sale::where('created_by', Auth::id())
            ->with('users.person') // Relación cargada antes de sumar
            ->get(); // Cambiado de first() a get()

        // Suma total después de la consulta
        $totalSales = $result->sum('total');

        if ($result->isNotEmpty()) {
            $userWithMostSales = $result->first()->users->first();

            return (object) [
                'name' => ucwords(strtolower($userWithMostSales->person->full_name)),
                'totalSales' => $totalSales,
            ];
        } else {
            return null; // No hay ventas registradas
        }
    }
}
