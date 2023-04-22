<?php

namespace App\Models;

use App\Casts\Color as ColorCast;
use App\Helper\Color\Color;
use App\Helper\Color\PaletteGenerator;
use Exception;
use File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;
use ZipArchive;

class ContestDayTheme extends Model
{

    protected static Collection $backup;

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

    protected $casts = [
        'fifty' => ColorCast::class,
        'hundred' => ColorCast::class,
        'two_hundred' => ColorCast::class,
        'three_hundred' => ColorCast::class,
        'four_hundred' => ColorCast::class,
        'five_hundred' => ColorCast::class,
        'six_hundred' => ColorCast::class,
        'seven_hundred' => ColorCast::class,
        'eight_hundred' => ColorCast::class,
        'nine_hundred' => ColorCast::class,
        'nine_hundred_fifty' => ColorCast::class,
    ];

    public static function default($contestId): self {
        $generated = static::create([
            'fifty' => static::getBackup()['fifty'],
            'hundred' => static::getBackup()['hundred'],
            'two_hundred' => static::getBackup()['two_hundred'],
            'three_hundred' => static::getBackup()['three_hundred'],
            'four_hundred' => static::getBackup()['four_hundred'],
            'five_hundred' => static::getBackup()['five_hundred'],
            'six_hundred' => static::getBackup()['six_hundred'],
            'seven_hundred' => static::getBackup()['seven_hundred'],
            'eight_hundred' => static::getBackup()['eight_hundred'],
            'nine_hundred' => static::getBackup()['nine_hundred'],
            'nine_hundred_fifty' => static::getBackup()['nine_hundred_fifty'],
            'contest_day_id' => $contestId
        ]);
        $generated->generateImages();

        return $generated;
    }

    public static function getBackup(): Collection
    {
        if (!isset(static::$backup)) {
            static::$backup = collect([
                'fifty' => Color::parseRgb('#f9fafb'),
                'hundred' => Color::parseRgb('#f3f4f6'),
                'two_hundred' => Color::parseRgb('#e5e7eb'),
                'three_hundred' => Color::parseRgb('#d1d5db'),
                'four_hundred' => Color::parseRgb('#9ca3af'),
                'five_hundred' => Color::parseRgb('#6b7280'),
                'six_hundred' => Color::parseRgb('#4b5563'),
                'seven_hundred' => Color::parseRgb('#374151'),
                'eight_hundred' => Color::parseRgb('#1f2937'),
                'nine_hundred' => Color::parseRgb('#111827'),
                'nine_hundred_fifty' => Color::parseRgb('#030712'),
            ]);
        }

        return static::$backup;
    }

    public static function getDefaultVariableAttributes(): string
    {
        return "
            --color-accent-50:" . static::getBackup()->get('fifty')->getRgb(false)->implode(' ') . ";
            --color-accent-100:" . static::getBackup()->get('hundred')->getRgb(false)->implode(' ') . ";
            --color-accent-200:" . static::getBackup()->get('two_hundred')->getRgb(false)->implode(' ') . ";
            --color-accent-300:" . static::getBackup()->get('three_hundred')->getRgb(false)->implode(' ') . ";
            --color-accent-400:" . static::getBackup()->get('four_hundred')->getRgb(false)->implode(' ') . ";
            --color-accent-500:" . static::getBackup()->get('five_hundred')->getRgb(false)->implode(' ') . ";
            --color-accent-600:" . static::getBackup()->get('six_hundred')->getRgb(false)->implode(' ') . ";
            --color-accent-700:" . static::getBackup()->get('seven_hundred')->getRgb(false)->implode(' ') . ";
            --color-accent-800:" . static::getBackup()->get('eight_hundred')->getRgb(false)->implode(' ') . ";
            --color-accent-900:" . static::getBackup()->get('nine_hundred')->getRgb(false)->implode(' ') . ";
            --color-accent-950:" . static::getBackup()->get('nine_hundred_fifty')->getRgb(false)->implode(' ');
    }

    public function contestDay(): BelongsTo
    {
        return $this->belongsTo(ContestDay::class);
    }

    public function getVariablesAttribute(): string
    {
        return "
            --color-accent-50: {$this->fifty->getRgb(false)->implode(' ')};
            --color-accent-100: {$this->hundred->getRgb(false)->implode(' ')};
            --color-accent-200: {$this->two_hundred->getRgb(false)->implode(' ')};
            --color-accent-300: {$this->three_hundred->getRgb(false)->implode(' ')};
            --color-accent-400: {$this->four_hundred->getRgb(false)->implode(' ')};
            --color-accent-500: {$this->five_hundred->getRgb(false)->implode(' ')};
            --color-accent-600: {$this->six_hundred->getRgb(false)->implode(' ')};
            --color-accent-700: {$this->seven_hundred->getRgb(false)->implode(' ')};
            --color-accent-800: {$this->eight_hundred->getRgb(false)->implode(' ')};
            --color-accent-900: {$this->nine_hundred->getRgb(false)->implode(' ')};
            --color-accent-950: {$this->nine_hundred_fifty->getRgb(false)->implode(' ')};
        ";
    }

    /**
     * @throws Exception
     */
    public function generatePalette(Color $by): void
    {
        $palette = (new PaletteGenerator($by))->generatePalette();

        $this->update([
            'fifty' => $palette->get(50),
            'hundred' => $palette->get(100),
            'two_hundred' => $palette->get(200),
            'three_hundred' => $palette->get(300),
            'four_hundred' => $palette->get(400),
            'five_hundred' => $palette->get(500),
            'six_hundred' => $palette->get(600),
            'seven_hundred' => $palette->get(700),
            'eight_hundred' => $palette->get(800),
            'nine_hundred' => $palette->get(900),
            'nine_hundred_fifty' => $palette->get(950),
        ]);
        $this->generateImages();
    }

    public function generateImages(): void
    {
        $folderPath = storage_path('app/public/themes/' . $this->id);
        $backupPath = storage_path('app/public/backup');

        File::deleteDirectory($folderPath);
        File::copyDirectory($backupPath, $folderPath);

        $this->replaceColors($folderPath,  static::getBackup()->mapWithKeys(fn ($value, $key) => [$value->getHex() => $this->$key->getHex()]));
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

    public function generateZipArchive(bool $includeLogos = true, bool $includeWaves = false): string
    {
        $zipPath = storage_path('app/public/themes/' . $this->id . '.zip');
        if (File::exists($zipPath)) File::delete($zipPath);

        $zip = new ZipArchive();
        $zip->open($zipPath, ZipArchive::CREATE);

        if ($includeLogos) {
            $files = File::allFiles(storage_path('app/public/themes/' . $this->id . '/logo'));
            foreach ($files as $file) $zip->addFile($file->getPathname(), 'logo/' . $file->getFilename());
        }

        if ($includeWaves) {
            $darkWaves = File::allFiles(storage_path('app/public/themes/' . $this->id . '/wave/dark'));
            foreach ($darkWaves as $file) $zip->addFile($file->getPathname(), 'wave/dark/' . $file->getFilename());

            $lightWaves = File::allFiles(storage_path('app/public/themes/' . $this->id . '/wave/light'));
            foreach ($lightWaves as $file) $zip->addFile($file->getPathname(), 'wave/light/' . $file->getFilename());
        }

        $zip->close();

        return $zipPath;
    }

}
