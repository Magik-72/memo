<?php

namespace Magik72\Memo\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Magik72\Memo\Models\Memo;

class MemoFactory extends Factory
{
    protected $model = Memo::class;

    public function definition()
    {
        return [
            'memoable_id' => null,
            'memoable_type' => null,
            'description' => $this->faker->sentences(2, true),
        ];
    }


}
