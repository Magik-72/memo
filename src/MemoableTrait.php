<?php namespace Magik72\Memo;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait MemoableTrait
{
    /**
     * @return MorphMany
     */
    public function memos(): MorphMany
    {
        return $this->morphMany(Memo::class, 'memoable');
    }

    /**
     * @param  array|null  $data
     * @return MemoContract
     */
    public function memoCreate(?array $data = []): MemoContract
    {
        $memo = app(MemoContract::class);
        $memo->fill($data);
        $memo->save();

        return $memo;
    }

}