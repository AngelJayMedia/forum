<?php

namespace App\Models;

use App\Traits\HasTags;
use App\Traits\HasLikes;
use App\Models\ReplyAble;
use App\Traits\HasAuthor;
use App\Traits\HasReplies;
use Illuminate\Support\Str;
use Laravel\Jetstream\HasTeams;
use App\Models\SubscriptionAble;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasSubscriptions;

class Thread extends Model implements ReplyAble, SubscriptionAble
{
    use HasTags;
    use HasLikes;
    use HasAuthor;
    use HasFactory; 
    use HasReplies;
    use HasSubscriptions;

    const TABLE = 'threads';

    protected $table = self::TABLE;

    protected $fillable = [
        'title',
        'body',
        'slug',
        'category_id',
        'author_id', 
    ];

    protected $with = [
        'category',
        'tagsRelation',
        'likesRelation',
        'authorRelation',
    ];

    public function category():  BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function excerpt(int $limit = 250): string {
        return Str::limit(strip_tags($this->body), $limit);
    }

    public function replyAbleSubject(): string
    {
        return $this->title();
    }
    

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string {
        return $this->name;
    }

    public function title(): string {
        return $this->title;
    }

    public function slug(): string {
        return $this->slug;
    }

    public function body(): string {
        return $this->body;
    }

    public function aut(): string {
        return $this->body;
    }

    public function delete() {
        $this->removeTags();
        parent::delete();
    }

    public function scopeForTag(Builder $query, string $tag): Builder{
        return $query->whereHas('tagsRelation', function ($query) use ($tag) {
            $query->where('tags.slug', $tag);
        });
    }

}
