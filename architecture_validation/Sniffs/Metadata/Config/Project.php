<?php

/**
 * @author     M2E LTD Developers Team
 * @copyright  2011-2018 M2E LTD
 * @license    Any usage is forbidden
 */

declare(strict_types=1);

namespace M2ePro\Application\Skeleton\ArchitectureValidation\Sniffs\Metadata\Config;

class Project extends \M2ePro\Application\Skeleton\ArchitectureValidation\Sniffs\Metadata\BaseAbstract
{
    // ########################################

    public function process()
    {
        $data = $this->getData();

        $allFiles = [];

        if (!$data->has('/config/files/')) {
            return;
        }

        $configFiles = $data->get('/config/files/');
        if (!$this->getArrayValidator()->is($configFiles)) {
            $this->addIssue(
                self::ISSUE_TYPE,
                "Parameter '/config/files/' must be an array.",
                ['configs_files' => $configFiles]
            );
            return;
        }

        foreach ($configFiles as $configFile) {
            $validator = $this->createParamsValidator(['config_file' => $configFile]);

            if ($validator->isExist('/config_file/key_prefix/')
                && !$validator->isNotEmptyString('/config_file/key_prefix/')
                && $validator->isNotNull('/config_file/key_prefix/')
            ) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    'Configs key prefix must be a not empty string or null.',
                    ['key_prefix' => $configFile['key_prefix']]
                );
                continue;
            }

            if (!$validator->isNotEmptyString('/config_file/path/')) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    'Config file path must be a non empty string.',
                    ['data' => $configFile]
                );
                continue;
            }

            if (in_array($configFile['path'], $allFiles)) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    'Config file path is duplicated.',
                    ['file_path' => $configFile['path']]
                );
            }

            $allFiles[] = $configFile['path'];
        }
    }

    // ########################################
}
