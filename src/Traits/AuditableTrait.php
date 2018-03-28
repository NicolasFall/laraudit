<?php

namespace Audit\Traits;

use Audit\Models\Audit;

/**
 * This trait must be used in any model that will be auditable.
 */
trait AuditableTrait
{
    protected const AUDITABLE_ID_KEY = 'id';

    public function audit()
    {
        return $this->hasMany(Audit::class);
    }
    public function getAuditableIdKey()
    {
        return static::AUDITABLE_ID_KEY;
    }

    public function getAuditableId()
    {
        return $this->{$this->getAuditableIdKey()};
    }

    public function getAuditableType()
    {
        return get_called_class();
    }
}
