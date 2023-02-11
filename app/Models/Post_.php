<?php

namespace App\Models;


class Post
{
   private static $blog_posts = [
    [
        "title" => "Judul Post Pertama",
        "slug" => "judul-post-pertama",
        "author" => "Rafi sakhi",
        "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur veniam quos itaque esse? Quae, obcaecati cumque! Provident et commodi sed aut laborum blanditiis omnis ab voluptatem excepturi nulla! Sint omnis a, commodi tempore hic, aliquid tempora magni illum, similique iure minus aperiam consequatur ducimus minima asperiores porro perspiciatis corporis. Eligendi eaque facere unde hic voluptas earum quis labore ea cupiditate laudantium, maiores perferendis ducimus nulla, obcaecati cumque molestias eveniet fugit placeat sequi. Laboriosam nihil mollitia sequi debitis sint, ipsa sunt?z"
    ],
     [
        "title" => "Judul Post Kedua",
        "slug" => "judul-post-kedua",
        "author" => "Afif Amahar",
        "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga animi est doloremque a quasi eligendi labore cumque dolorem perspiciatis, assumenda, porro quas? Aperiam sapiente ex hic tempore. Libero nostrum corrupti perferendis asperiores rem, deserunt laudantium alias architecto harum eos fugiat soluta. Voluptatem, natus unde totam non esse repudiandae, fuga obcaecati eos commodi cumque officiis vel, id dolores sit asperiores debitis. Ad consequatur ratione error aut, accusantium numquam obcaecati perferendis hic harum, fuga magni alias mollitia ipsam autem nobis cumque. Ipsum, deleniti natus ducimus, aliquam dicta repudiandae possimus ipsa soluta neque quae minus id odit sit dolor praesentium perspiciatis! Totam, atque."
     ]
  ];

  public static function all()
  {
    return collect(self::$blog_posts);
  }

  public static function find($slug)
  {
    $posts = static::all();

     return $posts->firstWhere('slug', $slug);
  }
}


