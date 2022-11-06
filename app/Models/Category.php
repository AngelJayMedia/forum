<?php

namespace App\Models;

use App\Traits\HasTimestamps;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use HasTimestamps;

    protected $fillable = ['name', 'slug'];


    public function threads(): HasMany
    {
        return $this->hasMany(Thread::class);
    }

    public function id(): string {
        return $this->id;
    }
    
    public function name(): string {
        return $this->name;
    }

    public function slug(): string {
        return $this->slug;
    }

    
}
