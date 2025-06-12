<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use app\Models\Tag;

class Podcaster extends Model
{
    protected $fillable = [
        'user_id',
        'bio',
        'nationality',
        'id_type',
        'id_number',
        'avatar',
        'instagram',
        'facebook',
        'twitter',
        'discord',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'podcaster_tags');
    }

    public function podcasters()
{
    return $this->belongsToMany(Podcaster::class, 'podcaster_tag');
}

}
