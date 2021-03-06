# Laravel Forum
A drop-in forum module for Laravel 5.

[![Build Status](https://travis-ci.org/taskforcedev/laravel-forum.svg?branch=master)](https://travis-ci.org/taskforcedev/laravel-forum) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/taskforcedev/laravel-forum/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/taskforcedev/laravel-forum/?branch=master)

## Requirements
 - Laravel 5.2+
 - jQuery is currently required for forum moderation features (lock/sticky).

## What this package provides
 - Fully Functional Forum (/forum)
 - Admin Interface (/admin/forums)

 - Database Tables
   - forums
   - forum_posts
   - forum_categories
   - forum_post_replies

## Installation

### Step 1: Add the following package to your composer.json require (if not already present).
    require {
      "taskforcedev/laravel-support": "1.0.*",
      "taskforcedev/laravel-forum": "dev-master"
    }

### Step 2: Run composer update.
    composer update

### Step 3: Add the following service provider(s) to config/app.php (if not already present).

    'providers' => [
        Taskforcedev\LaravelSupport\ServiceProvider::class,
        Taskforcedev\LaravelForum\ServiceProvider::class,
    ]

### Step 4: Publish and run migrations.
Publish the migrations.

    php artisan vendor:publish --provider="Taskforcedev\LaravelForum\ServiceProvider" --tag="migrations"

Run the migrations

    php artisan migrate

### Step 5: Publish Config.
If you haven't previously published the config from the LaravelSupport package please do this also with the following command:

    php artisan vendor:publish --tag="taskforce-support"

### Step 6: Edit config.
If you haven't previously edited the config/taskforce-support.php file please add your sites details into this.

    'layout' => 'layouts.master',
    'sitename' => 'Your Site Name',

## Usage
Once you have done the installation steps above in order to setup the forums for public use you must first create at least one category and a forum, you do this by going to yoursite.com/admin/forums (this will also create the required tables).
Once you have done this you can add the link to /forum into your sites navigation as you please.

## Administration / Moderation
In order to provide administrators access to add/edit/manage the forums we use a "can" method on the user model which is our convention.

To provide basic addition functionality the following must return true.
<code>$user->can('forum-administrate');</code>

To grant users full moderation permissions we will implement checks based on the following.
<code>$user->can('forum-moderate');</code>

We will later add additional options to provide more comprehensive permissions.

## Events

The following events are fired within the package and can be listened for in your main application.

 - Taskforcedev\LaravelForum\Events\PostCreated
 - Taskforcedev\LaravelForum\Events\PostReply

## Contributing / Feedback
 - We welcome any pull requests, please ensure code is to the PSR-2 Standard.
 - We check github issues frequently so please feel free to raise any comments or feedback there.
