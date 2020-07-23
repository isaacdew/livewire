<?php

namespace Livewire\RenameMe;

use Livewire\Livewire;

class SupportEvents
{
    static function init() { return new static; }

    function __construct()
    {
        Livewire::listen('component.hydrate', function ($component, $request) {
            //
        });

        Livewire::listen('component.dehydrate', function ($component, $response) {
            $response->memo['listeners'] = $component->getEventsBeingListenedFor();

            $emits = $component->getEventQueue();
            $dispatches = $component->getDispatchQueue();

            if ($emits) {
                $response->effects['emits'] = $emits;
            }

            if ($dispatches) {
                $response->effects['dispatches'] = $dispatches;
            }
        });
    }
}
