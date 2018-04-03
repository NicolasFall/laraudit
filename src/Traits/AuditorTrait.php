<?php

namespace Audit\Traits;

use Audit\Models\Audit;

/**
 * This trait must be used in any model that represents an user that may be register as the author of a change in an auditable item.
 */
trait AuditorTrait
{
    protected const AUDITOR_ID_KEY = 'id';

    public function audit()
    {
        return $this->morphToMany(Audit::class, 'auditable');
    }

    public function getAuditorIdKey()
    {
        return static::AUDITOR_ID_KEY;
    }

    public function getAuditorId()
    {
        return $this->{$this->getAuditorIdKey()};
    }

    public function getAuditorType()
    {
        return get_called_class();
    }
}
