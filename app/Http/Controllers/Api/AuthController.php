<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\V1\AuthController as VersionedAuthController;

/**
 * Backward-compatible alias for the unversioned API routes.
 */
class AuthController extends VersionedAuthController {}
