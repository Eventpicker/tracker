<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTrackerLanguageForeignKeyToSessions extends Migration
{

    /**
     * Table related to this migration.
     *
     * @var string
     */
    private $table = 'tracker_sessions';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->foreign('language_id')
            ->references('id')
            ->on('tracker_languages')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table($this->table, function (Blueprint $table) {
            $table->dropForeign(['language_id']);
        });
    }
}
