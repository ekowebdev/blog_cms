<?php

namespace Database\Factories\Faker;

use Faker\Provider\Base;

class PostTitleProvider extends Base
{
    protected static $titles = [
        'Top 10 Tips for Laravel',
        'How to Build with Tailwind CSS',
        'Why You Should Start Blogging in 2024',
        'The Ultimate Guide to Web Development',
        'Improve Your JavaScript Skills',
        'Beginner\'s Guide to Next.js',
        'Create Your First Livewire Component',
        'Boost Productivity with PHP',
        'Master GitHub Collaboration',
        'Deploy Secure REST APIs with Laravel',
        'Design Clean UI with Tailwind',
        'Understand Backend Systems',
        'Explore Headless CMS Concepts',
        'Debug Like a Pro in VSCode',
        'Testing Tools Every Developer Should Know',
        'Automate Workflow with GitHub Actions',
        'Write Clean Code in Laravel',
        'Build Responsive Layouts with Flexbox',
        'Simplify Routing in Next.js',
        'Secure Authentication in Modern Web Apps',
        'Grow Your Blog Audience with SEO',
        'Analyze Database Design Patterns',
        'Customize CMS for Your Clients',
        'Document Your Codebase Effectively',
        'Publish Your Open Source Project',
        'Scale Applications with Docker',
        'Organize Components in a Modular Way',
        'Optimize Performance in Livewire Apps',
        'Develop Elegant Forms with Alpine.js',
        'Structure Your Project Like a Pro',
    ];

    protected static $currentIndex = 0;

    public function postTitle(): string
    {
        $title = static::$titles[static::$currentIndex % count(static::$titles)];
        static::$currentIndex++;

        return $title;
    }
}
