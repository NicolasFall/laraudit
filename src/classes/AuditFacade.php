<?php

namespace Audit\Classes;

use Audit\Classes\Auditor;
use Illuminate\Support\Facades\Facade;

/**
 *  Encapsulates the logic for transforma a set of changes into an audit item.
 */
class AuditFacade extends Facade
{
    protected const FACADE_NAME = 'Audit';

    public function __construct()
    {
        $this->auditor = new Auditor();
    }

    protected static function getFacadeAccessor()
    {
        return static::FACADE_NAME;
    }

    protected static function log(Auditor $auditor, Model $model, $user = null)
    {
        $this->auditor->log_changes($model, $user);
    }
}
