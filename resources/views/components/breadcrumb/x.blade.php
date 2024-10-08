<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1">
        @foreach($items as $item)
            @if(is_string($item))
                <li>
                    <div class="flex items-center">
                        <span class="text-gray-400">{{ $separator }}</span>
                        <span class="ml-1 text-sm font-medium text-gray-700 dark:text-gray-400">{{ $item }}</span>
                    </div>
                </li>
            @elseif(is_array($item))
                @if($item['home'] ?? false)
                    <li class="inline-flex items-center">
                        @if(array_key_exists('link', $item))
                            <a href="{{ $item['link'] }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-accent-600 dark:text-gray-300 dark:hover:text-accent-400">
                                <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                <span class="ml-1">{{ $item['name'] }}</span>
                            </a>
                        @else
                            <div class="inline-flex items-center">
                                <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-400 ml-1">{{ $item['name'] }}</span>
                            </div>
                        @endif
                    </li>
                @elseif($item['current'] ?? false)
                    <li class="inline-flex items-center">
                        <span class="text-gray-400">{{ $separator }}</span>
                        <span class="ml-1 text-sm font-medium text-accent-400 dark:text-accent-600">{{ $item['name'] }}</span>
                    </li>
                @else
                    <li class="inline-flex items-center">
                        @if(array_key_exists('link', $item))
                            <span class="text-gray-400">{{ $separator }}</span>
                            <a href="{{ $item['link'] }}" class="inline-flex items-center text-sm font-medium">
                                <span class="ml-1 text-gray-700 hover:text-accent-600 dark:text-gray-300 dark:hover:text-accent-400">{{ $item['name'] }}</span>
                            </a>
                        @else
                            <span class="text-gray-400">{{ $separator }}</span>
                            <span class="ml-1 text-sm font-medium text-gray-700 dark:text-gray-400">{{ $item['name'] }}</span>
                        @endif
                    </li>
                @endif
            @endif
{{--                <li>--}}
{{--                    <div class="flex items-center">--}}
{{--                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>--}}
{{--                        <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Projects</a>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--            <li>--}}
{{--                <div class="flex items-center">--}}
{{--                    <span class="text-gray-400">/</span>--}}
{{--                    <span class="ml-1 text-sm font-medium text-gray-500 dark:text-gray-400">Flowbite</span>--}}
{{--                </div>--}}
{{--            </li>--}}
        @endforeach
    </ol>
</nav>
