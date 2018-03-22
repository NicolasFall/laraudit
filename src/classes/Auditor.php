<?php

namespace Audit\Classes;

use Illuminate\Database\Eloquent\Model;

/**
 *  Encapsulates the logic for transforma a set of changes into an audit item.
 */
class Auditor
{

    /**
     * [resolve_user_id description]
     * @return mixed int|null
     */
    public function resolve_user()
    {
        return \Auth::check() ? \Auth::user() : null;
    }

    /**
     * [resolve_user_id description]
     * @return mixed int|null
     */
    public function resolve_user_id()
    {
        return \Auth::check() ? \Auth::user()->getAuditorId() : null;
    }

    /**
     * [resolve_user_id description]
     * @return mixed string|null
     */
    public function resolve_user_type()
    {
        return \Auth::check() ? \Auth::user()->getAuditorType() : null;
    }

    /**
     * [register_changes description]
     * @return mixed int|null
     */
    public function log_changes(Model $model, $user = null)
    {
        $user = !is_null($user) ?: $this->resolve_user();

        $new = $model->getDirty();
        $old = $model->getOriginal();
        // Check if changes has been made on the model.
        $changes = $this->diff($old, $new);
        if (count($changes) > 0) {
            foreach ($changes as $change) {
                $this->create_audit($model, $user, $change);
            }
        }

        return null;
    }

    public function create_audit($model, $user, $change)
    {
        $audit = new Audit();
        $audit->set_auditor($user);
        $audit->set_auditable($model);
        $audit->set_old_value($change['old']);
        $audit->set_new_value($change['new']);
        $audit->save();

        return $audit;
    }
    public function diff(array $old, array $new)
    {
        $changes = [];

        foreach ($old as $key => $value) {
            if (array_key_exists($key, $new)) {
                $changes[$key] = [
                    'new' => $new[$key],
                    'old' => $old[$key],
                ];
            }
        }

        return $changes;
    }
}
