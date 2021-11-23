<?php namespace Magik72\Memo\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
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
        $data['memoable_type'] = $this::class;
        $data['memoable_id'] = $this->id;
        $data['description'] = $data['description'] ?? null;

        return $this->memos()->create($data);
    }

    /**
     * @param  Memo  $memo
     * @param  array|null  $data
     * @return bool
     */
    public function memoUpdate(Memo $memo, ?array $data = []): bool
    {
        return $memo->update($data);
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