<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/jobs' => [[['_route' => 'app_jobs_view', '_controller' => 'App\\Controller\\JobsController::read'], null, ['GET' => 0], null, false, false, null]],
        '/jobs/create' => [[['_route' => 'app_jobs_index', '_controller' => 'App\\Controller\\JobsController::create'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/jobs/(?'
                    .'|delete/([^/]++)(*:66)'
                    .'|update/([^/]++)(*:88)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        66 => [[['_route' => 'app_jobs_delete', '_controller' => 'App\\Controller\\JobsController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        88 => [
            [['_route' => 'app_jobs_update', '_controller' => 'App\\Controller\\JobsController::update'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
