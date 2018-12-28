<?php

/**
 * @author     M2E LTD Developers Team
 * @copyright  2011-2018 M2E LTD
 * @license    Any usage is forbidden
 */

declare(strict_types=1);

namespace M2ePro\Application\Skeleton\ArchitectureValidation\Sniffs;

class Bootstrap extends BaseAbstract
{
    private const FILE_PATH  = 'bootstrap.php';
    private const ISSUE_TYPE = 'bootstrap';

    private const TASK_POSITION_BEFORE = 'before';
    private const TASK_POSITION_AFTER  = 'after';

    /** @var \M2ePro\Library\DataManipulation\ArrayWrapper\Factory */
    private $arrayWrapperFactory = null;

    /** @var \M2ePro\Library\FileSystem\File\Php\Factory */
    private $phpFileFactory = null;

    // ########################################

    public function __construct(
        \M2ePro\Library\DataManipulation\ArrayWrapper\Factory $arrayWrapperFactory,
        \M2ePro\Library\FileSystem\File\Php\Factory $phpFileFactory
    ) {
        $this->arrayWrapperFactory = $arrayWrapperFactory;
        $this->phpFileFactory      = $phpFileFactory;
    }

    // ########################################

    public function process(): void
    {
        $data = $this->getData();

        if ($data->has('/di_configurator/')) {
            if (!$this->getStringValidator()->isNotEmpty($data->get('/di_configurator/'))) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    "Key 'di_configurator' must be a not empty string.",
                    ['data' => $data]
                );
            }
        }

        if (!$data->has('/tasks/')) {
            $this->addIssue(
                self::ISSUE_TYPE,
                'Tasks is not found.',
                ['data' => $data]
            );

            return;
        }

        $tasks = $data->get('/tasks/');
        if (!$this->getArrayValidator()->is($tasks)) {
            $this->addIssue(
                self::ISSUE_TYPE,
                'Tasks must be an array.',
                ['data' => $data]
            );

            return;
        }

        foreach ($tasks as $task) {
            $this->validateTask($task);
        }
    }

    private function validateTask($task)
    {
        $validator = $this->createParamsValidator(['task' => $task]);

        if (!$validator->isArray('/task/')) {
            $this->addIssue(
                self::ISSUE_TYPE,
                'Task must be an array.',
                ['task' => $task]
            );

            return;
        }

        if (!$validator->isNotEmptyString('/task/class/')) {
            $this->addIssue(
                self::ISSUE_TYPE,
                'Tasks class must be a not empty string.',
                ['task' => $task]
            );
        }

        if ($validator->isExist('/task/position/')) {
            if ($task['position'] !== self::TASK_POSITION_BEFORE &&
                $task['position'] !== self::TASK_POSITION_AFTER) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    "Undefined position '{$task['position']}'.",
                    ['task' => $task]
                );
            }
        }

        if ($validator->isExist('/task/relatively/') && !$validator->isNotEmptyString('/task/relatively/')) {
            $this->addIssue(
                self::ISSUE_TYPE,
                "Task key 'relatively' must be a not empty string.",
                ['task' => $task]
            );
        }
    }

    // ########################################

    private function getData(): \M2ePro\Library\DataManipulation\ArrayWrapper
    {
        $filePath = $this->rootPath . self::FILE_PATH;
        $file = $this->phpFileFactory->create($filePath);
        $data = $file->interpret();
        if (!is_array($data)) {
            throw new \M2ePro\Library\Exception\Logic("File '{$filePath}' is not valid.");
        }

        return $this->arrayWrapperFactory->create($data);
    }

    // ########################################
}
