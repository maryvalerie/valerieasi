<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('document_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('document_type_id')->constrained()->onDelete('cascade');
            $table->string('purpose');
            $table->text('additional_info')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected', 'for_payment', 'completed'])->default('pending');
            $table->string('reference_number')->unique();
            $table->date('request_date');
            $table->date('completion_date')->nullable();
            $table->text('admin_notes')->nullable();
            $table->string('document_file')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('document_requests');
    }
};