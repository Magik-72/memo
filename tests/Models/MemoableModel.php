<?php namespace Magik72\Memo\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Magik72\Memo\Models\Memo;
use Magik72\Memo\Traits\MemoableTrait;

class MemoableModel extends Model
{
    use MemoableTrait;

}