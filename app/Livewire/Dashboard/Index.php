<?php

namespace App\Livewire\Dashboard;

use App\Models\EntryGuide;
use App\Models\Sale;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class Index extends Component
{
    public function render()
    {
        $chart_options = [
            'chart_title' => 'Users by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        $chart = new LaravelChart($chart_options);

        return view('livewire.dashboard.index', [
            'chart' => $chart,
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
        $result = Sale::select('created_by', DB::raw('count(*) as total_sales'))
            ->groupBy('created_by')
            ->orderByDesc('total_sales')
            ->with('users.person')
            ->first();

        if ($result) {
            $userIdWithMostSales = $result->created_by;
            $totalSales = $result->total_sales;

            // Obtener el usuario con más ventas
            $userWithMostSales = User::with('person')
                ->find($userIdWithMostSales);

            return (object) [
                'name' => ucwords(strtolower($userWithMostSales->person->full_name)),
                'totalSales' => $totalSales,
            ];
        } else {
            return null; // No hay ventas registradas
        }
    }
}
