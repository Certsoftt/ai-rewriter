<?php
namespace AIRewriter\Models;

use Illuminate\Database\Eloquent\Model;

class AIProvider extends Model
{
    protected $table = 'ai_providers';
    protected $fillable = [
        'name', 'api_key', 'active', 'settings', 'created_at', 'updated_at',
    ];
}
