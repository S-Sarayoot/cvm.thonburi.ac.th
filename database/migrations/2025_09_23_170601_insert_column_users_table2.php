<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration  
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('reset_password_token', 255)->nullable()->index()->after('password');
            $table->timestamp('reset_password_sent_at')->nullable()->after('reset_password_token');
            $table->tinyInteger('is_admin')->default(0)->after('reset_password_sent_at');
            
            $table->string('username', 255)->nullable()->after('name');
            $table->date('date_of_birth')->nullable()->after('username');
            $table->string('phone', 255)->nullable()->after('date_of_birth');
            $table->string('address', 255)->nullable()->after('phone');
            $table->string('province', 255)->nullable()->after('address');
            $table->string('zipcode', 255)->nullable()->after('province');
            $table->string('department_name', 255)->nullable()->after('zipcode');
            $table->tinyInteger('is_approved')->default(0)->after('department_name');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'reset_password_token',
                'reset_password_sent_at',
                'is_admin',
                
                'username',
                'date_of_birth',
                'phone',
                'address',
                'province',
                'zipcode',
                'department_name',
                'is_approved'
            ]);
        });
    }
};
