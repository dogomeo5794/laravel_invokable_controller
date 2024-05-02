<?php

namespace App\Traits;

trait RequestHelpers
{
    public function uuid(): string
    {
        return $this->route("uuid");
    }

    public function updateAuthorization(): bool
    {
        $user = authenticatedUser();

        if ($this->isAdminUser()) {
            return true;
        }

        return $this->uuid() == $user->uuid;
    }

    public function isAdminUser(): bool
    {
        $user = authenticatedUser();

        return $user->isAdmin();
    }

    public function isMerchantUser(): bool
    {
        $user = authenticatedUser();

        return $user->isMerchant();
    }
}
