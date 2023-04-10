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
        <x-table.content.row with-hover>
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
                Bearbeiten
                Löschen
            </x-table.content.column>
        </x-table.content.row>
    @endforeach
</x-table.container>
