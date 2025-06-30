<?php

namespace Database\Factories\Faker;

use Faker\Provider\Base;

class CategoryNameProvider extends Base
{
    protected static $categoryNames = [
        'Technology',
        'Travel',
        'Lifestyle',
        'Food',
        'Health',
        'Finance',
        'Education',
        'Entertainment',
        'Design',
        'Marketing',
        'Business',
        'Science',
        'Productivity',
        'Career',
        'Culture',
    ];

    protected static $currentIndex = 0;

    public function categoryName()
    {
        $name = static::$categoryNames[static::$currentIndex % count(static::$categoryNames)];
        static::$currentIndex++;

        return $name;
    }
}
