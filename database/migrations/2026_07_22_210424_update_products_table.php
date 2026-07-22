<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'manufacturer')) {
                $table->string('manufacturer')->nullable()->after('category_id');
            }

            if (!Schema::hasColumn('products', 'machine_type')) {
                $table->string('machine_type')->nullable()->after('manufacturer');
            }

            if (!Schema::hasColumn('products', 'applications')) {
                $table->json('applications')->nullable()->after('description');
            }

            if (!Schema::hasColumn('products', 'available_models')) {
                $table->json('available_models')->nullable()->after('applications');
            }

            if (!Schema::hasColumn('products', 'specifications')) {
                $table->json('specifications')->nullable()->after('available_models');
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $columns = ['manufacturer', 'machine_type', 'applications', 'available_models', 'specifications'];

            foreach ($columns as $column) {
                if (Schema::hasColumn('products', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
