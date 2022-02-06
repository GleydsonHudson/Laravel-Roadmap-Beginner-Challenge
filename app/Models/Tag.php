<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\Tags\HasTags;

class Tag extends Model
{
    use HasFactory;
    use HasTags;

    protected $guarded =[];

    public static function getTagClassName(): string
    {
        return Tag::class;
    }

    public function tags(): MorphToMany
    {
        return $this
            ->morphToMany(self::getTagClassName(), 'taggable', 'taggables', null, 'tag_id')
            ->orderBy('order_column');
    }

    public function scopeWithTagSlug($query, string $slug, string $type = null)
    {
        $locale = $locale ?? app()->getLocale();

        $tag = \Spatie\Tags\Tag::where("slug->{$locale}", $slug)
            ->where('type', $type)
            ->first();

        $query->whereHas('tags', function ($query) use ($tag) {
            $query->where('tags.id', $tag ? $tag->id : 0);
        });

        return $query;
    }

}
