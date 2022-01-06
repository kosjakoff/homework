<?php

namespace core;

class Config {

    private function __construct()
    {
    }

    public static function route(){
        return [
            "GET" => [
                [
                    "uri" => "",
                    "controller" => "\\controllers\\PageController",
                    "params" => "",
                    "action" => "index",
                ], [
                    "uri" => "page",
                    "controller" => "\\controllers\\PageController",
                    "params" => "",
                    "action" => "getAll",
                ], [
                    "uri" => "page/([0-9]+)",
                    "controller" => "\\controllers\\PageController",
                    "params" => "$1",
                    "action" => "getPage",
                ],
            ],
        ];
    }
}
