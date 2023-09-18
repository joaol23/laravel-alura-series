<?php

namespace App\Listeners;

use App\Events\SeriesDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class ExcludeFileSerie implements ShouldQueue
{

    /**
     * Handle the event.
     */
    public function handle(SeriesDeleted $event): void
    {
        Storage::disk('public')->delete($event->serieCoverPath);
    }
}
