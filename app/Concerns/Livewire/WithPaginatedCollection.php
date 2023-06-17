<?php

namespace App\Concerns\Livewire;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Livewire\WithPagination;

trait WithPaginatedCollection
{

    use WithPagination;

    protected function paginateCollection(Collection $collection, int $perPage, string $key = 'page'): LengthAwarePaginator
    {
        $currentPage = request()->input($key, 1);
        $currentPageItems = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();

        return new LengthAwarePaginator(
            $currentPageItems,
            $collection->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }

}
