@php(Cache::driver('array')->set('alert.type', $type))
<div id="alert-additional-content-1" class="p-4 border rounded-lg {{ $getClasses }}" role="alert">
    <div class="flex items-center">
        <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">{{ $srInfo }}</span>
        <h3 class="text-lg font-medium">{{ $title }}</h3>
    </div>
    <div class="mt-2 mb-4 text-sm">
        {{ $slot }}
    </div>
    <div class="flex">
        {{ $actions }}
    </div>
</div>
@php(Cache::driver('array')->forget('alert.type'))
