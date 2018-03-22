<?php include_once THEME_FOLDER . "/_includes/header.php"; ?>

    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 text-center">
            <h2><span class="ion-minus"></span>Blog Posts<span class="ion-minus"></span></h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean
                massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus </p><br>
        </div>
    </div>

<?php include_once THEME_FOLDER . "/_includes/search.php"; ?>

    <div style="margin:40px 0px;"></div>

<?php if (isset($response["data"]["article"]) && count($articles = $response["data"]["article"])) : ?>
    <?php foreach ($articles as $index => $article) : ?>
        <?php if ($index % 2 == 0) : ?>
            <div class="row">
        <?php endif; ?>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" data-aos="fade-right">

            <div class="col-lg-6 col-xs-12">
                <img src="<?= $article["image"]["url"]; ?>"
                     alt="" width="100%">
            </div>

            <div class="col-lg-6 col-xs-12">
                <div class="blog-colum">
                    <span><?= $article["titleNoFormatting"]; ?></span>
                    <ul class="blog-detail list-inline">
                        <li><i class="fa fa-user"></i><?= $article["publisher"]; ?></li>
                        <li><i class="fa fa-clock-o"></i><?= $article["publishedDate"]; ?></li>
                    </ul>
                    <p><?= $article["content"]; ?></p>
                    <a href="?url=blog/post/<?= urlencode($article["titleNoFormatting"]); ?>">Read More</a>
                </div>
            </div>

        </div>
        <?php if ($index % 2 != 0) : ?>
            </div>
            <div style="margin:40px 0px;"></div>
        <?php endif; ?>
    <?php endforeach; ?>

<?php else : ?>
    <p>No record found.</p>
<?php endif; ?>

<?php include_once THEME_FOLDER . "/_includes/footer.php"; ?>