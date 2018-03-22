<div class="row">
    <div class="col-md-12">
        <form method="get" action="" name="search">
            <div class="input-group" id="adv-search">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value="<?= $_GET['title'] ?? null; ?>"/>
                </div>
                <div class="form-group">
                    <label for="keyword">Keyword</label>
                    <input class="form-control" type="text" name="keyword" value="<?= $_GET['keyword'] ?? null; ?>"/>
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input class="form-control" type="date" name="date" value="<?= $_GET['date'] ?? null; ?>"/>
                </div>
                <br/><br/>
                <div class="form-group">
                    <input type="submit" value="Search" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>