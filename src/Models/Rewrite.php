<?php
namespace AIRewriter\Models;

use Illuminate\Database\Eloquent\Model;

class Rewrite extends Model
{
    protected $table = 'rewrites';
    protected $fillable = [
        'draft_id', 'original_content', 'rewritten_content', 'provider', 'mode', 'originality', 'clarity', 'status', 'history', 'created_at', 'updated_at',
    ];
}
