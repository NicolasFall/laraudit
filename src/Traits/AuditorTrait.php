<?php

namespace Audit\Traits;

use Audit\Models\Audit;

/**
 * This trait must be used in any model that represents an user that may be register as the author of a change in an auditable item.
 */
trait AuditorTrait
{
    public function auditor()
    {
        return $this->morphToMany(Audit::class, 'auditor');
    }

    public function getAuditorIdKey()
    {
        return 'id';
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
