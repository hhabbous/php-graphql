<?php

namespace Application\GraphQL\Type;

use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

/**
 * Class ImageType
 * @package Application\GraphQL\Type
 */
class ImageType extends AbstractObjectType
{

    /**
     * @param ObjectTypeConfig $config
     */
    public function build($config)
    {
        $config->addFields(
            [
                "url" => new StringType(),
                "tbUrl" => new StringType(),
                "originalContextUrl" => new StringType(),
                "publisher" => new StringType(),
                "tbWidth" => new IntType(),
                "tbHeight" => new IntType(),
            ]
        );
    }

    /**
     * @return bool|string
     */
    public function getName()
    {
        return "Image";
    }
}
