<?php

/**
 * @author    M2E LTD Developers Team
 * @copyright 2011-2018 M2E LTD
 * @license   Any usage is forbidden
 */

declare(strict_types=1);

namespace M2ePro\Application\Skeleton\ArchitectureValidation\Sniffs\Metadata;

class EventsManagement extends BaseAbstract
{
    // ########################################

    public function process()
    {
        $data = $this->getData();

        if (!$data->has('/events_management/observers/')) {
            return;
        }

        $observersData = $data->get('/events_management/observers/');

        foreach ($observersData as $observerData) {
            if (!$this->getArrayValidator()->is($observerData)) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    'Observer data must be an array.',
                    ['observer_data' => $observerData]
                );
            }

            if (!isset($observerData['name'])) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    'Observer name is not defined.',
                    ['observer_data' => $observerData]
                );
            }

            if (!$this->getStringValidator()->is($observerData['name'])) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    'Observer name is not valid.',
                    ['observer_data' => $observerData]
                );
            }

            if (isset($observerData['events'])
                && !$this->getArrayValidator()->isNotEmpty($observerData['events'])) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    'Events must be an array with at least one item.',
                    ['observer_data' => $observerData]
                );
            }
        }
    }

    // ########################################
}
