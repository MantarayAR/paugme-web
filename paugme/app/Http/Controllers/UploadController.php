<?php

namespace App\Http\Controllers;

use App\Services\UploadsManager;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    protected $manager;
    protected $disk;

    public function __construct(UploadsManager $manager)
    {
        $this->manager = $manager;
        $this->disk = Storage::disk(config('blog.uploads.storage'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        $name = '/' . ltrim($name, '/');
        $mime = $this->manager->fileMimeType($name);

        if ($this->disk->exists($name)) {
            $file = $this->disk->get($name);

            return (new Response($file, 200))->header('Content-Type', $mime);
        }
    }
}
