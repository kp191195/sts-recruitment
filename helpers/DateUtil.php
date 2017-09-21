<?php
namespace Helpers;

class DateUtil {
    public static function dateTimeNow(){
        return date('YmdHis');
    }

    public static function dateNow(){
        return date('Ymd');
    }
}

