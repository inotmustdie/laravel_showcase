<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Resources\ExpenseResource;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {
        $query = Expense::query()->latest();

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        if ($request->has('month')) {
            $query->whereMonth('date', $request->month);
        }

        $expenses = $query->paginate(15);

        return ExpenseResource::collection($expenses);
    }

    public function store(StoreExpenseRequest $request)
    {
        $expense = Expense::create($request->validated());
        return new ExpenseResource($expense);
    }

    public function stats(Request $request)
    {
        $stats = Expense::query()
            ->selectRaw('category, SUM(amount) as total, COUNT(*) as count')
            ->groupBy('category')
            ->get()
            ->map(function($item) {
                return [
                    'category' => $item->category,
                    'category_name' => Expense::CATEGORIES[$item->category] ?? 'Другое',
                    'total' => (float) $item->total,
                    'count' => $item->count
                ];
            });

        return response()->json([
            'data' => $stats,
            'total' => (float) $stats->sum('total')
        ]);
    }

    public function webIndex()
    {
        return view('expenses.index');
    }
}
