<?php namespace Magik72\Memo\Tests;


use Magik72\Memo\Tests\Models\MemoableModel;

class HelloWorldTest extends Testcase
{
    public function test_hello_world()
    {
        $m = new MemoableModel();
        $m->name = "titi";
        $m->save();

        dd(MemoableModel::count());
    }
}