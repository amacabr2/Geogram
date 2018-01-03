<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Attachement extends Model {

    public $guarded = [];

    public $appends = ['url'];

    public function attachable() {
        return $this->morphTo();
    }

    /**
     * Upload du fichier
     *
     * @param UploadedFile $file
     * @return $this
     */
    public function uploadFile(UploadedFile $file) {
        $file = $file->storePublicly('uploads', ['disk' => 'public']);
        $this->name = basename($file);
        return $this;
    }

    public function getUrlAttribute() {
        return Storage::disk('public')->url('/uploads/' . $this->name);
    }

}
