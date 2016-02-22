<?php
/**
 * The manifest of files that are local to specific environment.
 * This file returns a list of environments that the application
 * may be installed under. The returned data must be in the following
 * format:
 *
 * ```php
 * return [
 *     'environment name' => [
 *         'path' => 'directory storing the local files',
 *         'skipFiles'  => [
 *             // list of files that should only copied once and skipped if they already exist
 *         ],
 *         'setWritable' => [
 *             // list of directories that should be set writable
 *         ],
 *         'setExecutable' => [
 *             // list of files that should be set executable
 *         ],
 *         'setCookieValidationKey' => [
 *             // list of config files that need to be inserted with automatically generated cookie validation keys
 *         ],
 *         'createSymlink' => [
 *             // list of symlinks to be created. Keys are symlinks, and values are the targets.
 *         ],
 *     ],
 * ];
 * ```
 */
return [
    'Development' => [
        'path' => 'dev',
        'setWritable' => [
            'protected/backend/runtime',
            'protected/frontend/runtime',
            'protected/frontend/runtime/mail',
            'protected/api/runtime',	// added sjg
            '/assets',
            '/uploads',
            '/backend/assets',
            '/api/assets',	// added sjg
        ],
        'setExecutable' => [
            'protected/yii',
            'tests/codeception/bin/yii',
        ],
        'setCookieValidationKey' => [
            'protected/backend/config/main-local.php',
            'protected/frontend/config/main-local.php',
            'protected/api/config/main-local.php',	// added sjg
        ],
    ],
    'Production' => [
        'path' => 'prod',
        'setWritable' => [
            'protected/backend/runtime',
            'protected/frontend/runtime',
            'protected/api/runtime',	// added sjg
            '/assets',
            '/backend/assets',
            '/api/assets',
        ],
        'setExecutable' => [
            'protected/yii',
            'protected/frontend/runtime/mail',
        ],
        'setCookieValidationKey' => [
            'protected/backend/config/main-local.php',
            'protected/frontend/config/main-local.php',
            'protected/api/config/main-local.php',	// added sjg
        ],
    ],
];
