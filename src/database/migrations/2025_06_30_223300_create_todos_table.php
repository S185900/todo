<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            // foreignId:該当のカラムを外部キーに指定する制約制約（簡単な外部キー制約を作成する場合）
            // constrained：対応する参照テーブル（通常はcategories）を自動的に推測します。
            // cascadeOnDelete：関連するcategoryエントリが削除されたときに、
            // この外部キーを持つエントリを自動的に削除するように指示します。
            // つまり、関連するデータが一貫性を保つようになります。
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('content', 20);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}
