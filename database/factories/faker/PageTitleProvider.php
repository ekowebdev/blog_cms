<?php

namespace Database\Factories\Faker;

use Faker\Provider\Base;

class PageTitleProvider extends Base
{
    protected static $pageTitles = [
        'About This Blog',
        'Write for Us',
        'Editorial Guidelines',
        'Meet the Authors',
        'Blog Archives',
        'Start a Blog',
        'Advertise With Us',
        'Blog Categories',
        'Reader Testimonials',
        'Behind the Blog',
    ];

    protected static $currentIndex = 0;

    public function pageTitle()
    {
        $title = static::$pageTitles[static::$currentIndex % count(static::$pageTitles)];
        static::$currentIndex++;

        return $title;
    }
}
