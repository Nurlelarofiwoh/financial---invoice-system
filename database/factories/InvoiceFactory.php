<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition(): array
    {
        return [
            'invoice_number' => 'INV-' . $this->faker->unique()->numberBetween(1000, 9999),
            'customer_name' => $this->faker->name(),
            'customer_email' => $this->faker->safeEmail(),
            'issue_date' => now()->format('Y-m-d'),
            'due_date' => now()->addDays(30)->format('Y-m-d'),
            'notes' => $this->faker->sentence(),
            'total_amount' => $this->faker->randomFloat(2, 100000, 5000000),
            'payment_status' => 'unpaid',
        ];
    }
}
