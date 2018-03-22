<?php

namespace Audit\Classes;

use Illuminate\Support\Facades\Facade;

/**
 *  Encapsulates the logic for transforma a set of changes into an audit item.
 */
class AuditorFacade extends Facade
{
    protected const FACADE_NAME = 'Audit';
    protected static function getFacadeAccessor()
    {
        return static::FACADE_NAME;
    }

    protected static function log(Auditor $auditor, Model $model, $user = null)
    {
        $auditor->log_changes($model, $user);
    }
}
