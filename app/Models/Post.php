<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model {
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'image',
        'title',
        'slug',
        'body',
        'published_at',
        'featured',
        'user_id',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Scope a query to only include published posts.
     *
     * @param Builder $query
     * @return void
     */
    #[Scope]
    protected function published($query): void {
        $query->where('published_at', '<=', Carbon::now());
    }

    /**
     * Scope a query to only include featured posts.
     *
     * @param Builder $query
     * @return void
     */
    #[Scope]
    protected function featured($query): void {
        $query->where('featured', true);
    }

    /**
     * Scope a query to include posts from a specific category.
     *
     * @param Builder $query
     * @param string $category
     * @return void
     */
    #[Scope]
    protected function withCategory($query, $category): void {
        $query->whereHas('categories', function ($query) use ($category) {
            $query->where('slug', $category);
        });
    }

    /**
     * Get the excerpt of the post body.
     *
     * @param int $length
     * @return string
     */
    public function getExcerpt($length = 200): String {
        return Str::limit(strip_tags($this->body), $length, '...');
    }

    /**
     * Get the reading time of the post.
     *
     * @return string
     */
    public function readingTime(): String {
        $wordCount = str_word_count(strip_tags($this->body));
        $readingTime = ceil($wordCount / 250); // Assuming average reading speed of 250 words per minute
        return $readingTime . ' min read';
    }


    /**
     * Get the URL of the post's image.
     * 
     * This method returns the full URL of the image, checking if it starts with 'http'.
     *
     * @return Attribute
     */
    protected function imageUrl(): Attribute {

        return Attribute::make(
            get: fn() => (str_starts_with($this->image, 'http')) ? $this->image : Storage::disk('public')->url($this->image)
        );
    }

    /* protected function publishedAt(): Attribute {
        return Attribute::make(
            get: fn($value) => $value ? Carbon::parse($value)->format('d-m-Y') : null
        );
    } */
}
