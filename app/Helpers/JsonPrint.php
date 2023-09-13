<?php

class JsonPrint
{
    public static function json($data)
    {
        return "<pre>" . json_encode($data, JSON_PRETTY_PRINT) . "</pre>";
    }
}
