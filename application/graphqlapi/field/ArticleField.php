<?php

namespace PQ\GraphQL\Field;

use PQ\GraphQL\Type\ArticleType;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;
use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;

/**
 * Class ArticleField
 * @package Application\GraphQL\Field
 */
class ArticleField extends AbstractField
{


    /**
     * @return ListType
     */
    public function getType()
    {
        return new ListType(new ArticleType());
    }

    /**
     * @param FieldConfig $config
     */
    public function build(FieldConfig $config)
    {
        $config->addArguments(
            [
                "title" => new StringType(),
                "keyword" => new StringType(),
                "date" => new StringType(),
            ]
        );
    }

    /**
     * @param $value
     * @param array $args
     * @param ResolveInfo $info
     * @return array|mixed|null
     */
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $data = json_decode(
            file_get_contents(ROOT . "data.json"),
            true
        );

        $articles = array_filter(
            $data["results"],
            function ($item) use (&$args) {
                if (!empty($args["title"]) && $args["title"] !== $item["titleNoFormatting"]) {
                    return false;
                }
                if (!empty($args["keyword"]) && strpos($item["content"], $args["keyword"]) === false) {
                    return false;
                }
                if (!empty($args["date"]) && date('Y-m-d', strtotime($item["publishedDate"])) != $args["date"]) {
                    return false;
                }
                return true;
            }
        );

        return $articles;
    }
}
