<?php

namespace Audit\Traits;

trait AuditorTrait
{
    protected const AUDITOR_ID_KEY = 'id';
    public function getAuditorIdKey()
    {
        return self::AUDITOR_ID_KEY;
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
