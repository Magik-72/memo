<?php namespace Magik72\Memo\Tests;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Magik72\Memo\Providers\MemoServiceProvider;

class Testcase extends \Orchestra\Testbench\TestCase
{
    protected function defineDatabaseMigrations()
    {
        Schema::create('memoable_models', function(Blueprint $table){
           $table->id();
           $table->string('name');
           $table->timestamps();
        });
    }

    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);

        $app['config']->set('memo', require base_path('/../../../../config/memo.php'));
    }

    protected function getPackageProviders($app)
    {
        return [
          MemoServiceProvider::class
        ];
    }
}