<?php
/**
 * Created by PhpStorm.
 * User: antho
 * Date: 27/12/2017
 * Time: 17:03
 */

namespace App\Utils;


use App\Jobs\ResizeImage;
use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

trait UploadImageHelper {

    /**
     * Upload l'avatar et la couverture
     *
     * @param UploadedFile $uploadedFile
     * @param string $typeImage
     * @param User $user
     * @param bool $update
     * @return void
     */
    private function uploadFile(UploadedFile $uploadedFile, string $typeImage, User $user, bool $update = false) {
        if ($update) {
            if ($typeImage == "avatar") {
                File::deleteDirectory(public_path('uploads' . DIRECTORY_SEPARATOR . Auth::id() . DIRECTORY_SEPARATOR . 'avatar'));
            } else if ($typeImage == "couverture") {
                File::deleteDirectoty(public_path('uploads' . DIRECTORY_SEPARATOR . Auth::id() . DIRECTORY_SEPARATOR . 'couverture'));
            }
        }

        $file = $uploadedFile->move(public_path('uploads/' . $user->id . "/{$typeImage}"), $uploadedFile->getClientOriginalName());
        $this->dispatch(new ResizeImage($file->getRealPath(), $typeImage, $user));
    }
}