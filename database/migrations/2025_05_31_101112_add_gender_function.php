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
            CREATE FUNCTION getGenderDescription (kode CHAR(1))
            RETURNS VARCHAR(20)
            DETERMINISTIC
            BEGIN
                DECLARE keterangan VARCHAR(20);

                IF kode = "M" THEN
                    SET keterangan = "Male";
                ELSEIF kode = "F" THEN
                    SET keterangan = "Female";
                ELSE
                    SET keterangan = "Unknown";
                END IF;

                RETURN keterangan;
            END
        ');
    }

    public function down(): void
    {
        DB::unprepared('DROP FUNCTION IF EXISTS getGenderDexcription;');
    }
};
