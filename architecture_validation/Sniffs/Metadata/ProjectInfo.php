<?php

/**
 * @author    M2E LTD Developers Team
 * @copyright 2011-2018 M2E LTD
 * @license   Any usage is forbidden
 */

declare(strict_types=1);

namespace M2ePro\Application\Skeleton\ArchitectureValidation\Sniffs\Metadata;

class ProjectInfo extends BaseAbstract
{
    // ########################################

    public function process()
    {
        $data = $this->getData();

        if (!$data->has('/project_name/')) {
            $this->addIssue(
                self::ISSUE_TYPE,
                'Project name is not found.'
            );
            return;
        }

        $name = $data->get('/project_name/');
        if (!$this->getStringValidator()->is($name)) {
            $this->addIssue(
                self::ISSUE_TYPE,
                'Project name must be a string.',
                ['name' => $name]
            );
        }
    }

    // ########################################
}