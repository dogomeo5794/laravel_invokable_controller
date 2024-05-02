<?php

if (! function_exists("authenticatedUser")) {
    function authenticatedUser(): \App\Models\User
    {
        return auth()->user();
    }
}

if (! function_exists("isAuthenticated")) {
    function isAuthenticated(): bool
    {
        return auth()->check();
    }
}
