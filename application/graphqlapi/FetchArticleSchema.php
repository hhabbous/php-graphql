<?php

namespace PQ\GraphQL;

use PQ\GraphQL\Field\ArticleField;
use Youshido\GraphQL\Config\Schema\SchemaConfig;
use Youshido\GraphQL\Schema\AbstractSchema;

/**
 * Class FetchArticleSchema
 * @package Application\GraphQL
 */
class FetchArticleSchema extends AbstractSchema
{

    /**
     * @param SchemaConfig $config
     */
    public function build(SchemaConfig $config)
    {
        $config->getQuery()->addFields([
            new ArticleField(),
        ]);
    }
}
