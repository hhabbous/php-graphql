<?php

namespace Application\GraphQL\Type;

use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;

/**
 * Class StorieType
 * @package Application\GraphQL\Type
 */
class StorieType extends AbstractObjectType
{

    /**
     * @param ObjectTypeConfig $config
     */
    public function build($config)
    {
        $config
            ->addField("title", new StringType())
            ->addField("titleNoFormatting", new StringType())
            ->addField("publisher", new StringType())
            ->addField("url", new StringType())
            ->addField("unescapedUrl", new StringType())
            ->addField(
                "publishedDate",
                [
                    "type" => new StringType(),
                    "resolve" => function ($source, $args) {
                        return date($args["format"], strtotime($source["publishedDate"]));
                    },
                ]
            );
    }

    /**
     * @return bool|string
     */
    public function getName()
    {
        return "Storie";
    }
}
