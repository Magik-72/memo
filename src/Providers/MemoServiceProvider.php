<?php namespace Magik72\Memo\Providers;

use Illuminate\Support\ServiceProvider;
use Magik72\Memo\Memo;
use Magik72\Memo\MemoContract;

class MemoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom([
            __DIR__.'/../../database/migrations'
        ]);
    }

    public function register()
    {
        $this->app->bind(MemoContract::class, Memo::class);
    }
}