<?php

namespace Audit\Interfaces;

interface AuditableObjectInterface
{
    public function getAuditableIdKey();
    public function getAuditableId();
    public function getAuditableType();
}
