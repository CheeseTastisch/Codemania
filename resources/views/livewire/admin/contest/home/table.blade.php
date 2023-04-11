<x-table.container with-pagination>
    <x-slot name="header">
        <x-table.header.field
            name="id"
            label="#"
        />
        <x-table.header.field
            name="name"
            label="Name"
            sortable
            sort-field="{{ $sortField }}"
            sort-direction="{{ $sortDirection }}"
            wire-method="sortBy"
        />
        <x-table.header.field
            name="date"
            label="Datum"
            sortable
            sort-field="{{ $sortField }}"
            sort-direction="{{ $sortDirection }}"
            wire-method="sortBy"
        />
        <x-table.header.field name="Aktionen" sr-only />
    </x-slot>

    <x-slot name="pagination">
        {{ $contests->links('layouts.pagination.table') }}
    </x-slot>

    @foreach($contests as $contest)
        <x-table.content.row with-hover :with-stripe="$loop->even" :with-border="!$loop->last">
            <x-table.content.column head>{{ $contest->id }}</x-table.content.column>
            <x-table.content.column>{{ $contest->name }}</x-table.content.column>
            <x-table.content.column>
                @if($contest->training_only)
                    Nur Training
                @else
                    {{ $contest->date->format('d. m. Y') }}
                @endif
            </x-table.content.column>
            <x-table.content.column>
                <div class="flex space-x-2">
                    <a href="#">
                        <svg class="w-6 h-6 hover:text-accent-400 dark:hover:text-accent-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"></path>
                        </svg>
                    </a>

                    <svg class="w-6 h-6 cursor-pointer hover:text-accent-400 dark:hover:text-accent-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                    </svg>
                </div>
            </x-table.content.column>
        </x-table.content.row>
    @endforeach
</x-table.container>
