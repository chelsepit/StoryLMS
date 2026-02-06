<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = ['video_path', 'audio_path'];

    public function getVideoUrlAttribute()
    {
        if (!$this->video_path) {
            return null;
        }
        
        return config('supabase.storage.public_base_url') . $this->video_path;
    }

    public function getAudioUrlAttribute()
    {
        if (!$this->audio_path) {
            return null;
        }
        
        return config('supabase.storage.public_base_url') . $this->audio_path;
    }
}