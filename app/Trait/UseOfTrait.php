<?php

namespace App\Trait;

use Intervention\Image\Facades\Image;

trait UseOfTrait
{

    //image upload
    public function imageUpload($file, $path, $width, $height): string|int
    {
        // multiple image upload
        if (is_array($file)) {
            if (!empty($file)) {
                $gallery = [];
                $i = 1;
                foreach ($file as $item) {
                    $fileName = substr(md5(time()), 0, 20) . $i . '.' . $item->getClientOriginalExtension();
                    Image::make(file_get_contents($item))->resize($width, $height)->save($path . $fileName);
                    $gallery[] = $path . $fileName;
                    $i++;
                }
                return json_encode($gallery);
            }
        }

        // single image upload
        if (!empty($file)) {
            $fileName = substr(md5(time()), 0, 20) . '.' . $file->getClientOriginalExtension();
            Image::make(file_get_contents($file))->resize($width, $height)->save($path . $fileName);
            return $path . $fileName;
        }
    }

    // description
    public function description(string $desc): string
    {
        // summernote editor
        $dom = new \DOMDocument('1.0', 'UTF-8');
        libxml_use_internal_errors(true);
        $dom->loadHtml($desc);
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                $filename = uniqid();
                $filepath = "/uploads/summernote/$filename.$mimetype";
                $images = Image::make($src)->encode($mimetype, 100)->save(public_path($filepath));
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            }
        }
        return $dom->saveHTML();
    }
}
