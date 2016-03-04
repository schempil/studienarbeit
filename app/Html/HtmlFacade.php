<?php
/**
 * Created by PhpStorm.
 * User: Philipp
 * Date: 02.03.2016
 * Time: 17:26
 */

namespace App\Html;


use Illuminate\Support\Facades\Facade;

class HtmlFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return HtmlHelper::class;
    }
}