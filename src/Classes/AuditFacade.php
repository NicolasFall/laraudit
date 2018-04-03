<?php

namespace Audit\Classes;

use Audit\Classes\Auditor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Facade;

/**
 *  Encapsulates the logic for transforma a set of changes into an audit item.
 */
class AuditFacade extends Facade
{
    protected const FACADE_NAME = 'Audit';
    protected static $auditor = null;
    
    public function __construct(Auditor $auditor)
    {
        self::$auditor = $auditor;
    }
    protected static function getFacadeAccessor()
    {
        return static::FACADE_NAME;
    }

    protected static function log(Model $model, $user = null)
    {
        self::$auditor->log_changes($model, $user);
    }
}
