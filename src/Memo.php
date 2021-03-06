<?php namespace Magik72\Memo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Magik72\Memo\Database\Factories\MemoFactory;

class Memo extends Model implements MemoContract
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'memoable_type',
        'memoable_id',
        'description',
        'created_at',
        'updated_at'
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