<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;

    protected $fillable = ['campaign_id', 'amount', 'recorded_at', 'utm_term'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
