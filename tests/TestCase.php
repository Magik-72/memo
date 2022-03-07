<?php namespace Magik72\Memo\Tests;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Magik72\Memo\Providers\MemoServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function defineDatabaseMigrations()
    {
        Schema::create('memoable_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    protected function getPackageProviders($app)
    {
        return [
            MemoServiceProvider::class
        ];
    }
}