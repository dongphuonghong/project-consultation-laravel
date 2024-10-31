    <?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cau_hois', function (Blueprint $table) {
            $table->id();
            $table-> bigInteger('linh_vuc')->unsigned;
                        $table->foreign('linh_vuc_id')->references('id')->on('linh_vucs')->onDelete('cascade');
            $table->text('noi_dung');
            $table->text('phuong_an_a');
            $table->text('phuong_an_b');
            $table->text('phuong_an_c');
            $table->text('phuong_an_d');
            $table->text('dap_an');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cau_hois');
    }
};
