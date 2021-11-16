<?php namespace Magik72\Memo\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Magik72\Memo\Models\Memo;

class MemoableModel extends Model
{
    public function memos()
    {
        return $this->hasMany(Memo::class);
    }

    public function memoCreate(array $data)
    {
        return $this->memos()->create([
            'memoable_model_type' => get_class($this),
            'memoable_model_id' => $this->id,
            'description' => $data['description'] ?: null,
            'priority' => $data['priority'] ?: null,
            'recalled_at' => $data['recalled_at'] ?: null,
        ]);
    }

    public function memoUpdate(MemoableModel $memoableModel, ?array $data = [])
    {
        return $memoableModel->update([
            'description' => $data['description'] ?: null,
            'priority' => $data['priority'] ?: null,
            'recalled_at' => $data['recalled_at'] ?: null,
        ]);
    }

    public function memoDelete(MemoableModel $memoableModel)
    {
        return $memoableModel->delete();
    }
}