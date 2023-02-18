<?php

namespace App\Models;

class admin
{
    private static $blog_post = [
        [
            "username" => "Wahyudi89",
            "password" => "krisna00",
            "email" => "krisnawahyudi@gmain.com"
        ],
        [
            "username" => "agnes",
            "password" => "agnes58",
            "email" => "agnes@gmain.com"
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_post);
    }
}
