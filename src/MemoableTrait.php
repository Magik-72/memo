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

    /**
     * @param  MemoContract  $memo
     * @param  array|null  $data
     * @return bool
     */
    public function memoUpdate(MemoContract $memo, ?array $data = []): bool
    {
        $memo->fill($data);
        $memo->save();

        return true;
    }

    /**
     * @param  Memo  $memo
     * @return bool|null
     */
    public function memoDelete(Memo $memo): ?bool
    {
        return $memo->delete();
    }

}