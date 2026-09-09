<?php
// Bootstrap Laravel
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

// 1. Check current columns
echo "=== CURRENT invoice_items COLUMNS ===\n";
$columns = Schema::getColumnListing('invoice_items');
foreach ($columns as $col) {
    echo "  - $col\n";
}

// 2. Add order_date if not exists
if (!Schema::hasColumn('invoice_items', 'order_date')) {
    echo "\n==> Adding order_date column...\n";
    Schema::table('invoice_items', function ($table) {
        $table->date('order_date')->nullable()->after('invoice_id');
    });
    echo "==> order_date added successfully!\n";
} else {
    echo "\n==> order_date column already EXISTS. OK!\n";
}

// 3. Verify
echo "\n=== FINAL invoice_items COLUMNS ===\n";
$columns = Schema::getColumnListing('invoice_items');
foreach ($columns as $col) {
    echo "  - $col\n";
}

// 4. Also mark migration as run in migrations table if not already
$migrationName = '2026_09_07_000001_add_order_date_to_invoice_items_table';
$exists = DB::table('migrations')->where('migration', $migrationName)->exists();
if (!$exists) {
    $batch = DB::table('migrations')->max('batch') + 1;
    DB::table('migrations')->insert([
        'migration' => $migrationName,
        'batch' => $batch,
    ]);
    echo "\n==> Migration recorded in migrations table.\n";
} else {
    echo "\n==> Migration already recorded in migrations table.\n";
}
