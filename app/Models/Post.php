<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    // protected $fillable = [
    //     'title',
    //     'excerpt',
    //     'body'
    // ];
    use HasFactory;
    use Sluggable;

    protected $guarded =[
        'id'
    ];

     

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%'. $search .'%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category){
            return $query->whereHas('category', function($query) use ($category){
                $query->where('slug', $category);
            });
        });

        $query->when($filters['author'] ?? false, function($query, $author){
            return $query->whereHas('user', fn($query) => 
                $query->where('name', $author)
            );
        });
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName(): string{
        return 'slug';
    }
    public function sluggable(): array{
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}