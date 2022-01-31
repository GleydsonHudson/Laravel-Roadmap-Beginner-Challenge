<?php

namespace App\Models;


use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Tags\HasTags;

class Post extends Model implements HasMedia {

    use HasFactory;
    use SoftDeletes;
    use HasTags;
    use InteractsWithMedia;
    use Filterable;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 10;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published_at',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'read_time',
    ];

    /**
     * The attributes that should be casted.
     *
     * @var array
     */
    protected $casts = [
        'meta' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function views(): HasMany
    {
        return $this->hasMany(View::class);
    }

    public function visits(): HasMany
    {
        return $this->hasMany(Visit::class);
    }

    /**
     * Get the human-friendly estimated reading time of a given text.
     *
     * @return string
     */
    public function getReadTimeAttribute(): string
    {
        $totalWords = str_word_count(strip_tags($this->body));

        $minutesToRead = (int)max(1, round($totalWords / 200));

        return vsprintf("%d %s %s", [
            $minutesToRead,
            Str::plural('min', $minutesToRead),
            'read'
        ]);
    }

    /**
     * Check to see if the post is published.
     *
     * @return bool
     */
    public function getPublishedAttribute(): bool
    {
        return !is_null($this->published_at) && $this->published_at <= now();
    }

    /**
     * Scope a query to only include published posts.
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published_at', '<=', now());
    }

    /**
     * Scope a query to only include drafted posts.
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeDraft(Builder $query): Builder
    {
        return $query->where('published_at', '=', null)->orWhere('published_at', '>', now());
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function (self $post) {
            $post->tags()->detach();
        });
    }


}
