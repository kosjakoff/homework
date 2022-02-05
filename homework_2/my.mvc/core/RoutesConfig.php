<?php

namespace core;

class RoutesConfig {

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
                    "action" => "showPages",
                ], [
                    "uri" => "page/([0-9]+)",
                    "controller" => "\\controllers\\PageController",
                    "params" => "$1",
                    "action" => "showPage",
                ], [
                    "uri" => "users",
                    "controller" => "\\controllers\\UserController",
                    "params" => "",
                    "action" => "showUsers",
                ], [
                    "uri" => "users/([0-9]+)",
                    "controller" => "\\controllers\\UserController",
                    "params" => "$1",
                    "action" => "showUser",
                ], [
                    "uri" => "products",
                    "controller" => "\\controllers\\ProductController",
                    "params" => "",
                    "action" => "showProducts",
                ], [
                    "uri" => "products/([0-9]+)",
                    "controller" => "\\controllers\\ProductController",
                    "params" => "$1",
                    "action" => "showProduct",
                ],  
            ],
        ];
    }
}
