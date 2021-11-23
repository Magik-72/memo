<?php namespace Magik72\Memo\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Magik72\Memo\Models\Memo;
use Magik72\Memo\Tests\Models\MemoableModel;

class MemoTest extends Testcase
{
    use RefreshDatabase;

    protected array $data;
    protected MemoableModel $memoableModel;
    protected Memo $memo;

    protected function setUp(): void
    {
        parent::setUp();

        $this->memoable = new MemoableModel();
        $this->memoable->name = "test";
        $this->memoable->save();

        $this->memo = Memo::factory()->create([
            'memoable_id' => $this->memoable->id,
            'memoable_type' => MemoableModel::class,
            'description' => 'test test 1',
        ]);

        $this->data = [
            'memoable_id' => $this->memoable->id,
            'memoable_type' => MemoableModel::class,
            'description' => 'test test 2',
        ];
    }

    public function test_create_memo_by_memoable()
    {
        $this->memoable->memoCreate($this->data);
        $this->assertDatabaseHas('memos', [
            'memoable_id' => $this->memoable->id,
            'memoable_type' => MemoableModel::class,
            'description' => 'test test 2',
        ]);
    }

    public function test_update_memo_by_memoable()
    {
        $this->memoable->memoUpdate($this->memo, $this->data);
        $this->assertDatabaseHas('memos', [
            'memoable_id' => $this->memoable->id,
            'memoable_type' => MemoableModel::class,
            'description' => 'test test 2',
        ]);
    }

    public function test_delete_memo_by_memoable()
    {
        $this->memoable->memoDelete($this->memo);
        $this->assertModelMissing($this->memo);
    }

    public function test_get_all_memos()
    {
        $this->assertTrue($this->memoable->memos()->count() == 1);

        $memo = $this->memoable->memoCreate($this->data);
        $this->assertTrue($this->memoable->memos()->count() == 2);
        $this->assertTrue($memo->memoable()->count() == 1);

        $memo = $this->memoable->memoCreate($this->data);
        $this->assertTrue($this->memoable->memos()->count() == 3);
        $this->assertTrue($memo->memoable()->count() == 1);
    }
}