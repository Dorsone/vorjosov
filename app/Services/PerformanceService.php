<?php

namespace App\Services;

use Illuminate\Support\Str;
use Symfony\Component\Stopwatch\Stopwatch;

class PerformanceService
{
    protected int $spentTime; // milliseconds
    protected int $spentMemory; // bytes

    public function track(callable $callback): static
    {
        $watchName = Str::uuid()->toString();
        $watch = new Stopwatch();
        $watch->start($watchName);
        $memoryBefore = memory_get_peak_usage();

        call_user_func($callback);

        $memoryAfter = memory_get_peak_usage();
        $this->spentTime = $watch->stop($watchName)->getDuration();
        $this->spentMemory = $memoryAfter - $memoryBefore;

        return $this;
    }

    public function getSpentTime(): float|int
    {
        return $this->spentTime
            ? $this->spentTime / 1000
            : 0;
    }

    public function getSpentMemory(): float|int
    {
        return $this->spentMemory
            ? $this->spentMemory / 1000000
            : 0;
    }
}
