<?php

namespace App\Services;


use Carbon\Carbon;
use Dflydev\ApacheMimeTypes\PhpRepository;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadsManager
{
    protected $disk;
    protected $mimeDetect;

    public function __construct(PhpRepository $mimeDetect)
    {
        $this->disk = Storage::disk(config('blog.uploads.storage'));
        $this->mimeDetect = $mimeDetect;
    }

    /**
     * Return files and directories within a folder
     *
     * Returns an array of 'folder', 'folderName', 'breadcrumbs', 'folders', 'files'.
     *
     * @param $folder String
     * @return array
     */
    public function folderInfo($folder)
    {
        $folder = $this->cleanFolder($folder);

        $breadcrumbs = $this->breadcrumbs($folder);
        $slice = array_slice($breadcrumbs, -1);
        $folderName = current($slice);
        $breadcrumbs = array_slice($breadcrumbs, 0, -1);

        $subfolders = [];


        foreach (array_unique($this->disk->directories($folder)) as $subfolder) {
            $subfolders["/$subfolder"] = basename($subfolder);
        }

        $files = [];
        foreach ($this->disk->files($folder) as $path) {
            $files[] = $this->fileDetails($path);
        }

        return compact(
            'folder',
            'folderName',
            'breadcrumbs',
            'subfolders',
            'files'
        );
    }

    /**
     * Return the full web path to a file
     *
     * @param $path String
     * @return string
     */
    public function fileWebpath($path)
    {
        $path = rtrim(config('blog.uploads.webpath'), '/') . '/' . ltrim($path, '/');

        return url($path);
    }

    /**
     * Return the mime type
     *
     * @param $path String
     * @return boolean
     */
    public function fileMimeType($path)
    {
        return $this->mimeDetect->findType(
            pathinfo($path, PATHINFO_EXTENSION)
        );
    }

    /**
     * Return the file size
     *
     * @param $path String
     * @return mixed
     */
    public function fileSize($path)
    {
        return $this->disk->size($path);
    }

    /**
     * @param $path string
     * @return Carbon
     */
    public function fileModified($path)
    {
        return Carbon::createFromTimestamp(
            $this->disk->lastModified($path)
        );
    }

    /**
     * Create a directory if it does not already exist
     *
     * @param $folder string
     * @return string
     */
    public function createDirectory($folder)
    {
        $folder = $this->cleanFolder($folder);

        if ($this->disk->exists($folder)) {
            return "Folder '$folder' already exists.";
        }

        return $this->disk->makeDirectory($folder);
    }

    /**
     * Delete a directory - but, only if it is empty
     *
     * @param $folder String
     * @return string
     */
    public function deleteDirectory($folder)
    {
        $folder = $this->cleanFolder($folder);

        $filesFolders = array_merge(
            $this->disk->directories($folder),
            $this->disk->files($folder)
        );

        if (!empty($filesFolders)) {
            return 'Directory must be empty to delete it.';
        }

        return $this->disk->deleteDirectory($folder);
    }

    /**
     * Delete a file
     *
     * @param $path string
     * @return string
     */
    public function deleteFile($path)
    {
        $path = $this->cleanFolder($path);

        if (!$this->disk->exist($path)) {
            return 'File does not exist.';
        }

        return $this->disk->delete($path);
    }

    /**
     * Save a file
     *
     * @param $file UploadedFile
     * @param $path string
     * @param $filename string
     * @return string
     */
    public function saveFile(UploadedFile $file, $path, $filename)
    {
        $path = $this->cleanFolder($path);
        $path = $path . '/' . $filename;

        if ($this->disk->exists($path)) {
            return 'File already exists.';
        }

        return $this->disk->put( $path, $file );
    }

    /**
     * Sanitize the folder name
     *
     * @param $folder String
     * @return String
     */
    protected function cleanFolder($folder)
    {
        return '/' . trim(str_replace('..', '', $folder), '/');
    }

    /**
     *  Return breadcrumbs to current folder
     */
    protected function breadcrumbs($folder)
    {
        $folder = trim($folder, '/');
        $crumbs = ['/' => 'root'];

        if (empty($folder)) {
            return $crumbs;
        }

        $folders = explode('/', $folder);
        $build = '';

        foreach ($folders as $folder) {
            $build .= '/' . $folder;
            $crumbs[$build] = $folder;
        }

        return $crumbs;
    }

    /**
     * Return an array of file details for a file
     *
     * @param $path String
     * @return Array
     */
    protected function fileDetails($path)
    {
        $path = '/' . ltrim($path, '/');

        return [
            'name' => basename($path),
            'fullPath' => $path,
            'webPath' => $this->fileWebPath($path),
            'mimeType' => $this->fileMimeType($path),
            'size' => $this->fileSize($path),
            'modified' => $this->fileModified($path),
        ];
    }


}