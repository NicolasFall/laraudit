<?php

namespace Audit\Traits;

use Audit\Models\Audit;

/**
 * This trait must be used in any model that will be auditable.
 */
trait AuditableTrait
{
    public function auditable()
    {
        return $this->morphMany(Audit::class, 'auditable');
    }
    public function getAuditableIdKey()
    {
        return 'id';
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
