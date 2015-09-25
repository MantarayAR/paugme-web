<?php

namespace App\Http\Controllers\Admin;

use App\Services\UploadsManager;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UploadNewFolderRequest;
use App\Http\Requests\UploadFileRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class UploadController extends Controller
{
    protected $manager;

    public function __construct(UploadsManager $manager)
    {
        $this->manager = $manager;
    }

    public function index(Request $request)
    {
        $folder = $request->get('folder');
        $data = $this->manager->folderInfo($folder);

        return view('admin.upload.index', $data);
    }

    public function createFile(Request $request)
    {
        $folder = $request->get('folder');
        return view('admin.upload.create-file')
            ->withFolder($folder);
    }

    public function uploadFile(UploadFileRequest $request)
    {
        $file = $request->file('new_file');
        $folder   = $request->get('folder');
        $filename = $request->get('filename');
        $filename = $filename ?: $file->getClientOriginalName();

        $path = str_finish( $folder, '/');

        $result = $this->manager->saveFile($file, $path, $filename);

        if( $result === true ) {
            return redirect()->action('Admin\UploadController@index')
                ->withSuccess("File '$filename' uploaded.");
        }

        $error = $result ?: 'An error occurred uploading the file.';

        $query = ['folder' => $folder];

        return redirect()->action('Admin\UploadController@createFile', $query)
            ->withErrors([$error]);

    }

    public function deleteFile(Request $request)
    {
        $name   = $request->get('name');
        $folder = $request->get('folder');

        return view('admin.upload.delete-file')
            ->withName($name)
            ->withFolder($folder);
    }

    public function destroyFile(Request $request)
    {
        $name = $request->get('name');
        $folder = $request->get('folder');
        $path = $folder . '/' . $name;

        $result = $this->manager->deleteFile($path);

        if ( $result === true ) {
            return redirect()->action('Admin\UploadController@index')
                ->withSuccess("File '$path' was deleted.");
        }

        $error = $result ?: 'An error occurred when deleting the file';

        return redirect()->action('Admin\UploadController@deleteFile', ['name' => $name, 'folder' => $folder ] )
            ->withErrors([$error]);
    }

    public function createFolder(Request $request)
    {
        $folder = $request->get('folder');
        return view('admin.upload.create-folder')
            ->withFolder($folder);
    }

    public function uploadFolder(UploadNewFolderRequest $request)
    {
        $new_folder = $request->get('new_folder');
        $folder = $request->get('folder') . '/' . $new_folder;

        $result = $this->manager->createDirectory($folder);

        if ($result == true) {
            return redirect()->action('Admin\UploadController@index')
                ->withSuccess("Folder '$folder' created.");
        }

        $error = $result ?: "An error occurred creating directory.";

        return redirect()->action('Admin\UploadController@createFolder')
            ->withErrors([$error]);
    }

    public function deleteFolder(Request $request)
    {
        $folder = $request->get('folder');
        return view('admin.upload.delete-folder')
            ->withFolder($folder);
    }

    public function destroyFolder(Request $request)
    {
        $delFolder = $request->get('folder');

        $result = $this->manager->deleteDirectory($delFolder);

        if ($result === true) {
            return redirect()->action('Admin\UploadController@index')
                ->withSuccess("Folder '$delFolder' deleted.");
        }

        $error = $result ?: 'An error occurred deleting directory.';

        return redirect()->action('Admin\UploadController@deleteFolder')
            ->withFolder($delFolder)
            ->withErrors([$error]);
    }
}
