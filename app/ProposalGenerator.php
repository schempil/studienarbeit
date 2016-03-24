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

    public static function aussonderung($studiengang, $devname, $inventory, $supplier, $location, $devnumber, $volume, $billdate) {
        $img = Image::make('proposals/samples/aussonderung.jpg');

        $img->text($studiengang, 440, 390, function($font) {
            $font->file(public_path('assets/fonts/arial.ttf'));
            $font->size(14);
        });

        $img->text($devname, 400, 505, function($font) {
            $font->file(public_path('assets/fonts/arial.ttf'));
            $font->size(14);
        });

        $img->text('1', 270, 560, function($font) {
            $font->file(public_path('assets/fonts/arial.ttf'));
            $font->size(14);
        });

        $img->text($inventory, 310, 615, function($font) {
            $font->file(public_path('assets/fonts/arial.ttf'));
            $font->size(14);
        });

        $img->text($supplier, 290, 675, function($font) {
            $font->file(public_path('assets/fonts/arial.ttf'));
            $font->size(14);
        });

        $img->text($location, 270, 735, function($font) {
            $font->file(public_path('assets/fonts/arial.ttf'));
            $font->size(14);
        });

        $img->text($volume, 850, 560, function($font) {
            $font->file(public_path('assets/fonts/arial.ttf'));
            $font->size(14);
        });

        $img->text($billdate, 890, 620, function($font) {
            $font->file(public_path('assets/fonts/arial.ttf'));
            $font->size(14);
        });

        $img->text($devnumber, 790, 675, function($font) {
            $font->file(public_path('assets/fonts/arial.ttf'));
            $font->size(14);
        });

        $rndm = str_random(20);

        $img->save(public_path('proposals/out/' . $rndm . '.jpg'));

        return '/proposals/out/'. $rndm . '.jpg';
    }

}
