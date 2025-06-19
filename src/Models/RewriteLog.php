<?php
namespace AIRewriter\Models;

use Illuminate\Database\Eloquent\Model;

class RewriteLog extends Model
{
    protected $table = 'rewrite_logs';
    protected $fillable = [
        'rewrite_id', 'user_id', 'action', 'provider', 'mode', 'duration', 'originality', 'clarity', 'created_at',
    ];
}
