<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
        protected $fillable = ['content'];
        // 作成したテーブルのカラム名「content」を操作可能にしているよ（Todoの内容を格納するため）
}
