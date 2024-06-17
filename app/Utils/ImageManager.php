<?php

namespace App\Utils;

class ImageManager
{
    /**
     * Método responsável por salvar imagens no diretorio de destino
     */
    public static function saveImagePost(array|null $image, int $user_id): string|null
    {
        $dir = "resources/img/post/user-{$user_id}";
        
        if (!file_exists($dir)) mkdir($dir, 0755,true);
        if (!isset($image)) return null;
        
        // converte (string): WhatsApp Image 2024-04-16 at 18.45.33.mpeg
        // para (string): whatsapp-audio-2024-04-16-at-18.45.33.mpeg
        $imageFilter = strtolower(str_replace(' ', '-', $image['name']));

        $newImageDir = $dir.'/'.$imageFilter; 
        move_uploaded_file($image['tmp_name'], $newImageDir);

        return "user-{$user_id}/".$imageFilter;
    }

    public static function saveImagePROJECT(array|null $image, int $user_id): string|null
    {
        $dir = "resources/img/project/user-{$user_id}";
        
        if (!file_exists($dir)) mkdir($dir, 0755,true);
        if (!isset($image)) return null;
        
        // converte (string): WhatsApp Image 2024-04-16 at 18.45.33.mpeg
        // para (string): whatsapp-audio-2024-04-16-at-18.45.33.mpeg
        $imageFilter = strtolower(str_replace(' ', '-', $image['name']));

        $newImageDir = $dir.'/'.$imageFilter; 
        move_uploaded_file($image['tmp_name'], $newImageDir);

        return "user-{$user_id}/".$imageFilter;
    }
}
