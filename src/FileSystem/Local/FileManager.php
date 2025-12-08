<?php

declare(strict_types=1);

namespace Marshal\Utils\FileSystem\Local;

use League\Flysystem\Filesystem;
use League\Flysystem\Local\LocalFilesystemAdapter;

final class FileManager
{
    public function getTemplateContents(string $templateFileName): string
    {
        // get the directory and file
        $split = \explode('/', $templateFileName);
        $filename = \array_pop($split);
        $dir = \implode('/', $split);

        // create the filesystem adapter
        $adapter = new LocalFilesystemAdapter($dir);
        $filesystem = new Filesystem($adapter);

        // read the file
        $template = $filesystem->read($filename);
        if (! $template) {
            throw new \RuntimeException(\sprintf(
                "Template file %s not found",
                $templateFileName
            ));
        }

        return $this->parseResource($templateFileName, $template);
    }

    private function parseResource(string $resourceName, string $contents): string
    {
        if (
            false !== \mb_strpos($resourceName, '.json')
            || false !== \mb_strpos($resourceName, '.html')
            || false !== \mb_strpos($resourceName, '.twig')
        ) {
            return $contents;
        }

        throw new \RuntimeException(\sprintf(
            "Could not parse resource %s",
            $resourceName
        ));
    }
}
