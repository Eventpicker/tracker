<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackerSqlQueriesTable extends Migration
{
    /**
     * Table related to this migration.
     *
     * @var string
     */
    private $table = 'tracker_sql_queries';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('sha1', 40)->index();
            $table->text('statement');
            $table->double('time')->index();
            $table->integer('connection_id')->unsigned();

            $table->timestamps();
            $table->index('created_at');
            $table->index('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
