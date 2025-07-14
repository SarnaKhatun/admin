<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ImageHandler
{
    /**
     * Upload an image to the specified disk and folder.
     *
     * @param UploadedFile $image
     * @param string $folder
     * @param string $disk
     * @return string $path
     */
    public function uploadImage(UploadedFile $image, string $folder = 'uploads', string $disk = 'public'): string
    {
        $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
        return $image->storeAs($folder, $filename, $disk);
    }

    /**
     * Delete an image from the specified disk.
     *
     * @param string|null $path
     * @param string $disk
     * @return bool
     */
    public function deleteImage(?string $path, string $disk = 'public'): bool
    {
        if ($path && Storage::disk($disk)->exists($path)) {
            return Storage::disk($disk)->delete($path);
        }

        return false;
    }

    /**
     * Replace an image: delete the old one and upload a new one.
     *
     * @param UploadedFile $newImage
     * @param string|null $oldPath
     * @param string $folder
     * @param string $disk
     * @return string $newPath
     */
    public function replaceImage(UploadedFile $newImage, ?string $oldPath, string $folder = 'uploads', string $disk = 'public'): string
    {
        $this->deleteImage($oldPath, $disk);
        return $this->uploadImage($newImage, $folder, $disk);
    }
}
