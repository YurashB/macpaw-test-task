<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Task require to use sql but not php methods
        DB::statement('CREATE TABLE Contributors (
    id            BIGINT        NOT NULL AUTO_INCREMENT PRIMARY KEY,
    collection_id BIGINT        NOT NULL,
    user_name     VARCHAR(255)  NOT NULL,
    amount        DECIMAL(8, 2) NOT NULL,
    CONSTRAINT fk_collection FOREIGN KEY (collection_id)
        REFERENCES Collections (id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
        )');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contributors');
    }
};
