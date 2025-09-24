<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

if (! function_exists('upload_image')) {
    function upload_image($file, $path = 'uploads'): string
    {
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $filePath = Storage::disk('public')->putFileAs($path, $file, $fileName);
        return $filePath;
    }
}

if (! function_exists('upload_multiple_images')) {
    function upload_multiple_images($files, $path = 'uploads'): array
    {
        $filesPath = [];

        foreach ($files as $file) {
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $filesPath[] = Storage::disk('public')->putFileAs($path, $file, $fileName);
        }

        return $filesPath;
    }
}

if (! function_exists('delete_file_if_exists')) {
    function delete_file_if_exists(?string $path, string $disk = 'public'): bool
    {
        if(empty($path)) {
            return true;
        }

        if (Storage::disk($disk)->exists($path)) {
            return Storage::disk($disk)->delete($path);
        }

        return false;
    }
}

if (! function_exists('delete_files_if_exists')) {
    function delete_files_if_exists(?array $paths, string $disk = 'public'): bool
    {
        if (empty($paths)) {
            return true;
        }

        foreach ($paths as $path) {
            if (Storage::disk($disk)->exists($path)) {
                return Storage::disk($disk)->delete($path);
            }
        }

        return false;
    }
}
