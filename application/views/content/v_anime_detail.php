<?php
$uri2 = $this->uri->segment(2);
$uri3 = $this->uri->segment(3);

?>

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
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
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
<?php if ($uri2 == 'anime_eps') { ?>
<?php $slg = str_replace("-", "_", $anime->url_segment); ?>
<div class="container-xxl anime-detail-eps ss">
    <div class="container py-5">
        <div class="row pb-5">
            <div class="col-lg-8">
                <div class="header-title-detail">
                    <h2 class="text-white"><?= $anime->nama; ?> Episode <?= $anime->episode; ?> Subtitle Indonesia</h2>
                </div>
                <ul class="breadcrumb mb-0">
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li><a
                            href="<?= base_url(); ?>anime/anime_detail/<?= $anime->url_segment; ?>"><?= $anime->nama; ?></a>
                    </li>
                    <li><?= $anime->nama; ?> Episode <?= $anime->episode; ?> Subtitle Indonesia</li>
                </ul>
                <div class="share my-3">
                    <a onclick="is_share(<?= $anime->id; ?>,'facebook')"
                        href="https://www.facebook.com/sharer.php?u=<?= base_url(); ?>anime/anime_eps/<?= $anime->slug; ?>/<?= $anime->id_anime; ?>"
                        target="_blank" rel="nofollow" class="rounded-3 text-white py-1 px-2" title="Share ke Facebook"
                        style="background: #36528C;">
                        <i class="fa fa-facebook me-1"></i>
                        SHARE
                    </a>
                    <a onclick="is_share(<?= $anime->id; ?>,'twitter')"
                        href="https://twitter.com/intent/tweet?text=<?= base_url(); ?>anime/anime_eps/<?= $anime->slug; ?>/<?= $anime->id_anime; ?>"
                        target="_blank" rel="nofollow" class="rounded-3 text-white py-1 px-2 mx-3"
                        title="Share ke Twitter" style="background: #1D9BF0;">
                        <i class="fa fa-twitter me-1"></i>
                        SHARE
                    </a>
                    <a onclick="is_share(<?= $anime->id; ?>,'whatsapp')"
                        href="//api.whatsapp.com/send?text=<?= base_url(); ?>anime/anime_eps/<?= $anime->slug; ?>/<?= $anime->id_anime; ?>"
                        target="_blank" rel="nofollow" class="rounded-3 text-white py-1 px-2" title="Share ke WhatsApp"
                        style="background: #00AF65;">
                        <i class="fa fa-whatsapp me-1"></i>
                        SHARE
                    </a>
                </div>
                <p class="text-white release">UP
                    <?= format_hari_tanggal(date('d M Y, l h:i', strtotime($anime->createDate))); ?>
                    <?= date('h:i', strtotime($anime->createDate)); ?> Wib<span class="ms-3 text-white">Episode
                        <?= $anime->episode; ?></span></p>
            </div>
            <div class="col-lg-8">

                <div class="video pt-3">
                    <video width="100%" controls>
                        <source src="https://admin103.geraianime.com/upload/<?= $slg; ?>/series/<?= $anime->video; ?>"
                            type="video/mp4">
                    </video>
                </div>
                <div class="row mt-4 text-center justify-content-center">
                    <?php $page = $this->db->query("SELECT * FROM tbl_anime_list WHERE slug = '" . $uri3 . "'")->row(); ?>

                    <?php foreach ($this->db->query("SELECT a.slug, a.id_anime, a.episode, b.nama FROM tbl_anime_list a LEFT JOIN tbl_nama_anime b ON a.id_anime = b.id WHERE a.id_anime = '" . $page->id_anime . "' AND a.episode < '" . $page->episode . "'  ORDER BY episode DESC LIMIT 1")->result() as $al) { ?>
                    <div class="col-sm-6 text-center text-sm-end">
                        <a href="<?= base_url(); ?>anime/anime_eps/<?= $al->slug; ?>/<?= $al->id_anime; ?>"
                            class="box-next"
                            title="<?= $al->nama; ?> Episode <?= $al->episode; ?> Subtitle Indonesia"><?= $al->nama; ?>
                            Episode
                            <?= $al->episode; ?></a>
                    </div>
                    <?php } ?>

                    <?php foreach ($this->db->query("SELECT a.slug, a.id_anime, a.episode, b.nama FROM tbl_anime_list a LEFT JOIN tbl_nama_anime b ON a.id_anime = b.id WHERE a.id_anime = '" . $page->id_anime . "' AND a.episode > '" . $page->episode . "'  ORDER BY episode ASC LIMIT 1")->result() as $al) { ?>
                    <div class="col-sm-6 text-center text-sm-start mt-4 mt-sm-0">
                        <a href="<?= base_url(); ?>anime/anime_eps/<?= $al->slug; ?>/<?= $al->id_anime; ?>"
                            class="box-next"
                            title="<?= $al->nama; ?> Episode <?= $al->episode; ?> Subtitle Indonesia"><?= $al->nama; ?>
                            Episode
                            <?= $al->episode; ?></a>
                    </div>
                    <?php } ?>
                </div>

                <div class="box-advert mt-4">
                    <?php if ($bIklan7->image != '') { ?>
                    <a href="<?= $bIklan7->url; ?>">
                        <img src="https://admin103.geraianime.com/upload/iklan/<?= $bIklan7->image; ?>"
                            class="img-fluid w-100" alt="<?= $bIklan7->nama; ?>" title="<?= $bIklan7->nama; ?>">
                    </a>
                    <?php } else { ?>
                    <img src="<?= base_url(); ?>assets/img/detail_iklan1.jpg" class="img-fluid w-100" alt="">
                    <?php } ?>
                </div>

                <div class="about-anime mt-4 d-block d-lg-none">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td width="150px">Judul</td>
                                <td width="20px">:</td>
                                <td><a href="<?= base_url(); ?>anime/anime_detail/<?= $anime->url_segment; ?>"
                                        title="Anime <?= $anime->nama; ?> Subtitle Indonesia"
                                        class="txt-orange"><?= $anime->nama; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td width="150px">Episodes</td>
                                <td width="20px">:</td>
                                <td><?= $anime->episode; ?></td>
                            </tr>
                            <tr>
                                <td width="150px">Studio</td>
                                <td width="20px">:</td>
                                <td><?= $anime->studio == '' ? '???' : $anime->studio; ?></td>
                            </tr>
                            <tr>
                                <td width="150px">Durasi</td>
                                <td width="20px">:</td>
                                <td><?= $anime->durasi == '' ? '???' : $anime->durasi . ' Menit'; ?> </td>
                            </tr>
                            <style>
                            table tr td i {
                                margin-right: 5px;
                            }

                            table tr td i:first-child {
                                display: none;
                            }
                            </style>
                            <tr>
                                <td width="150px">Genre</td>
                                <td width="20px">:</td>
                                <td>
                                    <?php foreach ($this->db->query("SELECT * FROM tbl_genre a LEFT JOIN tbl_genre_detail b ON a.id=b.genreID WHERE b.animeID = '" . $anime->id_nama . "'")->result() as $g) { ?>
                                    <i>,</i><span> <?= $g->nama; ?> </span>
                                    <?php  } ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="150px">Score</td>
                                <td width="20px">:</td>
                                <td><?= $anime->score == '' ? '???' : $anime->score; ?></td>

                            </tr>
                            <tr>
                                <td width="25%">Status</td>
                                <td>:</td>
                                <td><?= $anime->status; ?></td>

                            </tr>
                        </tbody>
                    </table>
                    <div class="desk pt-2 pb-4 pb-lg-0">
                        <div class="sinopsis my-3">
                            <h4 class="text-white">Sinopsis</h4>
                        </div>
                        <?= $anime->deskripsi; ?>
                    </div>
                </div>


            </div>
            <div class="col-lg-4">
                <div class="box-advert pt-3">
                    <?php if ($bIklan6->image != '') { ?>
                    <a href="<?= $bIklan6->url; ?>">
                        <img src="https://admin103.geraianime.com/upload/iklan/<?= $bIklan6->image; ?>"
                            class="img-fluid w-100" alt="<?= $bIklan6->nama; ?>" title="<?= $bIklan6->nama; ?>">
                    </a>
                    <?php } else { ?>
                    <img src="<?= base_url(); ?>assets/img/iklan2.jpg" class="img-fluid w-100" alt="">
                    <?php } ?>
                </div>
                <div class="side-other-movies">
                    <div class="header-title py-2 px-3 text-center mt-4">
                        <h4>Rekomendasi Anime</h4>
                    </div>
                    <div class="row g-4 mt-4">
                        <?php foreach ($recomend_anime as $ra) {
                                $slg = str_replace("-", "_", $ra->slug);

                            ?>
                        <div class="col-lg-4 col-md-2 col-4">
                            <a href="<?= base_url(); ?>anime/anime_detail/<?= $ra->slug; ?>"
                                title="Anime <?= $ra->nama; ?> Subtitle Indonesia">
                                <div class="img">
                                    <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/thumbnail/<?= $ra->image; ?>"
                                        class="img-fluid w-100" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-8 col-md-4 col-8">
                            <a href="<?= base_url(); ?>anime/anime_detail/<?= $ra->slug; ?>"
                                title="Anime <?= $ra->nama; ?> Subtitle Indonesia">
                                <div class="content">
                                    <p><?= $ra->nama; ?> Subtitle Indonesia</p>
                                    <span>UP
                                        <?= format_hari_tanggal(date('l d M Y', strtotime($ra->tgl_rilis))); ?></span>
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
        <div class="border-top border-3 border-white pt-4" style="margin-right: calc(var(--bs-gutter-x) / 2);
                margin-left: calc(var(--bs-gutter-x) / 2);"></div>
        <div class="row">
            <div class="col-lg-8">
                <div class="about-anime d-none d-lg-block">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td width="150px">Judul</td>
                                <td width="20px">:</td>
                                <td><a href="<?= base_url(); ?>anime/anime_detail/<?= $anime->url_segment; ?>"
                                        title="Anime <?= $anime->nama; ?> Subtitle Indonesia"
                                        class="txt-orange"><?= $anime->nama; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td width="150px">Episodes</td>
                                <td width="20px">:</td>
                                <td><?= $anime->episode; ?></td>
                            </tr>
                            <tr>
                                <td width="150px">Studio</td>
                                <td width="20px">:</td>
                                <td><?= $anime->studio == '' ? '???' : $anime->studio; ?></td>
                            </tr>
                            <tr>
                                <td width="150px">Durasi</td>
                                <td width="20px">:</td>
                                <td><?= $anime->durasi == '' ? '???' : $anime->durasi . ' Menit'; ?> </td>
                            </tr>
                            <style>
                            table tr td i {
                                margin-right: 5px;
                            }

                            table tr td i:first-child {
                                display: none;
                            }
                            </style>
                            <tr>
                                <td width="150px">Genre</td>
                                <td width="20px">:</td>
                                <td>
                                    <?php foreach ($this->db->query("SELECT * FROM tbl_genre a LEFT JOIN tbl_genre_detail b ON a.id=b.genreID WHERE b.animeID = '" . $anime->id_nama . "'")->result() as $g) { ?>
                                    <i>,</i><span> <?= $g->nama; ?> </span>
                                    <?php  } ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="150px">Score</td>
                                <td width="20px">:</td>
                                <td><?= $anime->score == '' ? '???' : $anime->score; ?></td>

                            </tr>
                            <tr>
                                <td width="25%">Status</td>
                                <td>:</td>
                                <td><?= $anime->status; ?></td>

                            </tr>
                        </tbody>
                    </table>
                    <div class="desk pt-2 pb-4 pb-lg-0">
                        <div class="sinopsis my-3">
                            <h4 class="text-white">Sinopsis</h4>
                        </div>
                        <?= $anime->deskripsi; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box-advert">
                    <?php if ($bIklan8->image != '') { ?>
                    <a href="<?= $bIklan8->url; ?>">
                        <img src="https://admin103.geraianime.com/upload/iklan/<?= $bIklan8->image; ?>"
                            class="img-fluid w-100" alt="<?= $bIklan8->nama; ?>" title="<?= $bIklan8->nama; ?>">
                    </a>
                    <?php } else { ?>
                    <img src="<?= base_url(); ?>assets/img/detail_iklan2.jpg" class="img-fluid w-100" alt="">
                    <?php } ?>
                </div>
                <div class="box-advert mt-4">
                    <?php if ($bIklan9->image != '') { ?>
                    <a href="<?= $bIklan9->url; ?>">
                        <img src="https://admin103.geraianime.com/upload/iklan/<?= $bIklan9->image; ?>"
                            class="img-fluid w-100" alt="<?= $bIklan9->nama; ?>" title="<?= $bIklan9->nama; ?>">
                    </a>
                    <?php } else { ?>
                    <img src="<?= base_url(); ?>assets/img/detail_iklan2.jpg" class="img-fluid w-100" alt="">
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="anime-eps-container text-center" align="center">
            <div class="header-title text-start mb-4 mt-5">
                <h1>Anime Terbaru</h1>
            </div>
            <div class="row g-4">
                <?php foreach ($anime_terbaru as $at) {
                        $slg = str_replace("-", "_", $at->url_segment);
                    ?>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="box-anime-eps position-relative">
                        <a href="<?= base_url(); ?>anime/anime_eps/<?= $at->slug; ?>/<?= $at->id_anime; ?>"
                            title="<?= $at->nama; ?> Episode <?= $at->episode; ?> Subtitle Indonesia">
                            <div class="anime-eps-wrap">
                                <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/thumbnail/<?= $at->image; ?>"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="episode py-1 px-2">
                                <p>Episode <?= $at->episode; ?></p>
                            </div>
                            <div class="content">
                                <p class="mb-1"><?= $at->nama; ?></p>
                                <span><?= time_ago($at->createDate); ?></span>
                            </div>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>

        </div>
    </div>
</div>

<?php } elseif ($uri2 == 'anime_detail') { ?>
<?php $slg = str_replace("-", "_", $anime_detail->slug); ?>

<div class="container-xxl anime-detail">
    <div class="container py-5">
        <div class="row pb-5">
            <div class="col-lg-8">
                <div class="header-title-detail">
                    <h2 class="text-white"><?= $anime_detail->nama; ?> Subtitle Indonesia</h2>
                </div>
                <ul class="breadcrumb mb-0">
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li><?= $anime_detail->nama; ?> Subtitle Indonesia</li>
                </ul>
                <div class="share my-3">
                    <a onclick="is_share(<?= $anime_detail->id; ?>,'facebook')"
                        href="https://www.facebook.com/sharer.php?u=<?= base_url(); ?>anime/anime_detail/<?= $anime_detail->slug; ?>"
                        target="_blank" rel="nofollow" class="rounded-3 text-white py-1 px-2" title="Share ke Facebook"
                        style="background: #36528C;">
                        <i class="fa fa-facebook me-1"></i>
                        SHARE
                    </a>
                    <a onclick="is_share(<?= $anime_detail->id; ?>,'twitter')"
                        href="https://twitter.com/intent/tweet?text=<?= base_url(); ?>anime/anime_detail/<?= $anime_detail->slug; ?>"
                        target="_blank" rel="nofollow" class="rounded-3 text-white py-1 px-2 mx-3"
                        title="Share ke Twitter" style="background: #1D9BF0;">
                        <i class="fa fa-twitter me-1"></i>
                        SHARE
                    </a>
                    <a onclick="is_share(<?= $anime_detail->id; ?>,'whatsapp')"
                        href="//api.whatsapp.com/send?text=<?= base_url(); ?>anime/anime_detail/<?= $anime_detail->slug; ?>"
                        target="_blank" rel="nofollow" class="rounded-3 text-white py-1 px-2" title="Share ke WhatsApp"
                        style="background: #00AF65;">
                        <i class="fa fa-whatsapp me-1"></i>
                        SHARE
                    </a>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-8">
                <div class="img-detail mb-4">
                    <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/<?= $anime_detail->image; ?>"
                        class="img-fluid" alt="" title="<?= $anime_detail->nama; ?> Subtitle Indonesia">
                </div>
                <div class="about-anime">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>Judul</td>
                                <td>:</td>
                                <td><?= $anime_detail->nama; ?></td>
                            </tr>
                            <!-- <tr>
                                <td>Episodes</td>
                                <td>:</td>
                                <td><?= $anime_detail->episode; ?></td>
                            </tr> -->
                            <tr>
                                <td>Studio</td>
                                <td>:</td>
                                <td><?= $anime_detail->studio == '' ? '???' : $anime_detail->studio; ?></td>
                            </tr>
                            <tr>
                                <td>Durasi</td>
                                <td>:</td>
                                <td><?= $anime_detail->durasi == '' ? '???' : $anime_detail->durasi . ' Menit'; ?> </td>
                            </tr>
                            <style>
                            table tr td i {
                                margin-right: 5px;
                            }

                            table tr td i:first-child {
                                display: none;
                            }
                            </style>
                            <tr>
                                <td>Genre</td>
                                <td>:</td>
                                <td>
                                    <?php foreach ($this->db->query("SELECT * FROM tbl_genre a LEFT JOIN tbl_genre_detail b ON a.id=b.genreID WHERE b.animeID = '" . $anime_detail->id . "'")->result() as $g) { ?>
                                    <i>,</i><span> <?= $g->nama; ?> </span>
                                    <?php  } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Score</td>
                                <td>:</td>
                                <td><?= $anime_detail->score == '' ? '???' : $anime_detail->score; ?></td>

                            </tr>
                            <tr>
                                <td width="25%">Status</td>
                                <td>:</td>
                                <td><?= $anime_detail->status; ?></td>

                            </tr>
                        </tbody>
                    </table>
                    <div class="desk pt-2 pb-4 pb-lg-0">
                        <div class="sinopsis my-3">
                            <h4 class="text-white">Sinopsis</h4>
                        </div>
                        <?= $anime_detail->deskripsi; ?>
                    </div>
                </div>

                <div class="anime-eps-container text-center d-block d-lg-none" align="center">
                    <div class="header-title text-start mb-4">
                        <h1>Episode List</h1>
                    </div>
                    <?php foreach ($episode_list as $el) { ?>
                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url(); ?>anime/anime_eps/<?= $el->slug; ?>/<?= $el->id_anime; ?>"
                            title="<?= $el->nama; ?> Episode <?= $el->episode; ?>">
                            <p><?= $el->nama; ?> Episode <?= $el->episode; ?> Subtitle Indonesia</p>
                        </a>
                        <span><?= date('d F Y', strtotime($el->createDate)); ?></span>
                    </div>
                    <?php } ?>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="box-advert mt-4 mt-lg-0">
                    <?php if ($bIklan10->image != '') { ?>
                    <a href="<?= $bIklan10->url; ?>">
                        <img src="https://admin103.geraianime.com/upload/iklan/<?= $bIklan10->image; ?>"
                            class="img-fluid w-100" alt="<?= $bIklan10->nama; ?>" title="<?= $bIklan10->nama; ?>">
                    </a>
                    <?php } else { ?>
                    <img src="<?= base_url(); ?>assets/img/iklan2.jpg" class="img-fluid w-100" alt="">
                    <?php } ?>
                </div>
                <div class="side-other-movies">
                    <div class="header-title py-2 px-3 text-center mt-4">
                        <h4>Rekomendasi Anime Lainnya</h4>
                    </div>
                    <div class="row g-4 mt-4">
                        <?php foreach ($recomend_anime as $ra) {
                                $slg = str_replace("-", "_", $ra->slug);

                            ?>
                        <div class="col-4 col-md-2 col-lg-4">
                            <a href="<?= base_url(); ?>anime/anime_detail/<?= $ra->slug; ?>"
                                title="<?= $ra->nama; ?> Subtitle Indonesia">
                                <div class="img">
                                    <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/thumbnail/<?= $ra->image; ?>"
                                        class="img-fluid w-100" alt="">
                                </div>
                            </a>

                        </div>
                        <div class="col-8 col-md-4 col-lg-8 px-0">
                            <a href="<?= base_url(); ?>anime/anime_detail/<?= $ra->slug; ?>"
                                title="<?= $ra->nama; ?> Subtitle Indonesia">
                                <div class="content ms-2">
                                    <p><?= $ra->nama; ?> Subtitle Indonesia</p>
                                    <span>UP
                                        <?= format_hari_tanggal(date('l d M Y', strtotime($ra->tgl_rilis))); ?></span>
                                </div>
                            </a>
                        </div>
                        <?php } ?>

                    </div>

                </div>
            </div>
        </div>
        <div class="anime-eps-container text-center d-none d-lg-block" align="center">
            <div class="header-title text-start mb-4 mt-5">
                <h1>Episode List</h1>
            </div>
            <?php foreach ($episode_list as $el) { ?>
            <div class="d-flex justify-content-between">
                <a href="<?= base_url(); ?>anime/anime_eps/<?= $el->slug; ?>/<?= $el->id_anime; ?>"
                    title="<?= $el->nama; ?> Episode <?= $el->episode; ?>">
                    <p><?= $el->nama; ?> Episode <?= $el->episode; ?> Subtitle Indonesia</p>
                </a>
                <span><?= date('d F Y', strtotime($el->createDate)); ?></span>
            </div>
            <?php } ?>
        </div>
    </div>
</div>


<?php } ?>


<script>
function is_share(id, sosmed) {
    base_url = '<?php echo base_url(); ?>';
    $.ajax({
        type: "POST",
        url: base_url + "ShareSosmed",
        dataType: "JSON",
        data: {
            'id': id,
            'sosmed': sosmed
        },
        success: function(response) {
            $('#count_' + sosmed).html(response.jumlah)
        },
        error: function() {}
    });

}
</script>