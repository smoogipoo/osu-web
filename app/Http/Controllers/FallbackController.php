<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

namespace App\Http\Controllers;

class FallbackController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        if (is_api_request()) {
            $this->middleware('api');
        } else {
            $this->middleware('web');
        }

        app('route-section')->setError(404);
    }

    public function index()
    {
        if (is_api_request()) {
            return response([], 404);
        }

        return ext_view('layout.error', ['statusCode' => 404], 'html', 404);
    }
}
