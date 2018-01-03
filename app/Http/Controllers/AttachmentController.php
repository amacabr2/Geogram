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
use Illuminate\Http\JsonResponse;

class AttachmentController extends Controller {

    /**
     * Permet de lier le fichier à une entité
     *
     * @param AttachementRequest $request
     * @return Attachement|JsonResponse
     */
    public function store(AttachementRequest $request) {
        $type = $request->get('attachable_type');
        $id = $request->get('attachable_id');
        $file = $request->file('image');

        if (class_exists($type) && method_exists($type, 'attachements')) {
            $subject = call_user_func($type . '::find', $id);
            if ($subject) {
                $attachement = new Attachement($request->only('attachable_type', 'attachable_id'));
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