<?php

namespace core;

class ConfigRoutes {

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
                    "action" => "getPages",
                ], [
                    "uri" => "page/([0-9]+)",
                    "controller" => "\\controllers\\PageController",
                    "params" => "$1",
                    "action" => "getPage",
                ], [
                    "uri" => "users",
                    "controller" => "\\controllers\\UserController",
                    "params" => "",
                    "action" => "getUsers",
                ], [
                    "uri" => "users/([0-9]+)",
                    "controller" => "\\controllers\\UserController",
                    "params" => "$1",
                    "action" => "getUser",
                ], [
                    "uri" => "products",
                    "controller" => "\\controllers\\ProductController",
                    "params" => "",
                    "action" => "getProducts",
                ], [
                    "uri" => "products/([0-9]+)",
                    "controller" => "\\controllers\\ProductController",
                    "params" => "$1",
                    "action" => "getProduct",
                ], 
                
            ],
        ];
    }
}
