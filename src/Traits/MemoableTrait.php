<?php namespace Magik72\Memo\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Magik72\Memo\Models\Memo;

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
     * @return Model
     */
    public function memoCreate(?array $data = []): Model
    {
        $memo = new Memo();
        foreach ($data as $index => $d) {
            if (Schema::hasColumn('memos', $index)) {
                $memo->$index = $d;
            }
        }
        $memo->save();

        return $memo;
    }

    /**
     * @param  Memo  $memo
     * @param  array|null  $data
     * @return bool
     */
    public function memoUpdate(Memo $memo, ?array $data = []): bool
    {
        foreach ($data as $index => $d) {
            if (Schema::hasColumn('memos', $index)) {
                $memo->$index = $d;
            }
        }
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