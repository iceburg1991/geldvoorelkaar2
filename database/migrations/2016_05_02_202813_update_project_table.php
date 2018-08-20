<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects','duration')) {
                $table->integer('duration')->default(0)->change();
                $table->renameColumn('duration','duration_months');
            }
            if (Schema::hasColumn('projects','start_investing')) {
                $table->renameColumn('start_investing','start_date');
            }
            $table->timestamp('expected_end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects','duration_months')) {
                $table->dateTime('duration_months')->change();
                $table->renameColumn('duration_months','duration');
            }
            if (Schema::hasColumn('projects','start_date')) {
                $table->renameColumn('start_date','start_investing');
            }
            if (Schema::hasColumn('projects','expected_end_date')) {
                $table->dropColumn('expected_end_date');
            }
        });
    }
}
