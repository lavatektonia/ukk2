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

        DB::unprepared('DROP TRIGGER IF EXISTS trg_update_pkl_report_status');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_revert_pkl_report_status');
        
            DB::unprepared("
            CREATE TRIGGER trg_update_pkl_report_status
            AFTER INSERT ON pkls
            FOR EACH ROW
            BEGIN
                UPDATE students SET pkl_report_status = TRUE WHERE id = NEW.student_id;
            END;
        ");

        DB::unprepared("
            CREATE TRIGGER trg_revert_pkl_report_status
            AFTER DELETE ON pkls
            FOR EACH ROW
            BEGIN
                UPDATE students SET pkl_report_status = FALSE WHERE id = OLD.student_id;
            END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
