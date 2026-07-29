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
        Schema::create('contact_leads', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("company")->nullable();
            $table->string("email");
            $table->string("phone")->nullable();
            $table->string("service")->nullable();
            $table->string("budget")->nullable();
            $table->string("timeline")->nullable();
            $table->text("message");
            $table->string("status")->default("New");
            $table->string("ip_address")->nullable();
            $table->string("browser")->nullable();
            $table->string("device")->nullable();
            $table->text("admin_notes")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_leads');
    }
};
