<?php

/**
 * @author     M2E LTD Developers Team
 * @copyright  2011-2018 M2E LTD
 * @license    Any usage is forbidden
 */

declare(strict_types=1);

namespace M2ePro\Building\Tasks;

class ExecutedCodeHashGenerator extends \M2ePro\DevOps\Building\Engine\Task\BaseAbstract
{
    private const FILE_PATH = 'executed_files_hashes.json';

    /** @var \M2ePro\Library\FileSystem\Manager */
    private $fileSystemManager = null;

    // ########################################

    public function __construct(\M2ePro\Library\FileSystem\Manager $fileSystemManager)
    {
        $this->fileSystemManager = $fileSystemManager;
    }

    // ########################################

    public function process()
    {
        $allFilesPaths = [];

        $directoriesPaths = [
            $this->rootPath . 'bin',
            $this->rootPath . 'data',
            $this->rootPath . 'setup',
            $this->rootPath . 'src',
            $this->rootPath . 'vendor',
        ];

        foreach ($directoriesPaths as $directoryPath) {
            $this->getDirectoryFiles($directoryPath, $allFilesPaths);
        }

        $allFilesPaths[] = $this->rootPath . 'bootstrap.php';
        $allFilesPaths[] = $this->rootPath . 'layer_info.php';
        $allFilesPaths[] = $this->rootPath . 'metadata.php';

        $filesHashes = [];
        foreach ($allFilesPaths as $filePath) {
            $key               = substr($filePath, strlen($this->rootPath));
            $filesHashes[$key] = hash_file('sha256', $filePath);
        }

        $this->saveDataToFile($filesHashes);
    }

    // ########################################

    private function getDirectoryFiles(string $directoryPath, array &$results = []): void
    {
        $directory = $this->fileSystemManager->getDirectory($directoryPath);
        $directoryItems = $this->fileSystemManager->getDirectoryItems($directory);

        foreach ($directoryItems as $directoryItem) {
            if ($directoryItem->isFile()) {
                $results[] = $directoryItem->getPath();
            } else {
                $this->getDirectoryFiles($directoryItem->getPath(), $results);
            }
        }
    }

    // ########################################

    private function saveDataToFile(array $data): void
    {
        $absoluteFilePath = $this->rootPath . self::FILE_PATH;
        if ($this->fileSystemManager->isFileExist($absoluteFilePath)) {
            throw new \M2ePro\Library\Exception\Logic("Info file '{$absoluteFilePath}' is already exist.");
        }

        $this->fileSystemManager->createFile($absoluteFilePath);
        $file = $this->fileSystemManager->getFile($absoluteFilePath);
        $file->writeData(json_encode($data));
    }

    // ########################################
}
