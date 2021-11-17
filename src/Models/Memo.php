<?php namespace Magik72\Memo\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Magik72\Memo\Database\Factories\MemoFactory;

class Memo extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'description',
    ];

    /**
     * @return MorphTo
     */
    public function memoable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return MemoFactory
     */
    protected static function newFactory(): MemoFactory
    {
        return MemoFactory::new();
    }
}