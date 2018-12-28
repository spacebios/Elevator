<?php

/**
 * @author     M2E LTD Developers Team
 * @copyright  2011-2018 M2E LTD
 * @license    Any usage is forbidden
 */

declare(strict_types=1);

namespace M2ePro\Application\Skeleton\ArchitectureValidation\Sniffs;

abstract class BaseAbstract extends \M2ePro\DevOps\Architecture\Sniffer\Sniffer\BaseAbstract
{
    /** @var \M2ePro\Library\DataManipulation\ArrayDataValidator\Factory */
    private $arrayDataValidatorFactory = null;

    /** @var \M2ePro\Library\DataManipulation\Validation\ArrayValidator */
    private $arrayValidator = null;

    /** @var \M2ePro\Library\DataManipulation\Validation\BoolValidator */
    private $boolValidator = null;

    /** @var \M2ePro\Library\DataManipulation\Validation\CallableValidator */
    private $callableValidator = null;

    /** @var \M2ePro\Library\DataManipulation\Validation\NumberValidator */
    private $numberValidator = null;

    /** @var \M2ePro\Library\DataManipulation\Validation\ObjectValidator */
    private $objectValidator = null;

    /** @var \M2ePro\Library\DataManipulation\Validation\ResourceValidator */
    private $resourceValidator = null;

    /** @var \M2ePro\Library\DataManipulation\Validation\StringValidator */
    private $stringValidator = null;

    // ########################################

    public function _injectDependencies(
        \M2ePro\Library\DataManipulation\ArrayDataValidator\Factory $arrayDataValidatorFactory,
        \M2ePro\Library\DataManipulation\Validation\ArrayValidator $arrayValidator,
        \M2ePro\Library\DataManipulation\Validation\BoolValidator $boolValidator,
        \M2ePro\Library\DataManipulation\Validation\CallableValidator $callableValidator,
        \M2ePro\Library\DataManipulation\Validation\NumberValidator $numberValidator,
        \M2ePro\Library\DataManipulation\Validation\ObjectValidator $objectValidator,
        \M2ePro\Library\DataManipulation\Validation\ResourceValidator $resourceValidator,
        \M2ePro\Library\DataManipulation\Validation\StringValidator $stringValidator
    ) {
        $this->arrayDataValidatorFactory = $arrayDataValidatorFactory;
        $this->arrayValidator            = $arrayValidator;
        $this->boolValidator             = $boolValidator;
        $this->callableValidator         = $callableValidator;
        $this->numberValidator           = $numberValidator;
        $this->objectValidator           = $objectValidator;
        $this->resourceValidator         = $resourceValidator;
        $this->stringValidator           = $stringValidator;
    }

    // ########################################

    protected function createParamsValidator(array $params): \M2ePro\Library\DataManipulation\ArrayDataValidator
    {
        return $this->arrayDataValidatorFactory->create($params);
    }

    // ########################################

    protected function getArrayValidator(): \M2ePro\Library\DataManipulation\Validation\ArrayValidator
    {
        return $this->arrayValidator;
    }

    protected function getBoolValidator(): \M2ePro\Library\DataManipulation\Validation\BoolValidator
    {
        return $this->boolValidator;
    }

    protected function getCallableValidator(): \M2ePro\Library\DataManipulation\Validation\CallableValidator
    {
        return $this->callableValidator;
    }

    protected function getNumberValidator(): \M2ePro\Library\DataManipulation\Validation\NumberValidator
    {
        return $this->numberValidator;
    }

    protected function getObjectValidator(): \M2ePro\Library\DataManipulation\Validation\ObjectValidator
    {
        return $this->objectValidator;
    }

    protected function getResourceValidator(): \M2ePro\Library\DataManipulation\Validation\ResourceValidator
    {
        return $this->resourceValidator;
    }

    protected function getStringValidator(): \M2ePro\Library\DataManipulation\Validation\StringValidator
    {
        return $this->stringValidator;
    }

    // ########################################
}
