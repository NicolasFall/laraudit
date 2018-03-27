<?php

namespace Audit\Interfaces;

interface AuditorInterface
{
    public function getAuditorIdKey();
    public function getAuditorId();
    public function getAuditorType();
}
