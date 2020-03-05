<?php

namespace Modules\Task\Facades;

use Illuminate\Support\Facades\Facade;

class TaskFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor()
    {
        return 'task';
    }
}