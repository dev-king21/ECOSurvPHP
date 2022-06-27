<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'http://localhost/user/*/associate',
        'http://localhost/park/*/breed',
        'http://localhost/breed/random',
        'http://localhost/breed/*/data'

    ];
}
