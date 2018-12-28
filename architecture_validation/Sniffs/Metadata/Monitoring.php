<?php

/**
 * @author     M2E LTD Developers Team
 * @copyright  2011-2018 M2E LTD
 * @license    Any usage is forbidden
 */

declare(strict_types=1);

namespace M2ePro\Application\Skeleton\ArchitectureValidation\Sniffs\Metadata;

class Monitoring extends BaseAbstract
{
    // ########################################

    public function process()
    {
        $data = $this->getData();
        if ($data->has('/monitoring/criteria/')) {
            $criteria = $data->get('/monitoring/criteria/');

            $criteriaValidator = $this->createParamsValidator(['criteria' => $criteria]);
            if (!$criteriaValidator->isArray('/criteria/')) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    'Criteria not contains array value.',
                    ['criteria' => $criteria]
                );
                return;
            }

            foreach ($criteria as $name => $criterion) {
                $validator = $this->createParamsValidator($criterion);

                if (!$validator->isArray('/properties/')) {
                    $this->addIssue(
                        self::ISSUE_TYPE,
                        'Properties of criterion must be an array.',
                        ['criterion' => $criterion]
                    );
                }

                if (!$validator->isNotEmptyString('/handler/')) {
                    $this->addIssue(
                        self::ISSUE_TYPE,
                        'Handler of criterion must be a not empty string.',
                        ['criterion' => $criterion]
                    );
                    continue;
                }

                if (!is_subclass_of(
                    $criterion['handler'],
                    \M2ePro\Application\Core\Monitoring\Criterion\Handler\BaseAbstract::class
                )
                ) {
                    $this->addIssue(
                        'implementation',
                        'Handler must implement the abstract criterion handler class.',
                        ['criterion_name' => $name]
                    );
                }
            }
        }
    }

    // ########################################
}
