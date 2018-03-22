<?php include_once THEME_FOLDER . "/_includes/header.php"; ?>

    <div class="row">
        <div class="col-md-12">
            <a href="/" class="btn btn-link">Back</a>
        </div>
    </div>
<?php if (isset($response["data"]["article"]) && !empty($article = reset($response["data"]["article"]))) : ?>

    <div class="row">
        <div class="col-md-12">
            <div class="row hidden-md hidden-lg"><h1 class="text-center"><?= $article["titleNoFormatting"]; ?></h1>
            </div>

            <div class="pull-left col-md-4 col-xs-12 thumb-contenido">
                <img class="center-block img-responsive" src="<?= $article["image"]["url"]; ?>"/>
            </div>
            <div class="">
                <h1 class="hidden-xs hidden-sm"><?= $article["titleNoFormatting"]; ?></h1>
                <hr>
                <small><?= $article["publishedDate"]; ?></small>
                <br>
                <small><strong><?= $article["publisher"]; ?></strong></small>
                <hr>
                <p class="text-justify"><?= $article["content"]; ?></p>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php include_once THEME_FOLDER . "/_includes/footer.php"; ?>