<?php

namespace Application\GraphQL\Type;

use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;

/**
 * Class ArticleType
 * @package Application\GraphQL\Type
 */
class ArticleType extends AbstractObjectType
{

    /**
     * @param ObjectTypeConfig $config
     */
    public function build($config)
    {
        $config->addFields(
            [
                "content" => new StringType(),
                "unescapedUrl" => new StringType(),
                "url" => new StringType(),
                "title" => new StringType(),
                "titleNoFormatting" => new StringType(),
                "publisher" => new StringType(),
                "publishedDate" => [
                    "type" => new StringType(),
                    "resolve" => function ($source, $args) {
                        return date("M d, Y", strtotime($source['publishedDate']));
                    },
                ],
                "image" => new ImageType(),
                "relatedStories" => new ListType(new StorieType()),
            ]
        );
    }

    /**
     * @return bool|string
     */
    public function getName()
    {
        return "Article";
    }
}
