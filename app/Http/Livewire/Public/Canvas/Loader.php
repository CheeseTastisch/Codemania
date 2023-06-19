<?php

namespace App\Http\Livewire\Public\Canvas;

use App\Concerns\Livewire\LoadsDataLater;
use App\Models\Contest;
use App\Models\ContestDay;
use Closure;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

class Loader extends Component
{

    public ContestDay $contestDay;

    public int $viewId = 0;
    public string $view;

    public string $key;

    public Contest|Collection|null $target = null;

    public function mount(): void
    {
        $this->next();
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $this->key = $this->viewId . '/' . $this->getId($this->target);
        return view('livewire.public.canvas.loader');
    }

    public function next(): void
    {
        $close = $this->getGroupedClose();
        if ($close->isNotEmpty()) {
            $this->setNextOrFirst($close);

            $this->setView($this->target->first()->start_time->isFuture() ? 1 : 2);
            return;
        }

        if ($this->viewId <= 2) {
            $this->setView(3);
            $this->target = null;
            return;
        }

        if ($this->viewId <= 4) {
            $starting = $this->getGroupedStarting();

            if ($starting->isNotEmpty()) {
                $this->setNextOrNull($starting);

                if ($this->target !== null) {
                    $this->setView(4);
                    return;
                }
            }
        }

        if ($this->viewId <= 5) {
            $running = $this->getGroupedRunning();

            if ($running->isNotEmpty()) {
                $this->setNextOrNull($running);

                if ($this->target !== null) {
                    $this->setView(5);
                    return;
                }
            }
        }

        if ($this->viewId <= 6) {
            $running = $this->getRunning();

            if ($running->isNotEmpty()) {
                $this->setNextOrNull($running);

                if ($this->target !== null) {
                    $this->setView(6);
                    return;
                }
            }
        }

        $this->setView(3);
        $this->target = null;
    }

    private function setView(int $viewId): void
    {
        $this->viewId = $viewId;
        $this->generateView();
    }

    private function generateView(): void
    {
        $this->view = match ($this->viewId) {
            1, 4 => 'public.canvas.contest.time-till-start',
            2, 5 => 'public.canvas.contest.time-till-end',
            6 => 'public.canvas.contest.leaderboard',
            default => 'public.canvas.sponsors'
        };
    }

    private function getStarting(int $in): Collection {
        return $this->contestDay->contests
            ->filter(fn(Contest $contest) => $contest->start_time->isFuture() && $contest->start_time->diffInMinutes() < $in);
    }

    private function getRunning(): Collection {
        return $this->contestDay->contests
            ->filter(fn(Contest $contest) => $contest->start_time->isPast() && $contest->end_time->isFuture());
    }

    private function getEnding(int $in): Collection {
        return $this->contestDay->contests
            ->filter(fn(Contest $contest) => $contest->end_time->isFuture() && $contest->end_time->diffInMinutes() < $in);
    }

    private function getEnded(int $since): Collection {
        return $this->contestDay->contests
            ->filter(fn(Contest $contest) => $contest->end_time->isPast() && $contest->end_time->diffInMinutes() < $since);
    }
    private function getGroupedStarting($in = 60) {
        return $this->getStarting($in)
            ->groupBy('start_time')
            ->map(fn(Collection $contests) => collect([
                'contests' => $contests,
                'id' => array_id($contests->map(fn(Contest $contest) => $contest->id)->sort()->toArray())
            ]));
    }
    private function getGroupedRunning() {
        return $this->getRunning()
            ->groupBy('end_time')
            ->map(fn(Collection $contests) => collect([
                'contests' => $contests,
                'id' => array_id($contests->map(fn(Contest $contest) => $contest->id)->sort()->toArray())
            ]));
    }

    private function getGroupedEnding($in = 60) {
        return $this->getEnding($in)
            ->groupBy('end_time')
            ->map(fn(Collection $contests) => collect([
                'contests' => $contests,
                'id' => array_id($contests->map(fn(Contest $contest) => $contest->id)->sort()->toArray())
            ]));
    }

    private function getGroupedClose() {
        return $this->getGroupedStarting(5)->union($this->getGroupedEnding(5));
    }

    private function smoothTarget(): void
    {
        if ($this->target instanceof Contest || $this->target === null) return;
        if ($this->target->isEmpty()) return;

        $this->target = $this->target->get('contests');
    }

    private function setNext(array|Collection $contests, Closure $onNull): void
    {
        if (is_array($contests)) $contests = collect($contests);

        $nextId = $this->getNextId($contests, $this->getId($this->target));
        if ($nextId === null) {
            $onNull();
            $this->smoothTarget();
            return;
        }

        $this->target = $contests->firstWhere('id', $nextId);
        $this->smoothTarget();
    }

    private function setNextOrFirst(array|Collection $contests): void
    {
        $this->setNext($contests, fn() => $this->target = $contests->first());
    }

    private function setNextOrNull(array|Collection $contests): void
    {
        $this->setNext($contests, fn() => $this->target = null);
    }

    private function getNextId(array|Collection $ids, int|null $currentId): int|null
    {
        if (is_array($ids)) $ids = collect($ids);

        if ($ids->isEmpty()) return null;
        if ($currentId === null) return $this->getId($ids->first());

        return $this->getId($ids->firstWhere('id', '>', $currentId));
    }

    private function getId(Contest|Collection|null $from): int|null {
        if ($from === null) return null;
        if ($from instanceof Contest) return $from->id;
        if ($from instanceof Collection) {
            if ($from->has('id')) return $from->get('id');
            return array_id($from->map(fn(Contest $contest) => $contest->id)->sort()->toArray());
        }

        return null;
    }


}
