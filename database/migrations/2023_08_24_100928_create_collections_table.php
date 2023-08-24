<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Task require to use sql but not php methods
        DB::statement('CREATE TABLE Collections (
    id            BIGINT        NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title         VARCHAR(255)  not null,
    description   TEXT,
    target_amount decimal(8, 2) NOT NULL,
    link          TEXT          NOT NULL,
    created_at    DATETIME      NOT NULL DEFAULT NOW()
        )');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collections');
    }
};
