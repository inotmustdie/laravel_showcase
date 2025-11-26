<?php

namespace Database\Factories;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseFactory extends Factory
{
    protected $model = Expense::class;

    public function definition(): array
    {
        $categories = array_keys(Expense::CATEGORIES);
        $descriptions = [
            'food' => ['Lunch at cafe', 'Groceries', 'Restaurant dinner', 'Coffee shop', 'Food delivery'],
            'transport' => ['Taxi ride', 'Bus ticket', 'Fuel', 'Metro card', 'Car maintenance'],
            'entertainment' => ['Movie tickets', 'Concert', 'Netflix subscription', 'Books', 'Games'],
            'bills' => ['Electricity bill', 'Internet', 'Mobile phone', 'Rent', 'Utilities'],
            'health' => ['Pharmacy', 'Doctor visit', 'Gym membership', 'Vitamins', 'Health insurance'],
            'other' => ['Shopping', 'Gift', 'Repairs', 'Education', 'Miscellaneous']
        ];

        $category = $this->faker->randomElement($categories);
        $description = $this->faker->randomElement($descriptions[$category]);

        return [
            'description' => $description,
            'amount' => $this->faker->randomFloat(2, 50, 2000),
            'category' => $category,
            'date' => $this->faker->dateTimeBetween('-60 days', 'now'),
        ];
    }
}
