<?php
/**
 * Created by PhpStorm.
 * User: sylva
 * Date: 29/12/2017
 * Time: 15:08
 */

namespace App\Http\Controllers;


use App\Attachement;
use App\Http\Requests\AttachementRequest;
use App\Post;
use Illuminate\Http\JsonResponse;

class AttachementController extends Controller
{

    public function store(AttachementRequest $attachementRequest) {
        $type = $attachementRequest->get('attachable_type');
        $id = $attachementRequest->get('attachable_id');
        $file = $attachementRequest->file('image');
        if(class_exists($type) && method_exists($type, 'attachements')) {
            $subject = call_user_func($type.'::find', $id);
            if($subject) {
                $attachement = new Attachement($attachementRequest->only('attachable_type', 'attachable_id'));
                $attachement->uploadFile($file);
                $attachement->save();
                return $attachement;
            } else {
                return new JsonResponse(['attachable_id' => 'Ce contenu ne peut pas recevoir de fichiers attachés'], 422);
            }
        } else {
            return new JsonResponse(['attachable_type' => 'Ce contenu ne peut pas recevoir de fichiers attachés'], 422);
        }
    }

}