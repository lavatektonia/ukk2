<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::unprepared('
            CREATE FUNCTION getClassGroupDescription (kode CHAR(5))
            RETURNS VARCHAR(10)
            DETERMINISTIC
            BEGIN
                DECLARE keterangan VARCHAR(10);

                IF kode = "SijaA" THEN
                    SET keterangan = "SIJA A";
                ELSEIF kode = "SijaB" THEN
                    SET keterangan = "SIJA B";
                ELSE
                    SET keterangan = "Unknown";
                END IF;

                RETURN keterangan;
            END
        ');
    }

    public function down(): void
    {
        DB::unprepared('DROP FUNCTION IF EXISTS getClassGroupDexcription;');
    }
};

