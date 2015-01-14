<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKuesioner extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('kuesioners', function($table)
	    {
	        $table->bigIncrements('id');
	        $table->timestamps();
	        $table->softDeletes();
	        $table->string('user');
	        // Data Umum
	        $table->string('nama');
	        $table->boolean('go')->default(0);
	        $table->string('status1');
	        $table->smallInteger('tahun');
	        $table->string('status2');
	        $table->string('alamat')->nullable();
	        $table->string('kota')->nullable();
	        $table->string('telp')->nullable();
	        $table->string('fax')->nullable();
	        $table->string('hp')->nullable();
	        $table->string('web')->nullable();
	        $table->string('pj')->nullable();
	        $table->tinyInteger('manager')->nullable();
	        $table->smallInteger('karyawan')->nullable();
	        // Aspek Managerial
	        $table->tinyInteger('surat');
	        $table->smallInteger('tsurat')->nullable();
	        $table->boolean('npwp')->default(0);
	        $table->boolean('siup')->default(0);
	        $table->boolean('iui')->default(0);
	        $table->boolean('situ')->default(0);
	        $table->tinyInteger('sistem');
	        $table->tinyInteger('sertifikasi');
	        $table->tinyInteger('struktur');
	        $table->tinyInteger('mutu');
	        $table->tinyInteger('tugas');
	        $table->bigInteger('modala');
	        $table->bigInteger('modals');
	        $table->bigInteger('modall');
	        $table->tinyInteger('pmodal');
	        $table->tinyInteger('laba');
	        $table->tinyInteger('plaba');
	        $table->tinyInteger('bank');
	        // Aspek Keuangan
	        $table->bigInteger('kas');
	        $table->bigInteger('ar');
	        $table->bigInteger('inv');
	        $table->bigInteger('ca');
	        $table->bigInteger('std');
	        $table->bigInteger('ld');
	        $table->bigInteger('bd');
	        $table->bigInteger('me');
	        $table->bigInteger('vc');
	        $table->bigInteger('oa');
	        $table->bigInteger('ltd');
	        $table->bigInteger('sales');
	        $table->bigInteger('expense');
	        //Output
	        $table->float('liq')->nullable();
	        $table->float('sol')->nullable();
	        $table->float('prf')->nullable();
	        $table->string('kepakh')->nullable();
	        $table->tinyInteger('kepkeu')->nullable();
	        $table->tinyInteger('kepman')->nullable();
	        $table->string('saran')->nullable();
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('kuesioners');
	}

}
