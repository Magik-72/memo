<?php namespace Magik72\Memo\Providers;

use Illuminate\Support\ServiceProvider;

class MemoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/memo.php' => config_path('memo.php')
        ], 'magik72-memo');
        
        $this->loadMigrationsFrom([
            __DIR__.'/../../database/migrations'
        ]);
    }
}