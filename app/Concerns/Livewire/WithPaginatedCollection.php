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
        $currentPage = LengthAwarePaginator::resolveCurrentPage($key);
        $currentPageItems = $collection->forPage($currentPage, $perPage);

        return new LengthAwarePaginator(
            $currentPageItems,
            $collection->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query(), 'pageName' => $key]
        );
    }

}
