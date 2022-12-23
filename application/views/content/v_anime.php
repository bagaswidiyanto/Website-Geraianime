<style>

</style>
<div class="container-xxl all-anime">
    <div class="container py-5">
        <div class="header-title py-4 wow fadeInUp" data-wow-delay="0.3s">
            <h1>New Anime</h1>
        </div>
        <div class="anime-eps-container">
            <?php foreach ($anime as $al) {
                $slg = str_replace("-", "_", $al->slug);
            ?>
            <div class="anime-eps-item">
                <div class="box-anime-eps position-relative">
                    <a href="<?= base_url(); ?>anime/anime_eps/<?= $al->slug; ?>/<?= $al->id; ?>"
                        title="<?= $al->nama; ?> Subtitle Indonesia">
                        <div class="anime-eps-wrap">
                            <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/thumbnail/<?= $al->image; ?>"
                                class="img-fluid" alt="">
                        </div>

                        <div class="content">
                            <p class="mb-2"><?= $al->nama; ?></p>
                            <span>UP <?= date('h:i', strtotime($al->tgl_rilis)); ?> Wib</span>
                        </div>
                    </a>
                </div>
            </div>
            <?php } ?>


        </div>

        <nav class="blog-pagination justify-content-center d-flex wow fadeInUp" data-wow-delay="0.3s">
            <!-- <div class="halaman">
                <p class="text-white"><?= $pagination_des; ?></p>
            </div> -->
            <?= $pagination; ?>

        </nav>
    </div>
</div>