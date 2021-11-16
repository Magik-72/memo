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
     * @param  array  $data
     * @return Model
     */
    public function memoCreate(array $data): Model
    {
        return $this->memos()->create([
            'memoable_type' => $this::class,
            'memoable_id' => $this->id,
            'description' => $data['description'] ?? null,
            'priority' => (int) $data['priority'] ?? null
        ]);
    }

    /**
     * @param  Memo  $memoable
     * @param  array|null  $data
     * @return bool
     */
    public function memoUpdate(Memo $memoable, ?array $data = []): bool
    {
        return $memoable->update([
            'description' => $data['description'] ?? null,
            'priority' => (int) $data['priority'] ?? null
        ]);
    }

    /**
     * @param  Memo  $memoable
     * @return bool|null
     */
    public function memoDelete(Memo $memoable): ?bool
    {
        return $memoable->delete();
    }

}