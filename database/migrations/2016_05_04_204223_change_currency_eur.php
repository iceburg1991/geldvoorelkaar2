<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCurrencyEur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('currency')) {
            Schema::table('currency', function (Blueprint $table) {
                $euro = array(
                    'decimal_point' => ',',
                    'thousand_point' => '.',
                );
                DB::table('currency')->where('id', 2)->update($euro);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('currency')) {
            Schema::table('currency', function (Blueprint $table) {
                $euro=array(
                    'decimal_point' => '.',
                    'thousand_point' => ',',
                );
                DB::table('currency')->where('id', 2)->update($euro);
        });
        }
    }
}
