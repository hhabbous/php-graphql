<?php

namespace Application\FrontEnd\controller;

use Application\GraphQL\FetchArticleSchema;
use Youshido\GraphQL\Execution\Processor;

/**
 * Class Home
 * @package Application\FrontEnd\controller
 */
class Home
{

    /**
     *
     */
    public function index()
    {
        $processor = new Processor(new FetchArticleSchema());
        $payload = '
                query FetchArticle($title:String, $keyword:String, $date:String) {
                    article(title: $title, keyword: $keyword, date: $date) {
                        titleNoFormatting,
                        content,
                        publisher,
                        publishedDate,
                        image {
                            url
                        }
                    } 
                }
            ';

        $processor->processPayload($payload, [
            "title" => $_GET["title"] ?? null,
            "keyword" => $_GET["keyword"] ?? null,
            "date" => $_GET["date"] ?? null
        ]);
        $response = $processor->getResponseData();

        require APP . "frontend/view/home/index.php";
    }
}
