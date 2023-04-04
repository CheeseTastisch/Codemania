<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Faq extends Model
{

    protected $fillable = [
        'question',
        'answer',
        'previous_id',
    ];

    public function previous(): BelongsTo
    {
        return $this->belongsTo(self::class, 'previous_id');
    }

    public function next(): BelongsTo
    {
        return $this->belongsTo(self::class, 'id', 'previous_id');
    }

    public function moveAfter(Faq|null $faq): void
    {
        $this->next?->update(['previous_id' => $this->previous?->id]);

        if ($faq != null) $faq->next?->update(['previous_id' => $this->id]);
        else Faq::wherePreviousId(null)->update(['previous_id' => $this->id]);

        $this->update(['previous_id' => $faq?->id]);
    }


    public static function sorted(): array
    {
        $faqs = self::all();

        $sorted = [];
        $current = $faqs->firstWhere('previous_id', null);

        while ($current) {
            $sorted[] = $current;
            $current = $faqs->firstWhere('previous_id', $current->id);
        }

        return $sorted;
    }


}
