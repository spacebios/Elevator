<?php

/**
 * @author     M2E LTD Developers Team
 * @copyright  2011-2018 M2E LTD
 * @license    Any usage is forbidden
 */

declare(strict_types=1);

namespace M2ePro\Application\Skeleton\ArchitectureValidation\Sniffs\Metadata;

class Cron extends BaseAbstract
{
    // ########################################

    public function process(): void
    {
        $data = $this->getData();

        if (!$data->has('/cron/tasks/')) {
            return;
        }

        $tasksData = $data->get('/cron/tasks/');

        $validator = $this->createParamsValidator(['tasks' => $tasksData]);

        if (!$validator->isArray('/tasks/')) {
            $this->addIssue(
                self::ISSUE_TYPE,
                'Tasks not contains array value.',
                ['tasks_data' => $tasksData]
            );

            return;
        }

        foreach ($tasksData as $nick => $taskData) {
            $this->checkTask($nick, $taskData);
        }
    }

    // ########################################

    private function checkTask($nick, $data)
    {
        if (!$this->getStringValidator()->isNotEmpty($nick)) {
            $this->addIssue(
                self::ISSUE_TYPE,
                'Task nick not contains non empty string value.',
                ['nick' => $nick]
            );
        }

        $validator = $this->createParamsValidator(['task' => $data]);

        if (!$validator->isArray('/task/')) {
            $this->addIssue(
                self::ISSUE_TYPE,
                'Task not contains non empty array value.',
                ['task_data' => $data]
            );

            return;
        }

        if (!$validator->isNotEmptyString('/task/handler/')) {
            $this->addIssue(
                self::ISSUE_TYPE,
                'Task handler not contains non empty string value.',
                ['task_data' => $data]
            );
            return;
        }

        if ($validator->isExist('/task/factory/')
            && !$validator->isNotEmptyString('/task/factory/')) {
            $this->addIssue(
                self::ISSUE_TYPE,
                'Task handler factory not contains non empty string value.',
                ['task_data' => $data]
            );

            return;
        }

        if ($validator->isExist('/task/interval/') && !$validator->isInteger('/task/interval/')) {
            $this->addIssue(
                self::ISSUE_TYPE,
                'Task interval contains not integer value.',
                ['task_data' => $data]
            );
            return;
        }
    }

    // ########################################
}
