<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('permits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('permit_type');
            $table->string('business_name')->nullable();
            $table->string('business_address')->nullable();
            $table->text('purpose');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['pending', 'under_review', 'approved', 'rejected', 'expired'])->default('pending');
            $table->string('permit_number')->unique()->nullable();
            $table->decimal('fee', 8, 2)->default(0);
            $table->text('requirements_submitted');
            $table->text('review_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('permits');
    }
};