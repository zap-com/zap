<?php

use App\Models\AnnouncementStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcement_statuses', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['pending','accepted','rejected','sold']);
            $table->timestamps();
        });

        $statuses = ['pending', 'accepted', 'sold', 'rejected'];
        foreach($statuses as $status){
            $s = new AnnouncementStatus();
            $s->status = $status;
            $s->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcement_statuses');
    }
}
