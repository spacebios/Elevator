<?php

/**
 * @author     M2E LTD Developers Team
 * @copyright  2011-2017 M2E LTD
 * @license    Any usage is forbidden
 */

declare(strict_types=1);

return [

    'preconfiguration' => [

        'params' => [],

        'handlers' => []
    ],

    'installation' => [

        'params' => [

            [
                'path' => '/configs/system/main/logger/default_streams/mongo/status/',
                'description' => 'Whether to log into the Mongo. (bool)',
                'is_required' => true
            ],
            [
                'path' => '/configs/system/main/logger/default_streams/mongo/collection_name/',
                'description' => 'Mongo collection name for logging. Required if mongo status true. (string)',
                'is_required' => false,
            ],
            [
                'path' => '/configs/system/main/logger/default_streams/mysql/status/',
                'description' => 'Whether to log into the MySql. (bool)',
                'is_required' => true,
            ],
            [
                'path' => '/configs/system/main/logger/default_streams/mysql/table_name/',
                'description' => 'MySql table name for logging. Required if mysql status true. (string)',
                'is_required' => false,
            ],
            [
                'path' => '/configs/system/main/logger/default_streams/file/status/',
                'description' => 'Whether to log into the FileSystem. (bool)',
                'is_required' => true,
            ],

            [
                'path' => '/configs/system/main/logger/streams/',
                'description' => 'List of other streams class for logging. (array of string)',
                'is_required' => false,
            ],

            [
                'path' => '/configs/system/main/register/storage/type/',
                'description' => 'Type of register storage. (mongo | mysql | file) (string)',
                'is_required' => true,
            ],

            [
                'path' => '/configs/system/main/register/storage/collection_name/',
                'description' => 'Collection name. (Required if storage type is mongo) (string)',
                'is_required' => false,
            ],

            [
                'path' => '/configs/system/main/register/storage/table_name/',
                'description' => 'Table name. (Required if storage type is mysql) (string)',
                'is_required' => false,
            ],

            [
                'path' => '/configs/system/main/register/storage/enable_cache/',
                'description' => 'Whether to enable the cache. (bool)',
                'is_required' => true,
            ],

            // ########################################

            [
                'path' => '/configs/system/resources/database/mysql/host/',
                'description' => 'MySql host. Required if use MySql. (string)',
                'is_required' => false,
            ],

            [
                'path' => '/configs/system/resources/database/mysql/port/',
                'description' => 'MySql port. Required if use MySql. (int)',
                'is_required' => false,
            ],

            [
                'path' => '/configs/system/resources/database/mysql/user/',
                'description' => 'MySql user. Required if use MySql. (string)',
                'is_required' => false,
            ],

            [
                'path' => '/configs/system/resources/database/mysql/password/',
                'description' => 'MySql password. Required if use MySql. (string)',
                'is_required' => false,
            ],

            [
                'path' => '/configs/system/resources/database/mysql/db_name/',
                'description' => 'MySql database name. Required if use MySql. (string)',
                'is_required' => false,
            ],

            // ########################################

            [
                'path' => '/configs/system/resources/database/mongo/host/',
                'description' => 'Mongo host. (string)',
                'is_required' => true,
            ],

            [
                'path' => '/configs/system/resources/database/mongo/port/',
                'description' => 'Mongo port. (int)',
                'is_required' => true,
            ],

            [
                'path' => '/configs/system/resources/database/mongo/db_name/',
                'description' => 'Mongo database name. (string)',
                'is_required' => true,
            ],

            [
                'path' => '/configs/system/resources/database/mongo/auth/mode/',
                'description' => 'Used or not used authorization to server. (bool)',
                'is_required' => true,
            ],

            [
                'path' => '/configs/system/resources/database/mongo/auth/db_name/',
                'description' => 'Mongo auth database name. Required if auth mode is true. (string)',
                'is_required' => false,
            ],

            [
                'path' => '/configs/system/resources/database/mongo/auth/user/',
                'description' => 'Mongo auth user. Required if auth mode is true. (string)',
                'is_required' => false,
            ],

            [
                'path' => '/configs/system/resources/database/mongo/auth/password/',
                'description' => 'Mongo auth password. Required if auth mode is true. (string)',
                'is_required' => false,
            ],

            // ########################################

            [
                'path' => '/configs/system/resources/cache/type/',
                'description' => 'Cache type. (file, memcached) (string)',
                'is_required' => true,
            ],

            [
                'path' => '/configs/system/resources/cache/prefix/',
                'description' => 'Cache prefix. (string)',
                'is_required' => true,
            ],

            [
                'path' => '/configs/system/resources/cache/file/directory_level_deep/',
                'description' => 'Cache directory level deep. Require if type is File. (int)',
                'is_required' => false,
            ],

            [
                'path' => '/configs/system/resources/cache/memcached/host/',
                'description' => 'Memcached host. Require if type is memcached. (string)',
                'is_required' => false,
            ],

            [
                'path' => '/configs/system/resources/cache/memcached/port/',
                'description' => 'Memcached port. Require if type is memcached. (int)',
                'is_required' => false,
            ],

            // ########################################

            [
                'path' => '/configs/system/resources/file_system/folder_vars/create_permissions/file/',
                'description' => 'Permissions for created files in vars directory. (int)',
                'is_required' => true,
            ],

            [
                'path' => '/configs/system/resources/file_system/folder_vars/create_permissions/directory/',
                'description' => 'Permissions for created directories in vars directory. (int)',
                'is_required' => true,
            ],

            // ########################################

            [
                'path' => '/configs/system/resources/monitoring/sender/zabbix/server/',
                'description' => 'Zabbix server address. (string)',
                'is_required' => false,
            ],

            [
                'path' => '/configs/system/resources/monitoring/sender/zabbix/port/',
                'description' => 'Server port. (int)',
                'is_required' => false,
            ],

            [
                'path' => '/configs/system/resources/monitoring/sender/zabbix/self_host_name/',
                'description' => 'Self host name. (string)',
                'is_required' => false,
            ],

        ],


        'handlers' => [
            [
                'modificator' => \M2ePro\Application\Core\Setup\Installation\CreateConfig\Modificator::class
            ],
            [
                'modificator' => \M2ePro\Application\Core\Setup\Installation\DatabaseStructure\Modificator::class
            ],
            [
                'modificator' => \M2ePro\Application\Core\Setup\Installation\FoldersCreation\Modificator::class
            ]
        ]
    ],

    'upgrade' => []
];
