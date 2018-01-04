<?php
/**
 * Created by PhpStorm.
 * User: antho
 * Date: 03/01/2018
 * Time: 17:37
 */

namespace App\Concerns;

use App\Attachement;

trait AttachableConcern {

    public static function bootAttachableConcern() {
        self::deleted(function ($subject) {
            foreach ($subject->attachements()->get() as $attachment) {
                /** @var Attachement $attachment */
                $attachment->deleteFile();
            }
            $subject->attachements()->delete();
        });

        self::updating(function ($subject) {
            if ($subject->content != $subject->getOriginal('content')) {
                if (preg_match_all('/src="([^"]+)"/', $subject->content, $matches) > 0) {
                    $images = array_map(function ($match) {
                        return basename($match);
                    }, $matches[1]);
                    $attachments = $subject->attachements()->whereNotIn('name', $images);
                } else {
                    $attachments = $subject->attachements();
                }

                foreach ($attachments->get() as $attachment) {
                    /** @var Attachement $attachment */
                    $attachment->deleteFile();
                }
                $attachments->delete();
            }
        });
    }

    public function attachements() {
        return $this->morphMany(Attachement::class, 'attachable');
    }
}