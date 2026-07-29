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
        Schema::create('portfolio_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId("portfolio_category_id")->constrained()->cascadeOnDelete();
            $table->string("title");
            $table->string("slug")->unique();
            $table->string("client_name")->nullable();
            $table->string("url")->nullable();
            $table->string("status")->default("completed");
            $table->string("image")->nullable();
            $table->integer("order")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_projects');
    }
};
