<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('portfolio_projects', function (Blueprint $table) {
            $table->string('industry')->nullable();
            $table->json('services')->nullable();
            $table->json('tags')->nullable();
            $table->text('description')->nullable();
            $table->text('challenges')->nullable();
            $table->text('solutions')->nullable();
            $table->text('impact')->nullable();
            $table->string('image_color')->default('from-theme-blue to-theme-gold');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portfolio_projects', function (Blueprint $table) {
            $table->dropColumn([
                'industry',
                'services',
                'tags',
                'description',
                'challenges',
                'solutions',
                'impact',
                'image_color'
            ]);
        });
    }
};
