<?php

namespace App;



use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class ProposalGenerator {

    public static function materialausgabe($dname, $devnumber, $back, $reason, $pname, $class) {
        $img = Image::make('proposals/samples/materialausgabe.jpg');

        $img->text($dname, 550, 490, function($font) {
            $font->file(public_path('assets/fonts/arial.ttf'));
            $font->size(14);
        });

        $img->text($devnumber, 550, 550, function($font) {
            $font->file(public_path('assets/fonts/arial.ttf'));
            $font->size(14);
        });

        if(!$back == null) {
            $back = new Carbon($back);

            $img->text($back->toFormattedDateString(), 550, 610, function($font) {
                $font->file(public_path('assets/fonts/arial.ttf'));
                $font->size(14);
            });
        }

        $img->text($reason, 550, 670, function($font) {
            $font->file(public_path('assets/fonts/arial.ttf'));
            $font->size(14);
        });

        $img->text($pname, 550, 730, function($font) {
            $font->file(public_path('assets/fonts/arial.ttf'));
            $font->size(14);
        });

        $img->text($class, 550, 790, function($font) {
            $font->file(public_path('assets/fonts/arial.ttf'));
            $font->size(14);
        });

        $rndm = str_random(20);
        $img->save(public_path('proposals/' . $rndm . '.jpg'));

        return '/proposals/' . $rndm . '.jpg';
    }

}
