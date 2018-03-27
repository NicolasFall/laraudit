<?php

namespace Audit\Models;

use Audit\Interfaces\AuditableObjectInterface;
use Audit\Interfaces\AuditorInterface;
use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    public function auditable()
    {
        return $this->morphTo();
    }

    public function set_auditor(AuditorInterface $auditor)
    {
        $this->auditor_id = $auditor->getAuditorId();
        $this->auditor_type = $auditor->getAuditableType();
    }
    public function set_auditable(AuditableObjectInterface $model)
    {
        $this->auditable_id = $auditable->getAuditableId();
        $this->auditable_type = $auditable->getAuditableType();
    }
    public function set_old_value($val)
    {
        $this->old_value = $val;
    }
    public function set_new_value($val)
    {
        $this->new_value = $val;
    }
}
