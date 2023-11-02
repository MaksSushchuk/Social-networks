<?php

namespace App\Listeners;

use App\Imports\DefaultAvatarImport;
use App\Jobs\DefaultAvatarImportJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ImportAvatarForNewUser
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        DefaultAvatarImportJob::dispatch($event->user);
    }
}
