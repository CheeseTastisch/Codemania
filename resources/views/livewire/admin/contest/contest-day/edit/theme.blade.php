<div style="{{ $contestDay->theme->getVariablesAttribute() }}">
    <div class="grid xl:grid-cols-2 xl:grid-rows-6 grid-cols-1 grid-rows-12 gap-2">
        <div class="bg-accent-50 rounded-lg border border-gray-900 flex justify-center items-center xl:row-start-6">50</div>
        <div class="bg-accent-100 rounded-lg border border-gray-900 flex justify-center items-center xl:row-start-5">100</div>
        <div class="bg-accent-200 rounded-lg border border-gray-900 flex justify-center items-center xl:row-start-4">200</div>
        <div class="bg-accent-300 rounded-lg border border-gray-900 flex justify-center items-center xl:row-start-3">300</div>
        <div class="bg-accent-400 rounded-lg border border-gray-900 flex justify-center items-center xl:row-start-2">400</div>
        <div class="bg-accent-500 rounded-lg border border-gray-900 flex justify-center items-center xl:col-span-2 xl:row-start-1">500</div>
        <div class="bg-accent-600 rounded-lg border border-gray-900 text-gray-300 flex justify-center items-center xl:row-start-2">600</div>
        <div class="bg-accent-700 rounded-lg border border-gray-900 text-gray-300 flex justify-center items-center xl:row-start-3">700</div>
        <div class="bg-accent-800 rounded-lg border border-gray-900 text-gray-300 flex justify-center items-center xl:row-start-4">800</div>
        <div class="bg-accent-900 rounded-lg border border-gray-900 text-gray-300 flex justify-center items-center xl:row-start-5">900</div>
        <div class="bg-accent-950 rounded-lg border border-gray-900 text-gray-300 flex justify-center items-center xl:row-start-6">950</div>
    </div>

    <div class="mt-4">
        <x-form.input.simple
            label="Farbe"
            name="color"
            updatable
            wire
            wire-type="lazy" />
    </div>
</div>
