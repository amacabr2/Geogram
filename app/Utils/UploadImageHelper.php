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

trait UploadImageHelper {

    /**
     * Upload l'avatar et la couverture
     *
     * @param UploadedFile $uploadedFile
     * @param string $typeImage
     * @param User $user
     * @return void
     */
    private function uploadFile(UploadedFile $uploadedFile, string $typeImage, User $user) {
        $file = $uploadedFile->move(public_path('uploads/' . $user->id . "/{$typeImage}"), $uploadedFile->getClientOriginalName());
        $this->dispatch(new ResizeImage($file->getRealPath(), $typeImage, $user));
    }
}