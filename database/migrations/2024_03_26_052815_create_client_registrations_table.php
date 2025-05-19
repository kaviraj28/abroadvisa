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
        Schema::create('client_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('cname')->nullable();
            $table->string('slug')->nullable();
            $table->string('caddress')->nullable();
            $table->string('cnumber')->nullable();
            $table->string('cfax')->nullable();
            $table->string('cmail')->nullable();
            $table->string('curl')->nullable();
            $table->string('cregistration')->nullable();
            $table->string('cpan')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('designation')->nullable();
            $table->boolean('status')->default(0);
            $table->longText('agreement')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_registrations');
    }
};