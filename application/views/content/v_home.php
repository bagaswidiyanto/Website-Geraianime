<?php
function format_hari_tanggal($waktu)
{
    $hari_array = array(
        'Minggu',
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu'
    );
    $hr = date('w', strtotime($waktu));
    $hari = $hari_array[$hr];
    $tanggal = date('j', strtotime($waktu));
    $bulan_array = array(
        1 => 'Jan',
        2 => 'Feb',
        3 => 'Feb',
        4 => 'Apr',
        5 => 'Mei',
        6 => 'Jun',
        7 => 'Jul',
        8 => 'Agu',
        9 => 'Sep',
        10 => 'Okt',
        11 => 'Nov',
        12 => 'Des',
    );
    $bl = date('n', strtotime($waktu));
    $bulan = $bulan_array[$bl];
    $tahun = date('Y', strtotime($waktu));
    $jam = date('H:i:s', strtotime($waktu));

    //untuk menampilkan hari, tanggal bulan tahun jam
    //return "$hari, $tanggal $bulan $tahun $jam";

    //untuk menampilkan hari, tanggal bulan tahun
    return "$hari, $tanggal $bulan $tahun";
}

function time_ago($timestamp)
{
    $time_ago = strtotime($timestamp);
    $current_time = time();
    $time_difference = $current_time - $time_ago;
    $seconds = $time_difference;
    $minutes      = round($seconds / 60);        // value 60 is seconds  
    $hours        = round($seconds / 3600);       //value 3600 is 60 minutes * 60 sec  
    $days         = round($seconds / 86400);      //86400 = 24 * 60 * 60;  
    $weeks        = round($seconds / 604800);     // 7*24*60*60;  
    $months       = round($seconds / 2629440);    //((365+365+365+365+366)/5/12)*24*60*60  
    $years        = round($seconds / 31553280);   //(365+365+365+365+366)/5 * 24 * 60 * 60  
    if ($seconds <= 60) {
        return "Sekarang";
    } else if ($minutes <= 60) {
        if ($minutes == 1) {
            return "Satu menit lalu";
        } else {
            return "$minutes menit lalu";
        }
    } else if ($hours <= 24) {
        if ($hours == 1) {
            return "Satu jam lalu";
        } else {
            return "$hours jam lalu";
        }
    } else if ($days <= 7) {
        if ($days == 1) {
            return "Kemarin";
        } else {
            return "$days hari lalu";
        }
    } else if ($weeks <= 4.3) {  //4.3 == 52/12
        if ($weeks == 1) {
            return "Satu minggu lalu";
        } else {
            return "$weeks minggu lalu";
        }
    } else if ($months <= 12) {
        if ($months == 1) {
            return "Satu bulan lalu";
        } else {
            return "$months bulan lalu";
        }
    } else {
        if ($years == 1) {
            return "Satu tahun lalu";
        } else {
            return "$years tahun lalu";
        }
    }
}
?>
<div class="container-xxl anime-eps">
    <div class="container py-5">
        <div class="header-title py-4 wow fadeInUp" data-wow-delay="0.3s">
            <h1>News Anime Update</h1>
        </div>
        <div class="anime-eps-container">
            <?php foreach ($anime as $al) {
                $slg = str_replace("-", "_", $al->slg);
            ?>
            <div class="anime-eps-item wow fadeInUp" data-wow-delay="0.3s">
                <div class="box-anime-eps position-relative">
                    <a href="<?= base_url(); ?>anime/anime_eps/<?= $al->slug; ?>/<?= $al->id_anime; ?>"
                        title="<?= $al->nama; ?> Episode <?= $al->episode; ?>">
                        <div class="anime-eps-wrap">
                            <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/thumbnail/<?= $al->image; ?>"
                                class="img-fluid" alt="">
                        </div>
                        <div class="episode py-1 px-2">
                            <p>Episode <?= $al->episode; ?></p>
                        </div>
                        <div class="content">
                            <p class="mb-2"><?= $al->nama; ?></p>
                            <span>UP <?= date('h:i', strtotime($al->createDate)); ?> Wib</span>
                        </div>
                    </a>
                </div>
            </div>
            <?php } ?>


        </div>

        <nav class="blog-pagination justify-content-center d-flex wow fadeInUp" data-wow-delay="0.3s">
            <div class="halaman">
                <p class="text-white"><?= $pagination_des; ?></p>
            </div>
            <?= $pagination; ?>
        </nav>
    </div>
</div>

<div class="container-xxl iklan">
    <div class="container">
        <div class="box-advert wow fadeInUp" data-wow-delay="0.3s">
            <?php if ($bIklan1->image != '') { ?>
            <a href="<?= $bIklan1->url; ?>">
                <img src="https://admin103.geraianime.com/upload/iklan/<?= $bIklan1->image; ?>" class="img-fluid w-100"
                    alt="<?= $bIklan1->nama; ?>" title="<?= $bIklan1->nama; ?>">
            </a>
            <?php } else { ?>
            <img src="<?= base_url() ?>assets/img/iklan1.jpg" class="img-fluid w-100" alt="">
            <?php } ?>
        </div>
    </div>
</div>

<div class="container-xxl movie">
    <div class="container pt-5">
        <div class="header-title wow fadeInUp" data-wow-delay="0.3s">
            <h1>Popular Anime Movie</h1>
        </div>

        <div class="row mt-4">
            <div class="col-lg-8">
                <div class="headline position-relative wow fadeInUp" data-wow-delay="0.3s">
                    <a href="<?= base_url(); ?>movie/anime_movie/<?= $movieFirst->slug; ?>"
                        title="<?= $movieFirst->nama; ?>">
                        <div class="img">
                            <?php $slgFirst = str_replace("-", "_", $movieFirst->slug_turunan); ?>
                            <img src="https://admin103.geraianime.com/upload/<?= $slgFirst; ?>/gambar_anime/<?= $movieFirst->image; ?>"
                                class="img-fluid w-100" alt="">
                        </div>
                        <div class="text-populer">
                            <h5 class="text-white fw-bold">POPULAR MOVIE</h5>
                        </div>
                        <div class="content">
                            <h5><?= $movieFirst->nama; ?></h5>
                            <p>UP <?= format_hari_tanggal(date('l d M Y', strtotime($movieFirst->create_date))); ?>
                                <?= date('h:i', strtotime($movieFirst->create_date)); ?> Wib - <span>Movie</span></p>
                        </div>
                    </a>
                </div>
                <div class="row g-4 mt-4 wow fadeInUp" data-wow-delay="0.3s">
                    <?php foreach ($movieLastPopuler as $ml) {
                        $slg = str_replace("-", "_", $ml->slug_turunan);
                    ?>
                    <div class="col-md-4">
                        <a href="<?= base_url(); ?>movie/anime_movie/<?= $ml->slug; ?>" title="<?= $ml->nama; ?>">
                            <div class="headline-last position-relative">
                                <div class="img">
                                    <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/thumbnail/<?= $ml->image; ?>"
                                        class="img-fluid w-100" alt="">
                                </div>
                                <div class="release">
                                    <p>UP <?= format_hari_tanggal(date('l d M Y,', strtotime($ml->create_date))); ?>
                                        <?= date('h:i', strtotime($ml->create_date)); ?> WIB
                                    </p>
                                </div>
                                <div class="content">
                                    <p><?= $ml->nama; ?></p>
                                </div>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-lg-4 mt-5 mt-lg-0">
            <div class="box-advert wow fadeInUp" data-wow-delay="0.3s">
                <?php if ($bIklan2->image != '') { ?>
                <a href="<?= $bIklan2->url; ?>">
                    <img src="https://admin103.geraianime.com/upload/iklan/<?= $bIklan2->image; ?>"
                        class="img-fluid w-100" alt="<?= $bIklan2->nama; ?>" title="<?= $bIklan2->nama; ?>">
                </a>
                <?php } else { ?>
                <img src="<?= base_url() ?>assets/img/iklan2.jpg" class="img-fluid w-100" alt="">
                <?php } ?>
            </div>
            <div class="side-other-movies">
                <div class="header-title py-2 px-3 text-center mt-4">
                    <h4>Rekomendasi Anime Movie</h4>
                </div>
                <div class="row g-4 mt-4">
                    <?php foreach ($movieLast as $ml) {
                        $slg = str_replace("-", "_", $ml->slug_turunan);
                    ?>
                    <div class="col-4 wow fadeInUp" data-wow-delay="0.3s">
                        <a href="<?= base_url(); ?>movie/anime_movie/<?= $ml->slug; ?>" title="<?= $ml->nama; ?>">
                            <div class="img">
                                <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/thumbnail/<?= $ml->image; ?>"
                                    class="img-fluid" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="col-8 wow fadeInUp" data-wow-delay="0.3s">
                        <a href="<?= base_url(); ?>movie/anime_movie/<?= $ml->slug; ?>" title="<?= $ml->nama; ?>">
                            <div class="content ms-2">
                                <div class="genre">
                                    <p>Movie</p>
                                </div>
                                <p><?= $ml->nama; ?></p>
                                <span>UP <?= format_hari_tanggal(date('l d M Y, h:i', strtotime($ml->create_date))); ?>
                                    WIB</span>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="container-xxl anime">
    <div class="container py-5">
        <div class="d-sm-flex d-inline-block justify-content-between align-items-center wow fadeInUp"
            data-wow-delay="0.3s">
            <div class="header-title py-4">
                <h1>New Anime </h1>
            </div>
            <div class="full-anime mb-3 mb-sm-0">
                <a href="<?= base_url(); ?>anime">Selengkapnya New Anime Complete >></a>
            </div>
        </div>
        <div class="anime-container">
            <?php foreach ($new_anime as $na) {
                $slg = str_replace("-", "_", $na->slug);
            ?>
            <div class="anime-item wow fadeInUp" data-wow-delay="0.3s">
                <div class="box-anime position-relative">
                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $na->slug; ?>" title="<?= $na->nama; ?>">
                        <div class="anime-wrap">
                            <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/thumbnail/<?= $na->image; ?>"
                                class="img-fluid" alt="">
                        </div>
                        <div class="episode py-1 px-2">
                            <p>UP <?= format_hari_tanggal($na->tgl_rilis); ?></p>
                        </div>
                        <div class="content">
                            <p class="mb-2"><?= $na->nama; ?></p>
                        </div>
                    </a>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
</div>


<div class="container-xxl popular-anime">
    <div class="container py-5">
        <div class="d-sm-flex d-inline-block justify-content-between align-items-center wow fadeInUp"
            data-wow-delay="0.3s">
            <div class="header-title py-4">
                <h1>Popular Anime </h1>
            </div>
            <div class="full-anime mb-3 mb-sm-0">
                <a href="<?= base_url(); ?>anime/anime_popular">Selengkapnya >></a>
            </div>
        </div>
        <div class="row g-4">
            <?php foreach ($populer_anime as $pa) {
                $slg = str_replace("-", "_", $pa->slug);
            ?>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <a href="<?= base_url(); ?>anime/anime_detail/<?= $pa->slug; ?>" title="<?= $pa->nama; ?>">
                    <div class="row">
                        <div class="col-5">
                            <div class="img">
                                <div class="view">
                                    <p>Viewer : <?= $pa->jml; ?></p>
                                </div>
                                <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/thumbnail/<?= $pa->image; ?>"
                                    class="img-fluid w-100" alt="">
                            </div>

                        </div>
                        <div class="col-7 px-0">
                            <div class="content ms-3">
                                <div class="genre">
                                    <p>Popular Anime</p>
                                </div>
                                <p><?= $pa->nama; ?> Subtitle Indonesia</p>
                                <span>UP <?= format_hari_tanggal(date('l d M Y', strtotime($pa->tgl_rilis))); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>

        </div>

    </div>
</div>


<div class="container-xxl iklan">
    <div class="container">
        <div class="box-advert wow fadeInUp" data-wow-delay="0.3s">
            <?php if ($bIklan3->image != '') { ?>
            <a href="<?= $bIklan3->url; ?>">
                <img src="https://admin103.geraianime.com/upload/iklan/<?= $bIklan3->image; ?>" class="img-fluid w-100"
                    alt="<?= $bIklan3->nama; ?>" title="<?= $bIklan3->nama; ?>">
            </a>
            <?php } else { ?>
            <img src="<?= base_url() ?>assets/img/iklan1.jpg" class="img-fluid w-100" alt="">
            <?php } ?>
        </div>
    </div>
</div>


<div class="container-xxl manga">
    <div class="container py-5">
        <div class="header-title d-flex justify-content-between pb-4 wow fadeInUp" data-wow-delay="0.3s">
            <div>
                <h1 class="mb-4">New Manga</h1>
                <h4 class="text-white">Manga Terbaru</h4>
            </div>
            <div class="full-manga mb-3 mb-sm-0 align-self-end">
                <a href="<?= base_url(); ?>komik">Selengkapnya >></a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 border-col">
                <div class="new-manga">
                    <div class="row g-4">
                        <?php foreach ($komik as $k) {
                            $slg = str_replace("-", "_", $k->slug_turunan);

                        ?>
                        <div class="col-lg-2 col-md-3 col-sm-4 col-6 wow fadeInUp" data-wow-delay="0.3s">
                            <a href="<?= base_url(); ?>komik/komik_chapter/<?= $k->slug; ?>/<?= $k->id_nama_komik; ?>"
                                title="<?= $k->nama; ?> Chapter <?= $k->chapter; ?>">
                                <div class="img">
                                    <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/thumbnail/<?= $k->image; ?>"
                                        class="img-fluid w-100" alt="">
                                </div>
                                <div class="content px-1 py-2">
                                    <p><?= $k->nama; ?></p>
                                    <div class="d-flex justify-content-between mt-3">
                                        <span class="chapter">Ch. <?= $k->chapter; ?></span>
                                        <span><?= time_ago($k->createDate); ?></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                    </div>

                </div>
            </div>




        </div>
    </div>
</div>


<div class="container-xxl popular-manga">
    <div class="container py-5">
        <div class="header-title text-start pb-4 wow fadeInUp" data-wow-delay="0.3s">
            <h1>Popular Manga</h1>
        </div>
        <?php foreach ($new_komik as $nk) {
            $slg = str_replace("-", "_", $nk->slug_turunan);
            $chFirst = $this->db->query("SELECT a.chapter, a.createDate, a.id_nama_komik FROM tbl_komik a LEFT JOIN tbl_nama_komik b ON a.id_nama_komik = b.id WHERE a.id_nama_komik = '" . $nk->id . "' ORDER BY a.createDate ASC LIMIT 1 ")->row();
            $chLast = $this->db->query("SELECT a.chapter, a.createDate, a.id_nama_komik FROM tbl_komik a LEFT JOIN tbl_nama_komik b ON a.id_nama_komik = b.id WHERE a.id_nama_komik = '" . $nk->id . "' ORDER BY a.createDate DESC LIMIT 1 ")->row();

        ?>
        <a href="<?= base_url(); ?>komik/komik_detail/<?= $nk->slug; ?>" class="box-manga wow fadeInUp"
            data-wow-delay="0.3s" title="<?= $nk->nama; ?>">
            <div class="img">
                <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/thumbnail/<?= $nk->image; ?>"
                    class="img-fluid w-100" alt="">
                <div class="view">
                    <p>Viewer : <?= $nk->jml; ?></p>
                </div>
            </div>
            <div class="content px-1 py-2">
                <p><?= $nk->nama; ?></p>
                <div class="d-flex justify-content-between mt-3">

                    <span class="chapter">Ch. <?php if (isset($chFirst->chapter)) { ?>
                        <?= $chFirst->chapter; ?> - <?= $chLast->chapter; ?>
                        <?php } else { ?>
                        0
                        <?php } ?>
                    </span>

                    <span><?= time_ago($nk->tgl_rilis); ?></span>
                </div>
            </div>
        </a>
        <?php } ?>
    </div>
</div>