<?php

/**
 * @author     M2E LTD Developers Team
 * @copyright  2011-2018 M2E LTD
 * @license    Any usage is forbidden
 */

declare(strict_types=1);

namespace M2ePro\Application\Skeleton\ArchitectureValidation\Sniffs\Metadata;

abstract class BaseAbstract extends \M2ePro\Application\Skeleton\ArchitectureValidation\Sniffs\BaseAbstract implements
    \M2ePro\Library\DataManipulation\ArrayWrapper\Factory\AwareInterface,
    \M2ePro\Library\FileSystem\File\Php\Factory\AwareInterface
{
    protected const ISSUE_TYPE = 'metadata';
    private const FILE_PATH    = 'metadata.php';

    /** @var \M2ePro\Library\DataManipulation\ArrayWrapper\Factory */
    private $arrayWrapperFactory = null;

    /** @var \M2ePro\Library\FileSystem\File\Php\Factory */
    private $phpFileFactory = null;

    // ########################################

    protected function getData(): \M2ePro\Library\DataManipulation\ArrayWrapper
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

    public function setArrayWrapperFactory(\M2ePro\Library\DataManipulation\ArrayWrapper\Factory $arrayWrapperFactory)
    {
        $this->arrayWrapperFactory = $arrayWrapperFactory;
    }

    public function setPhpFileFactory(\M2ePro\Library\FileSystem\File\Php\Factory $factory): void
    {
        $this->phpFileFactory = $factory;
    }

    // ########################################
}
