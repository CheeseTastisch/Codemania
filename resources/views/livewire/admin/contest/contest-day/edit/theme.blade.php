<div style="{{ $contestDay->theme->getVariablesAttribute() }}">
    <div class="grid xl:grdata-popover id-cols-2 xl:grdata-popover id-rows-6 grdata-popover id-cols-1 grdata-popover id-rows-12 gap-2">
        <div data-popover-target="tooltip-50" class="bg-accent-50 rounded-lg border border-gray-900 text-gray-900 flex justify-center items-center xl:row-start-6 relative">50</div>
        <div data-popover id="tooltip-50" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-600 text-center">
            <p>Hex: {{ $contestDay->theme->fifty->getHex() }}</p>
            <p>RGB: {{ $contestDay->theme->fifty->getRgb(false)->implode(', ') }}</p>
            <p>HSL: {{ $contestDay->theme->fifty->getHsl(false)->implode(', ') }}</p>
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

        <div data-popover-target="tooltip-100" class="bg-accent-100 rounded-lg border border-gray-900 text-gray-900 flex justify-center items-center xl:row-start-5">100</div>
        <div data-popover id="tooltip-100" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-600 text-center">
            <p>Hex: {{ $contestDay->theme->hundred->getHex() }}</p>
            <p>RGB: {{ $contestDay->theme->hundred->getRgb(false)->implode(', ') }}</p>
            <p>HSL: {{ $contestDay->theme->hundred->getHsl(false)->implode(', ') }}</p>
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

        <div data-popover-target="tooltip-200"  class="bg-accent-200 rounded-lg border border-gray-900 text-gray-900 flex justify-center items-center xl:row-start-4">200</div>
        <div data-popover id="tooltip-200" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-600 text-center">
            <p>Hex: {{ $contestDay->theme->two_hundred->getHex() }}</p>
            <p>RGB: {{ $contestDay->theme->two_hundred->getRgb(false)->implode(', ') }}</p>
            <p>HSL: {{ $contestDay->theme->two_hundred->getHsl(false)->implode(', ') }}</p>
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

        <div data-popover-target="tooltip-300" class="bg-accent-300 rounded-lg border border-gray-900 text-gray-900 flex justify-center items-center xl:row-start-3">300</div>
        <div data-popover id="tooltip-300" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-600 text-center">
            <p>Hex: {{ $contestDay->theme->three_hundred->getHex() }}</p>
            <p>RGB: {{ $contestDay->theme->three_hundred->getRgb(false)->implode(', ') }}</p>
            <p>HSL: {{ $contestDay->theme->three_hundred->getHsl(false)->implode(', ') }}</p>
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

        <div data-popover-target="tooltip-400"  class="bg-accent-400 rounded-lg border border-gray-900 text-gray-900 flex justify-center items-center xl:row-start-2">400</div>
        <div data-popover id="tooltip-400" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-600 text-center">
            <p>Hex: {{ $contestDay->theme->four_hundred->getHex() }}</p>
            <p>RGB: {{ $contestDay->theme->four_hundred->getRgb(false)->implode(', ') }}</p>
            <p>HSL: {{ $contestDay->theme->four_hundred->getHsl(false)->implode(', ') }}</p>
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

        <div data-popover-target="tooltip-500" class="bg-accent-500 rounded-lg border border-gray-900 text-gray-900 flex justify-center items-center xl:col-span-2 xl:row-start-1">500</div>
        <div data-popover id="tooltip-500" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-600 text-center">
            <p>Hex: {{ $contestDay->theme->five_hundred->getHex() }}</p>
            <p>RGB: {{ $contestDay->theme->five_hundred->getRgb(false)->implode(', ') }}</p>
            <p>HSL: {{ $contestDay->theme->five_hundred->getHsl(false)->implode(', ') }}</p>
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

        <div data-popover-target="tooltip-600" class="bg-accent-600 rounded-lg border border-gray-900 text-gray-100 flex justify-center items-center xl:row-start-2">600</div>
        <div data-popover id="tooltip-600" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-600 text-center">
            <p>Hex: {{ $contestDay->theme->six_hundred->getHex() }}</p>
            <p>RGB: {{ $contestDay->theme->six_hundred->getRgb(false)->implode(', ') }}</p>
            <p>HSL: {{ $contestDay->theme->six_hundred->getHsl(false)->implode(', ') }}</p>
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

        <div data-popover-target="tooltip-700"  class="bg-accent-700 rounded-lg border border-gray-900 text-gray-100 flex justify-center items-center xl:row-start-3">700</div>
        <div data-popover id="tooltip-700" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-600 text-center">
            <p>Hex: {{ $contestDay->theme->seven_hundred->getHex() }}</p>
            <p>RGB: {{ $contestDay->theme->seven_hundred->getRgb(false)->implode(', ') }}</p>
            <p>HSL: {{ $contestDay->theme->seven_hundred->getHsl(false)->implode(', ') }}</p>
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

        <div data-popover-target="tooltip-800" class="bg-accent-800 rounded-lg border border-gray-900 text-gray-100 flex justify-center items-center xl:row-start-4">800</div>
        <div data-popover id="tooltip-800" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-600 text-center">
            <p>Hex: {{ $contestDay->theme->eight_hundred->getHex() }}</p>
            <p>RGB: {{ $contestDay->theme->eight_hundred->getRgb(false)->implode(', ') }}</p>
            <p>HSL: {{ $contestDay->theme->eight_hundred->getHsl(false)->implode(', ') }}</p>
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

        <div data-popover-target="tooltip-900" class="bg-accent-900 rounded-lg border border-gray-900 text-gray-100 flex justify-center items-center xl:row-start-5">900</div>
        <div data-popover id="tooltip-900" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-600 text-center">
            <p>Hex: {{ $contestDay->theme->nine_hundred->getHex() }}</p>
            <p>RGB: {{ $contestDay->theme->nine_hundred->getRgb(false)->implode(', ') }}</p>
            <p>HSL: {{ $contestDay->theme->nine_hundred->getHsl(false)->implode(', ') }}</p>
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

        <div data-popover-target="tooltip-950" class="bg-accent-950 rounded-lg border border-gray-900 text-gray-100 flex justify-center items-center xl:row-start-6">950</div>
        <div data-popover id="tooltip-950" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-600 text-center">
            <p>Hex: {{ $contestDay->theme->nine_hundred_fifty->getHex() }}</p>
            <p>RGB: {{ $contestDay->theme->nine_hundred_fifty->getRgb(false)->implode(', ') }}</p>
            <p>HSL: {{ $contestDay->theme->nine_hundred_fifty->getHsl(false)->implode(', ') }}</p>
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    </div>

    <div class="mt-4 flex justify-evenly items-center">
        <x-form.input.color
            id="color" label="Farbe"
            :model="\App\Models\Components\Modeled\Model::livewire('color')"
            updatable />

        <x-button.big.livewire
            id="download" action="download"
            prevent loading>
            Logos herunterladen
        </x-button.big.livewire>
    </div>
</div>
