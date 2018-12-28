<?php

/**
 * @author     M2E LTD Developers Team
 * @copyright  2011-2018 M2E LTD
 * @license    Any usage is forbidden
 */

declare(strict_types=1);

namespace M2ePro\Application\Skeleton\ArchitectureValidation\Sniffs;

class Layer extends BaseAbstract
{
    private const FILE_PATH  = 'layer.php';
    private const ISSUE_TYPE = 'layer';

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

        if (!$data->has('/middle_layers_root_paths/')) {
            return;
        }

        $middleLayersRootPaths = $data->get('/middle_layers_root_paths/');

        if (!$this->getArrayValidator()->is($middleLayersRootPaths)) {
            $this->addIssue(
                self::ISSUE_TYPE,
                'Middle layers root paths must be an array.',
                ['data' => $data]
            );
        }

        if ($this->getArrayValidator()->isNotEmpty($middleLayersRootPaths)) {
            if (!$this->getArrayValidator()->isNotEmptyStringInArray($middleLayersRootPaths)) {
                $this->addIssue(
                    self::ISSUE_TYPE,
                    'Middle layer root path must be a not empty string.',
                    ['data' => $data]
                );
            }
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
