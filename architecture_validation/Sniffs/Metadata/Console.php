<?php

/**
 * @author     M2E LTD Developers Team
 * @copyright  2011-2018 M2E LTD
 * @license    Any usage is forbidden
 */

declare(strict_types=1);

namespace M2ePro\Application\Skeleton\ArchitectureValidation\Sniffs\Metadata;

class Console extends BaseAbstract
{
    // ########################################

    public function process()
    {
        $data = $this->getData();

        if (!$data->has('/console/service/commands/')) {
            return;
        }

        foreach ($data->get('/console/service/commands/') as $commandName => $commandData) {
            if (!$this->getStringValidator()->isNotEmpty($commandName)) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    'Command name must be a not empty string.',
                    ['command_name' => $commandName]
                );
            }

            $this->validateCommandData($commandData);
        }
    }

    // ########################################

    private function validateCommandData(array $commandData)
    {
        $validator = $this->createParamsValidator($commandData);

        if (!$validator->isNotEmptyString('/handler/')) {
            $this->addIssue(
                self::ISSUE_TYPE,
                'Handler must be a not empty string.',
                ['command' => $commandData]
            );
        }

        if (!$validator->isNotEmptyString('/description/')) {
            $this->addIssue(
                self::ISSUE_TYPE,
                'Description must be a not empty string.',
                ['command' => $commandData]
            );
        }

        if (!$validator->isNotEmptyString('/help/')) {
            $this->addIssue(
                self::ISSUE_TYPE,
                'Help must be a not empty string.',
                ['command' => $commandData]
            );
        }

        if ($validator->isExist('/arguments/')) {
            if (!$validator->isNotEmptyArray('/arguments/')) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    'Arguments must be a not empty array.',
                    ['command' => $commandData]
                );

                return;
            }

            foreach ($commandData['arguments'] as $argument) {
                $this->validateArgument($argument);
            }
        }

        if ($validator->isExist('/options/')) {
            if (!$validator->isNotEmptyArray('/options/')) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    'Options must be a not empty array.',
                    ['command' => $commandData]
                );

                return;
            }

            foreach ($commandData['options'] as $option) {
                $this->validateOption($option);
            }
        }

        if ($validator->isExist('/flags/')) {
            if (!$validator->isNotEmptyArray('/flags/')) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    'Flags must be a not empty array.',
                    ['command' => $commandData]
                );

                return;
            }

            foreach ($commandData['flags'] as $flag) {
                $this->validateFlag($flag);
            }
        }

        if ($validator->isExist('/validators/')) {
            if ($validator->isNotEmptyStringInArray('/validators/')) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    'Validators must be a not empty array with string values.',
                    ['command' => $commandData]
                );
            }
        }

        if ($validator->isExist('/maintenance_mode/')) {
            $maintenanceMode = $commandData['maintenance_mode'];

            if ($maintenanceMode != \M2ePro\Application\Core\Console\Service\Command\MaintenanceMode::ANY &&
                $maintenanceMode != \M2ePro\Application\Core\Console\Service\Command\MaintenanceMode::ONLY_DISABLED &&
                $maintenanceMode != \M2ePro\Application\Core\Console\Service\Command\MaintenanceMode::ONLY_ENABLED) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    'Maintenance mode allowed values: ' . implode(', ', [
                        \M2ePro\Application\Core\Console\Service\Command\MaintenanceMode::ANY,
                        \M2ePro\Application\Core\Console\Service\Command\MaintenanceMode::ONLY_DISABLED,
                        \M2ePro\Application\Core\Console\Service\Command\MaintenanceMode::ONLY_ENABLED,
                    ]),
                    ['command' => $commandData]
                );
            }
        }
    }

    private function validateArgument($argument)
    {
        $validator = $this->createParamsValidator(['argument' => $argument]);

        if (!$validator->isNotEmptyArray('/argument/')) {
            $this->addIssue(
                self::ISSUE_TYPE,
                'Argument must be a not empty array.',
                ['argument' => $argument]
            );
        }

        if (!$validator->isNotEmptyString('/argument/name/')) {
            $this->addIssue(
                self::ISSUE_TYPE,
                'Argument name must be a not empty string.',
                ['argument' => $argument]
            );
        }

        if ($validator->isExist('/argument/description/')) {
            if (!$validator->isNotEmptyString('/argument/description/')) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    'Argument description must be a not empty string.',
                    ['argument' => $argument]
                );
            }
        }

        if ($validator->isExist('/argument/is_required/')) {
            if (!$validator->isBool('/argument/is_required/')) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    "Argument param 'is_required' must be a boolean.",
                    ['argument' => $argument]
                );
            }
        }

        if ($validator->isExist('/argument/default/')) {
            if (!$validator->isNotEmptyString('/argument/default/') &&
                !$validator->isNotZeroNumber('/argument/default/') &&
                !$validator->isNull('/argument/default/')) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    "Argument param 'default' must be a not empty string or not empty number or null.",
                    ['argument' => $argument]
                );
            }
        }

        if ($validator->isExist('/argument/allowed_values/')) {
            if (!$validator->isNotEmptyArray('/argument/allowed_values/')) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    "Argument allowed values must be a not empty array.",
                    ['argument' => $argument]
                );
            }
        }

        if ($validator->isExist('/argument/type/')) {
            if (!$validator->isNotEmptyString('/option/type/')) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    "Argument type must be a not empty string.",
                    ['argument' => $argument]
                );
            }

            if (!in_array($argument['type'], [
                \M2ePro\Framework\Console\Command\Definition\Type::ARRAY,
                \M2ePro\Framework\Console\Command\Definition\Type::BOOLEAN,
                \M2ePro\Framework\Console\Command\Definition\Type::ENUM,
                \M2ePro\Framework\Console\Command\Definition\Type::STRING,
                \M2ePro\Framework\Console\Command\Definition\Type::NUMERIC
            ])) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    "Argument type must be one of: string, enum, array, boolean, numeric, string.",
                    ['argument' => $argument]
                );
            }
        }
    }

    private function validateFlag($flag)
    {
        $validator = $this->createParamsValidator(['flag' => $flag]);

        if (!$validator->isNotEmptyArray('/flag/')) {
            $this->addIssue(
                self::ISSUE_TYPE,
                'Flag must be a not empty array.',
                ['flag' => $flag]
            );
        }

        if (!$validator->isNotEmptyString('/flag/full_name/')) {
            $this->addIssue(
                self::ISSUE_TYPE,
                'Flag full name must be a not empty string.',
                ['flag' => $flag]
            );
        }

        if ($validator->isExist('/flag/short_name/')) {
            if (!$validator->isNotEmptyString('/flag/short_name/')) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    'Flag short name must be a not empty string.',
                    ['flag' => $flag]
                );
            }
        }

        if ($validator->isExist('/flag/description/')) {
            if (!$validator->isNotEmptyString('/flag/description/')) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    'Flag description must be a not empty string.',
                    ['flag' => $flag]
                );
            }
        }
    }

    private function validateOption($option)
    {
        $validator = $this->createParamsValidator(['option' => $option]);

        if (!$validator->isNotEmptyArray('/option/')) {
            $this->addIssue(
                self::ISSUE_TYPE,
                'Option must be a not empty array.',
                ['option' => $option]
            );
        }

        if (!$validator->isNotEmptyString('/option/full_name/')) {
            $this->addIssue(
                self::ISSUE_TYPE,
                'Option full name must be a not empty string.',
                ['option' => $option]
            );
        }

        if ($validator->isExist('/option/short_name/')) {
            if (!$validator->isNotEmptyString('/option/short_name/')) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    'Option short name must be a not empty string.',
                    ['option' => $option]
                );
            }
        }

        if ($validator->isExist('/option/description/')) {
            if (!$validator->isNotEmptyString('/option/description/')) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    'Option description must be a not empty string.',
                    ['option' => $option]
                );
            }
        }

        if ($validator->isExist('/option/is_required/')) {
            if (!$validator->isBool('/option/is_required/')) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    "Option param 'is_required' must be a boolean.",
                    ['option' => $option]
                );
            }
        }

        if ($validator->isExist('/option/default/')) {
            if (!$validator->isNotEmptyString('/option/default/') &&
                !$validator->isNotZeroNumber('/option/default/') &&
                !$validator->isNull('/option/default/')) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    "Option param 'default' must be a not empty string or not empty number or null.",
                    ['option' => $option]
                );
            }
        }

        if ($validator->isExist('/option/allowed_values/')) {
            if (!$validator->isNotEmptyArray('/option/allowed_values/')) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    "Option allowed values must be a not empty array.",
                    ['option' => $option]
                );
            }
        }

        if ($validator->isExist('/option/type/')) {
            if (!$validator->isNotEmptyString('/option/type/')) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    "Option type must be a not empty string.",
                    ['option' => $option]
                );
            }

            if (!in_array($option['type'], [
                \M2ePro\Framework\Console\Command\Definition\Type::ARRAY,
                \M2ePro\Framework\Console\Command\Definition\Type::BOOLEAN,
                \M2ePro\Framework\Console\Command\Definition\Type::ENUM,
                \M2ePro\Framework\Console\Command\Definition\Type::STRING,
                \M2ePro\Framework\Console\Command\Definition\Type::NUMERIC
            ])) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    "Option type must be one of: string, enum, array, boolean, numeric, string.",
                    ['option' => $option]
                );
            }
        }
    }

    // ########################################
}
