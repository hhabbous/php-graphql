<?php

namespace PQ\FrontEnd\controller;

use PQ\GraphQL\FetchArticleSchema;
use Youshido\GraphQL\Execution\Processor;

/**
 * Class Blog
 * @package PQ\FrontEnd\controller
 */
class Blog
{
    /**
     * Get articles by filter criteria
     */
    public function index(): void
    {
        $response = $this->query([
            "title" => $_GET["title"] ?? null,
            "keyword" => $_GET["keyword"] ?? null,
            "date" => $_GET["date"] ?? null,
        ]);

        require THEME_FOLDER . "/blog/index.php";
    }

    /**
     * Get article by title
     * @param $title
     */
    public function post($title): void
    {
        $response = $this->query([
            "title" => urldecode($title),
        ]);

        require THEME_FOLDER . "/blog/post.php";
    }


    /**
     * @param $args
     * @return array
     */
    private function query($args)
    {
        $processor = new Processor(new FetchArticleSchema());
        $payload = '
                query FetchArticle($title: String="", $keyword: String="", $date: String="") {
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

        $processor->processPayload($payload, $args);

        return $processor->getResponseData();
    }
}
