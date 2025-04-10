<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrackerLogOptimizations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $manager = app()->make('db');
        $connection = $manager->connection(config('tracker.connection'));

        // Convert to enum
        $connection->statement("ALTER TABLE tracker_log MODIFY COLUMN method ENUM('GET', 'POST', 'HEAD', 'PUT', 'DELETE', 'UNKNOWN') default 'UNKNOWN'");

        Schema::table('tracker_log', function (Blueprint $table) {
            $table->dropIndex('tracker_log_updated_at_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
