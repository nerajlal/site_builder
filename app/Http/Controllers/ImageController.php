<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ImageController extends Controller
{
    public function show($path)
    {
        if (!Storage::disk('public')->exists($path)) {
            throw new NotFoundHttpException();
        }

        return Storage::disk('public')->response($path);
    }
}
