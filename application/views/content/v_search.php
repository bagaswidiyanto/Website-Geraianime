<style>

</style>
<div class="container-xxl all-anime">
    <div class="container py-5">
        <div class="header-title py-4 wow fadeInUp" data-wow-delay="0.3s">
            <?php if (@$_GET['s'] != '') { ?>
            <h1>Pencarian: <?= $param = @$_GET['s']; ?></h1>
            <?php } else { ?>
            <h1>Pencarian: All</h1>
            <?php } ?>
            <p>Jumlah Data: <?= $jml_data->jml; ?></p>
        </div>
        <div class="anime-eps-container">
            <?php foreach ($search as $s) {
                $slg = str_replace("-", "_", $s->slugTurunan);
            ?>
            <?php if ($s->flags == 1) { ?>
            <div class="anime-eps-item">
                <div class="box-anime-eps position-relative">
                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $s->slug; ?>"
                        title="<?= $s->nama; ?> Episode <?= $s->episode; ?>">
                        <div class="anime-eps-wrap">
                            <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/thumbnail/<?= $s->image; ?>"
                                class="img-fluid" alt="">
                        </div>
                        <div class="episode py-1 px-2" style="background: #FF6147;">
                            <p>ANIME</p>
                        </div>
                        <div class="content">
                            <p class="mb-2"><?= $s->nama; ?></p>
                            <span>UP <?= date('H:i', strtotime($s->tgl_rilis)); ?> WIB</span>
                        </div>
                    </a>
                </div>
            </div>
            <?php } else if ($s->flags == 2) { ?>
            <div class="anime-eps-item">
                <div class="box-anime-eps position-relative">
                    <a href="<?= base_url(); ?>anime/anime_eps/<?= $s->slug; ?>/<?= $s->id; ?>"
                        title="<?= $s->nama; ?> Episode <?= $s->episode; ?>">
                        <div class="anime-eps-wrap">
                            <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/thumbnail/<?= $s->image; ?>"
                                class="img-fluid" alt="">
                        </div>
                        <div class="episode py-1 px-2">
                            <p>Episode <?= $s->episode; ?></p>
                        </div>
                        <div class="content">
                            <p class="mb-2"><?= $s->nama; ?></p>
                            <span>UP <?= date('H:i', strtotime($s->tgl_rilis)); ?> WIB</span>
                        </div>
                    </a>
                </div>
            </div>
            <?php } else if ($s->flags == 3) { ?>
            <div class="anime-eps-item">
                <div class="box-anime-eps position-relative">
                    <a href="<?= base_url(); ?>komik/komik_detail/<?= $s->slug; ?>"
                        title="<?= $s->nama; ?> Episode <?= $s->episode; ?>">
                        <div class="anime-eps-wrap">
                            <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/thumbnail/<?= $s->image; ?>"
                                class="img-fluid" alt="">
                        </div>
                        <div class="episode py-1 px-2" style="background: #FF6147;">
                            <p>Manga</p>
                        </div>
                        <div class="content">
                            <p class="mb-2"><?= $s->nama; ?></p>
                            <span>UP <?= date('H:i', strtotime($s->tgl_rilis)); ?> WIB</span>
                        </div>
                    </a>
                </div>
            </div>
            <?php } else if ($s->flags == 4) { ?>
            <div class="anime-eps-item">
                <div class="box-anime-eps position-relative">
                    <a href="<?= base_url(); ?>komik/komik_chapter/<?= $s->slug; ?>/<?= $s->id; ?>"
                        title="<?= $s->nama; ?> Episode <?= $s->episode; ?>">
                        <div class="anime-eps-wrap">
                            <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/thumbnail/<?= $s->image; ?>"
                                class="img-fluid" alt="">
                        </div>
                        <div class="episode py-1 px-2">
                            <p>Chapter <?= $s->episode; ?></p>
                        </div>
                        <div class="content">
                            <p class="mb-2"><?= $s->nama; ?></p>
                            <span>UP <?= date('H:i', strtotime($s->tgl_rilis)); ?> WIB</span>
                        </div>
                    </a>
                </div>
            </div>
            <?php } else if ($s->flags == 5) { ?>
            <div class="anime-eps-item">
                <div class="box-anime-eps position-relative">
                    <a href="<?= base_url(); ?>movie/anime_movie/<?= $s->slug; ?>/<?= $s->id; ?>"
                        title="<?= $s->nama; ?> Episode <?= $s->episode; ?>">
                        <div class="anime-eps-wrap">
                            <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/thumbnail/<?= $s->image; ?>"
                                class="img-fluid" alt="">
                        </div>
                        <div class="episode py-1 px-2" style="background: #FF6147;">
                            <p>MOVIE</p>
                        </div>
                        <div class="content">
                            <p class="mb-2"><?= $s->nama; ?></p>
                            <span>UP <?= date('H:i', strtotime($s->tgl_rilis)); ?> WIB</span>
                        </div>
                    </a>
                </div>
            </div>
            <?php } ?>
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