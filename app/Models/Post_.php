<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Drylius",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero soluta similique aut eos eligendi et ex at magnam expedita maxime labore vitae, accusantium quibusdam nulla! Dolores, eius blanditiis! Iusto dolorum eos quasi ad sequi labore, distinctio debitis quisquam obcaecati amet ex eveniet minus consequuntur accusamus corporis voluptatibus reprehenderit. In, ratione!"
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Di",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero soluta similique aut eos eligendi et ex at magnam expedita maxime labore vitae, accusantium quibusdam nulla! Dolores, eius blanditiis! Iusto dolorum eos quasi ad sequi labore, distinctio debitis quisquam obcaecati amet ex eveniet minus consequuntur accusamus corporis voluptatibus reprehenderit. In, ratione!"
        ]
    ];

    public static function all(){
        return collect(self::$blog_posts);
    }

    public static function find($slug){
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
