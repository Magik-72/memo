<?php namespace Magik72\Memo\Tests;

use Illuminate\Database\Eloquent\Model;
use Magik72\Memo\MemoableTrait;

class MemoableModel extends Model
{
    use MemoableTrait;

}