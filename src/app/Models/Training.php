<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Training extends Model
{
    use HasFactory;

    /**
     * 作成したユーザーを取得
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * トレーニング部位を取得
     *
     * @return BelongsTo
     */
    public function bodyPart(): BelongsTo
    {
        return $this->belongsTo(BodyPart::class);
    }

    /**
     * トレーニング方法を取得
     *
     * @return BelongsTo
     */
    public function trainingMethod(): BelongsTo
    {
        return $this->belongsTo(TrainingMethod::class);
    }
}
