<html>
<head>

    <title>PHP - GRAPHQL</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet"
          id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Raleway:400,900,700,600,500,300,200,100,800);

        h2 {
            color: #4C4C4C;
            word-spacing: 5px;
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 30px;
            font-family: 'Raleway', sans-serif;
        }

        .ion-minus {
            padding: 0 10px;
        }

        .blog {
            background-color: #f6f6f6;
            padding: 60px 0;
            font-family: 'Raleway', sans-serif;
        }

        .blog .blog-column a {
            color: #5db4c0;
            text-decoration: none;
        }

        .blog span {
            font-size: 17px;
            font-weight: 700;
        }

        .blog .blog-detail {
            margin-top: 10px;
        }

        .fa.fa-user, .fa.fa-clock-o {
            padding-right: 10px;
            color: #909090;
            font-size: 11px;
        }

        .dropdown.dropdown-lg .dropdown-menu {
            margin-top: -1px;
            padding: 6px 20px;
        }

        .input-group-btn .btn-group {
            display: flex !important;
        }

        .btn-group .btn {
            border-radius: 0;
            margin-left: -1px;
        }

        .btn-group .btn:last-child {
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }

        .btn-group .form-horizontal .btn[type="submit"] {
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }

        .form-horizontal .form-group {
            margin-left: 0;
            margin-right: 0;
        }

        .form-group .form-control:last-child {
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }

        @media screen and (min-width: 768px) {
            #adv-search {
                width: 500px;
                margin: 0 auto;
            }

            .dropdown.dropdown-lg {
                position: static !important;
            }

            .dropdown.dropdown-lg .dropdown-menu {
                min-width: 500px;
            }
        }
    </style>
</head>

<body>
<div class="blog">
    <div class="container">

        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 text-center">
                <h2><span class="ion-minus"></span>Blog Posts<span class="ion-minus"></span></h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean
                    massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus </p><br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="input-group" id="adv-search">
                    <input type="text" class="form-control" placeholder="Search for snippets"/>
                    <div class="input-group-btn">
                        <div class="btn-group" role="group">
                            <div class="dropdown dropdown-lg">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false"><span class="caret"></span></button>
                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label for="filter">Filter by</label>
                                            <select class="form-control">
                                                <option value="0" selected>All Snippets</option>
                                                <option value="1">Featured</option>
                                                <option value="2">Most popular</option>
                                                <option value="3">Top rated</option>
                                                <option value="4">Most commented</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="contain">Author</label>
                                            <input class="form-control" type="text"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="contain">Contains the words</label>
                                            <input class="form-control" type="text"/>
                                        </div>
                                        <button type="submit" class="btn btn-primary"><span
                                                    class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search"
                                                                                aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                            <a href="#">Read More</a>
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

    </div>
</div>
</body>
</html>