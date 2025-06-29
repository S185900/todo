<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
        protected $fillable = ['content', 'category_id'];
        // 作成したテーブルのカラム名「content」を操作可能にしているよ（Todoの内容を格納するため
        // 外部キーのcategory_idも編集可能にするよ

        public function category()
        {
            return $this->belongsTo(Category::class);
            // belongsToメソッドを使って、TodoモデルがCategoryモデルに関連付けられていることを示しているよ
            // todosテーブルに紐づくcategoryを取り出すために、モデルでbelongsTo結合を使用しております。
        }
}



