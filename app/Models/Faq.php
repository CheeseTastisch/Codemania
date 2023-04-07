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
        'first',
        'next_id',
    ];

    public function next(): BelongsTo
    {
        return $this->belongsTo(self::class, 'next_id');
    }

    public function previous(): BelongsTo
    {
        return $this->belongsTo(self::class, 'id', 'next_id');
    }

    public function moveAfter(Faq|null $faq): void
    {
        if ($this->id == $faq?->id) return;
        if ($this->previous?->id == $faq?->id) return;

        if ($this->previous != null) $this->previous->update(['next_id' => $this->next_id]);

        if ($faq === null) {
            $first = self::whereFirst(true)->first();
            $first->update(['first' => false]);
            $this->update(['first' => true, 'next_id' => $first->id]);
        } else {
            if ($this->first) {
                $this->update(['first' => false]);
                $this->next?->update(['first' => true]);
            }

            $this->previous?->update(['next_id' => $this->next_id]);

            $this->update(['next_id' => $faq->next_id]);
            $faq->update(['next_id' => $this->id]);
        }
    }

    /**
     * @return Faq[]
     */
    public static function sorted(): array
    {
        $faqs = self::all();

        $sorted = [];
        $current = $faqs->firstWhere('first', true);

        while ($current) {
            $sorted[] = $current;
            $current = $faqs->firstWhere('id', $current->next_id);
        }

        return $sorted;
    }


}
