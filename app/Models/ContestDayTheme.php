<?php

namespace App\Models;

use Color;
use File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContestDayTheme extends Model
{

    use SoftDeletes;

    protected static $backup = [
        'fifty' => '#f9fafb',
        'hundred' => '#f3f4f6',
        'two_hundred' => '#e5e7eb',
        'three_hundred' => '#d1d5db',
        'four_hundred' => '#9ca3af',
        'five_hundred' => '#6b7280',
        'six_hundred' => '#4b5563',
        'seven_hundred' => '#374151',
        'eight_hundred' => '#1f2937',
        'nine_hundred' => '#111827',
        'nine_hundred_fifty' => '#030712',
    ];

    protected $fillable = [
        'fifty',
        'hundred',
        'two_hundred',
        'three_hundred',
        'four_hundred',
        'five_hundred',
        'six_hundred',
        'seven_hundred',
        'eight_hundred',
        'nine_hundred',
        'nine_hundred_fifty'
    ];

    public function contestDay(): HasOne
    {
        return $this->hasOne(ContestDay::class);
    }

    public function getVariablesAttribute(): string
    {
        return "
            --color-accent-50: $this->fifty;
            --color-accent-100: $this->hundred;
            --color-accent-200: $this->two_hundred;
            --color-accent-300: $this->three_hundred;
            --color-accent-400: $this->four_hundred;
            --color-accent-500: $this->five_hundred;
            --color-accent-600: $this->six_hundred;
            --color-accent-700: $this->seven_hundred;
            --color-accent-800: $this->eight_hundred;
            --color-accent-900: $this->nine_hundred;
            --color-accent-950: $this->nine_hundred_fifty;
        ";
    }

    public function generateImages(): void
    {
        $folderPath = storage_path('app/public/themes/' . $this->id);
        $backupPath = storage_path('app/public/backup');

        File::deleteDirectory($folderPath);
        File::copyDirectory($backupPath, $folderPath);

        $this->replaceColors($folderPath,  collect(static::$backup)
            ->mapWithKeys(fn ($value, $key) => [$value => Color::toHex(explode(' ', $this->$key))]));
    }

    protected function replaceColors($folderPath, $colors): void
    {
        $files = File::allFiles($folderPath);

        foreach ($files as $file) {
            $content = File::get($file);
            $colors->each(function ($to, $from) use (&$content) {
                $content = str_replace($from, $to, $content);
            });
            File::put($file, $content);
        }
    }

    public function imagePath(string $image): string
    {
        return asset("storage/themes/$this->id/$image");
    }

    public function waves(array $classes): string
    {
        return collect($classes)
            ->map(fn ($class) => $this->wave($class))
            ->implode('');
    }

    private function wave(int $number): string {
        return ".wave-$number {background-image: url(" . asset("storage/themes/$this->id/wave/light/wave$number.svg") . ");}.dark .wave-$number {background-image: url(" . asset("storage/themes/$this->id/wave/dark/wave$number.svg") . ");}";
    }

}
