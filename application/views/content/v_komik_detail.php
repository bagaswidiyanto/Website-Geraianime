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
<?php if ($uri2 == 'komik_chapter') {
    $slg = str_replace("-", "_", $komik->slug_turunan);

?>
<div class="container-xxl manga-detail-chapter">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="header-title-detail wow fadeInUp" data-wow-delay="0.3s">
                    <h2 class="text-white"><?= $komik->nama; ?> Chapter <?= $komik->chapter; ?> Bahasa Indonesia</h2>
                </div>
                <ul class="breadcrumb mb-0 wow fadeInUp" data-wow-delay="0.3s">
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li><a
                            href="<?= base_url(); ?>komik/komik_detail/<?= $komik->slgDetail; ?>"><?= $komik->nama; ?></a>
                    </li>
                    <li><?= $komik->nama; ?> Chapter <?= $komik->chapter; ?> Bahasa Indonesia</li>
                </ul>
                <div class="share my-3 wow fadeInUp" data-wow-delay="0.3s">
                    <a onclick="is_share(<?= $komik->id; ?>,'facebook')"
                        href="https://www.facebook.com/sharer.php?u=<?= base_url(); ?>komik/komik_chapter/<?= $komik->slug; ?>/<?= $komik->id_nama_komik; ?>"
                        target="_blank" rel="nofollow" class="rounded-3 text-white py-1 px-2" title="Share ke Facebook"
                        style="background: #36528C;">
                        <i class="fa fa-facebook me-1"></i>
                        SHARE
                    </a>
                    <a onclick="is_share(<?= $komik->id; ?>,'twitter')"
                        href="https://twitter.com/intent/tweet?text=<?= base_url(); ?>komik/komik_chapter/<?= $komik->slug; ?>/<?= $komik->id_nama_komik; ?>"
                        target="_blank" rel="nofollow" class="rounded-3 text-white py-1 px-2 mx-3"
                        title="Share ke Twitter" style="background: #1D9BF0;">
                        <i class="fa fa-twitter me-1"></i>
                        SHARE
                    </a>
                    <a onclick="is_share(<?= $komik->id; ?>,'whatsapp')"
                        href="//api.whatsapp.com/send?text=<?= base_url(); ?>komik/komik_chapter/<?= $komik->slug; ?>/<?= $komik->id_nama_komik; ?>"
                        target="_blank" rel="nofollow" class="rounded-3 text-white py-1 px-2" title="Share ke WhatsApp"
                        style="background: #00AF65;">
                        <i class="fa fa-whatsapp me-1"></i>
                        SHARE
                    </a>
                </div>
                <p class="text-white release wow fadeInUp" data-wow-delay="0.3s">UP
                    <?= format_hari_tanggal(date('d M Y, l h:i', strtotime($komik->createDate))); ?>
                    <?= date('h:i', strtotime($komik->createDate)); ?> Wib <span class="ms-3 text-white">Chapter
                        <?= $komik->chapter; ?></span></p>
            </div>
        </div>
        <div class="row justify-content-center mt-4 text-center wow fadeInUp" data-wow-delay="0.3s">
            <?php $page = $this->db->query("SELECT * FROM tbl_komik WHERE slug = '" . $uri3 . "'")->row(); ?>

            <?php foreach ($this->db->query("SELECT a.slug, a.id_nama_komik, a.chapter, b.nama FROM tbl_komik a LEFT JOIN tbl_nama_komik b ON a.id_nama_komik = b.id WHERE a.id_nama_komik = '" . $page->id_nama_komik . "' AND a.chapter < '" . $page->chapter . "'  ORDER BY chapter DESC LIMIT 1")->result() as $k) { ?>
            <div class="col-sm-6 text-center text-sm-end">
                <a href="<?= base_url(); ?>komik/komik_chapter/<?= $k->slug; ?>/<?= $k->id_nama_komik; ?>"
                    class="box-next" title="<?= $k->nama; ?> Chapter <?= $k->chapter; ?>"><?= $k->nama; ?> Chapter
                    <?= $k->chapter; ?></a>
            </div>
            <?php } ?>
            <?php foreach ($this->db->query("SELECT a.slug, a.id_nama_komik, a.chapter, b.nama FROM tbl_komik a LEFT JOIN tbl_nama_komik b ON a.id_nama_komik = b.id WHERE a.id_nama_komik = '" . $page->id_nama_komik . "' AND a.chapter > '" . $page->chapter . "'  ORDER BY chapter ASC LIMIT 1")->result() as $k) { ?>
            <div class="col-sm-6 text-center text-sm-start mt-4 mt-sm-0">
                <a href="<?= base_url(); ?>komik/komik_chapter/<?= $k->slug; ?>/<?= $k->id_nama_komik; ?>"
                    class="box-next" title="<?= $k->nama; ?> Chapter <?= $k->chapter; ?>"><?= $k->nama; ?> Chapter
                    <?= $k->chapter; ?></a>
            </div>
            <?php } ?>
        </div>
        <div class="row justify-content-center my-4">
            <div class="col-lg-9">
                <div class="read-komik text-center">
                    <?php foreach ($this->db->query("SELECT tbl_komik_detail.image, tbl_komik.slug_turunan, tbl_komik.chapter FROM tbl_komik_detail LEFT JOIN tbl_komik ON tbl_komik_detail.header=tbl_komik.id_komik  WHERE header = '" . $komik->id_komik . "'")->result() as $kd) {
                            $slg = str_replace("-", "_", $kd->slug_turunan);

                        ?>
                    <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/manga/chapter_<?= $kd->chapter; ?>/<?= $kd->image; ?>"
                        alt="" class="img-fluid wow fadeInUp" data-wow-delay="0.3s">
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="row justify-content-center text-center wow fadeInUp" data-wow-delay="0.3s">
            <?php $page = $this->db->query("SELECT * FROM tbl_komik WHERE slug = '" . $uri3 . "'")->row(); ?>

            <?php foreach ($this->db->query("SELECT a.slug, a.id_nama_komik, a.chapter, b.nama FROM tbl_komik a LEFT JOIN tbl_nama_komik b ON a.id_nama_komik = b.id WHERE a.id_nama_komik = '" . $page->id_nama_komik . "' AND a.chapter < '" . $page->chapter . "'  ORDER BY chapter DESC LIMIT 1")->result() as $k) { ?>
            <div class="col-sm-6 text-center text-sm-end">
                <a href="<?= base_url(); ?>komik/komik_chapter/<?= $k->slug; ?>/<?= $k->id_nama_komik; ?>"
                    class="box-next" title="<?= $k->nama; ?> Chapter <?= $k->chapter; ?>"><?= $k->nama; ?> Chapter
                    <?= $k->chapter; ?></a>
            </div>
            <?php } ?>
            <?php foreach ($this->db->query("SELECT a.slug, a.id_nama_komik, a.chapter, b.nama FROM tbl_komik a LEFT JOIN tbl_nama_komik b ON a.id_nama_komik = b.id WHERE a.id_nama_komik = '" . $page->id_nama_komik . "' AND a.chapter > '" . $page->chapter . "'  ORDER BY chapter ASC LIMIT 1")->result() as $k) { ?>
            <div class="col-sm-6 text-center text-sm-start mt-4 mt-sm-0">
                <a href="<?= base_url(); ?>komik/komik_chapter/<?= $k->slug; ?>/<?= $k->id_nama_komik; ?>"
                    class="box-next" title="<?= $k->nama; ?> Chapter <?= $k->chapter; ?>"><?= $k->nama; ?> Chapter
                    <?= $k->chapter; ?></a>
            </div>
            <?php } ?>
        </div>
        <div class="row my-4">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="img-detail text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp"
                            data-wow-delay="0.3s">
                            <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/<?= $komik->image; ?>"
                                class="img-fluid" alt="" title="Komik <?= $komik->nama; ?>">
                        </div>

                    </div>
                    <div class="col-lg-8">
                        <div class="about-anime">
                            <table class="table table-striped wow fadeInUp" data-wow-delay="0.3s">
                                <tbody>
                                    <tr>
                                        <td width="32%">Judul</td>
                                        <td>:</td>
                                        <td><a href="<?= base_url(); ?>komik/komik_detail/<?= $komik->slgDetail; ?>"
                                                title="Komik <?= $komik->nama; ?>"
                                                class="txt-orange"><?= $komik->nama; ?></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="32%">Tanggal Rilis</td>
                                        <td>:</td>
                                        <td><?= date('d F Y', strtotime($komik->tgl_rilis)); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="32%">Pengarang</td>
                                        <td>:</td>
                                        <td><?= $komik->pengarang == '' ? '???' : $komik->pengarang; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="32%">Ilustrator</td>
                                        <td>:</td>
                                        <td><?= $komik->ilustrator == '' ? '???' : $komik->ilustrator; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="32%">Jenis Komik</td>
                                        <td>:</td>
                                        <td><?= $komik->jenis_komik == '' ? '???' : $komik->jenis_komik; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="32%">Studio</td>
                                        <td>:</td>
                                        <td><?= $komik->studio == '' ? '???' : $komik->studio; ?></td>
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
                                        <td width="32%">Genre</td>
                                        <td>:</td>
                                        <td>
                                            <?php foreach ($this->db->query("SELECT * FROM tbl_genre a LEFT JOIN tbl_genre_detail_komik b ON a.id=b.genreID WHERE b.komikID = '" . $komik->id_nama . "'")->result() as $g) { ?>
                                            <i>,</i><span> <?= $g->nama; ?> </span>
                                            <?php  } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="32%">Score</td>
                                        <td>:</td>
                                        <td><?= $komik->score == '' ? '???' : $komik->score; ?></td>

                                    </tr>
                                    <tr>
                                        <td width="25%">Status</td>
                                        <td>:</td>
                                        <td><?= $komik->status; ?></td>

                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                <div class="chapter_list mt-3">
                    <?php foreach ($chapter_list as $cl) { ?>
                    <div class="box wow fadeInUp" data-wow-delay="0.3s">
                        <a href="<?= base_url(); ?>komik/komik_chapter/<?= $cl->slug; ?>/<?= $cl->id_nama_komik; ?>"
                            title="Chapter <?= $cl->chapter; ?>">
                            <p>Chapter <?= $cl->chapter; ?></p>
                            <span><?= time_ago($cl->createDate); ?></span>
                        </a>
                    </div>
                    <?php } ?>
                </div>
                <div class="desk pt-2 pb-4 pb-lg-0 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="sinopsis my-3">
                        <h4 class="text-white">Sinopsis</h4>
                    </div>
                    <?= $komik->deskripsi; ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box-advert wow fadeInUp" data-wow-delay="0.3s">
                    <?php if ($bIklan11->aktif != 0) { ?>
                    <a href="<?= $bIklan11->url; ?>">
                        <img src="https://admin103.geraianime.com/upload/iklan/<?= $bIklan11->image; ?>"
                            class="img-fluid w-100" alt="<?= $bIklan11->nama; ?>" title="<?= $bIklan11->nama; ?>">
                    </a>
                    <?php } else { ?>
                    <img src="<?= base_url() ?>assets/img/iklan2.jpg" class="img-fluid w-100" alt="">
                    <?php } ?>
                </div>
                <div class="side-other-manga">
                    <div class="header-title py-2 px-3 text-center mt-4 wow fadeInUp" data-wow-delay="0.3s">
                        <h4>Rekomendasi Manga</h4>
                    </div>
                    <div class="row g-4 mt-4">
                        <?php foreach ($recomend_manga as $rm) {
                                $slg = str_replace("-", "_", $rm->slug_turunan);

                            ?>
                        <div class="col-lg-4 col-md-2 col-4 wow fadeInUp" data-wow-delay="0.3s">
                            <a href="<?= base_url(); ?>komik/komik_detail/<?= $rm->slug; ?>">
                                <div class="img">
                                    <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/thumbnail/<?= $rm->image; ?>"
                                        class="img-fluid w-100" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-8 col-md-4 col-8 wow fadeInUp" data-wow-delay="0.3s">
                            <a href="<?= base_url(); ?>komik/komik_detail/<?= $rm->slug; ?>">
                                <div class="content">
                                    <p><?= $rm->nama; ?> Bahasa Indonesia</p>
                                    <span>UP
                                        <?= format_hari_tanggal(date('l d M Y', strtotime($rm->tgl_rilis))); ?></span>
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>


        <div class="manga-chp-container text-center" align="center">
            <div class="header-title text-start mb-4 mt-5 wow fadeInUp" data-wow-delay="0.3s">
                <h1>Baca Juga Manga terupdate </h1>
            </div>
            <div class="row">
                <?php foreach ($update_manga as $um) {
                        $slg = str_replace("-", "_", $um->slug_turunan);
                    ?>
                <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="box-manga-latest position-relative">
                        <a href="<?= base_url(); ?>komik/komik_chapter/<?= $um->slug; ?>/<?= $um->id_nama_komik; ?>"
                            title="Komik <?= $um->nama; ?> Chapter <?= $um->chapter; ?>">
                            <div class="manga-latest-wrap">
                                <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/thumbnail/<?= $um->image; ?>"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="content">
                                <p><?= $um->nama; ?></p>
                                <div class="d-flex justify-content-between mt-2">
                                    <span class="chapter">Ch. <?= $um->chapter; ?></span>
                                    <span><?= time_ago($um->createDate); ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>

<?php } elseif ($uri2 == 'komik_detail') {
    $slg = str_replace("-", "_", $komik_detail->slug_turunan);

?>
<div class="container-xxl manga-detail-chapter">
    <div class="container py-5">
        <div class="row pb-5">
            <div class="col-lg-8">
                <div class="header-title-detail wow fadeInUp" data-wow-delay="0.3s">
                    <h2 class="text-white"><?= $komik_detail->nama; ?> Bahasa Indonesia</h2>
                </div>
                <ul class="breadcrumb mb-0 wow fadeInUp" data-wow-delay="0.3s">
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li><?= $komik_detail->nama; ?></li>
                </ul>
                <div class="share my-3 wow fadeInUp" data-wow-delay="0.3s">
                    <a onclick="is_share(<?= $komik_detail->id; ?>,'facebook')"
                        href="https://www.facebook.com/sharer.php?u=<?= base_url(); ?>komik/komik_detail/<?= $komik_detail->slug; ?>"
                        target="_blank" rel="nofollow" class="rounded-3 text-white py-1 px-2" title="Share ke Facebook"
                        style="background: #36528C;">
                        <i class="fa fa-facebook me-1"></i>
                        SHARE
                    </a>
                    <a onclick="is_share(<?= $komik_detail->id; ?>,'twitter')"
                        href="https://twitter.com/intent/tweet?text=<?= base_url(); ?>komik/komik_detail/<?= $komik_detail->slug; ?>"
                        target="_blank" rel="nofollow" class="rounded-3 text-white py-1 px-2 mx-3"
                        title="Share ke Twitter" style="background: #1D9BF0;">
                        <i class="fa fa-twitter me-1"></i>
                        SHARE
                    </a>
                    <a onclick="is_share(<?= $komik_detail->id; ?>,'whatsapp')"
                        href="//api.whatsapp.com/send?text=<?= base_url(); ?>komik/komik_detail/<?= $komik_detail->slug; ?>"
                        target="_blank" rel="nofollow" class="rounded-3 text-white py-1 px-2" title="Share ke WhatsApp"
                        style="background: #00AF65;">
                        <i class="fa fa-whatsapp me-1"></i>
                        SHARE
                    </a>
                </div>
            </div>
        </div>
        <div class="row mb-4">

            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="img-detail text-center text-lg-start mb-4 mb-lg-0 wow fadeInUp"
                            data-wow-delay="0.3s">
                            <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/<?= $komik_detail->image; ?>"
                                class="img-fluid" alt="">
                        </div>

                    </div>
                    <div class="col-lg-8">
                        <div class="about-anime">
                            <table class="table table-striped wow fadeInUp" data-wow-delay="0.3s">
                                <tbody>
                                    <tr>
                                        <td width="32%">Judul</td>
                                        <td>:</td>
                                        <td><?= $komik_detail->nama; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Rilis</td>
                                        <td>:</td>
                                        <td><?= date('d F Y', strtotime($komik_detail->tgl_rilis)); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="32%">Pengarang</td>
                                        <td>:</td>
                                        <td><?= $komik_detail->pengarang == '' ? '???' : $komik_detail->pengarang; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="32%">Ilustrator</td>
                                        <td>:</td>
                                        <td><?= $komik_detail->ilustrator == '' ? '???' : $komik_detail->ilustrator; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="32%">Jenis Komik</td>
                                        <td>:</td>
                                        <td><?= $komik_detail->jenis_komik == '' ? '???' : $komik_detail->jenis_komik; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="32%">Studio</td>
                                        <td>:</td>
                                        <td><?= $komik_detail->studio == '' ? '???' : $komik_detail->studio; ?></td>
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
                                        <td width="32%">Genre</td>
                                        <td>:</td>
                                        <td>
                                            <?php foreach ($this->db->query("SELECT * FROM tbl_genre a LEFT JOIN tbl_genre_detail_komik b ON a.id=b.genreID WHERE b.komikID = '" . $komik_detail->id . "'")->result() as $g) { ?>
                                            <i>,</i><span> <?= $g->nama; ?> </span>
                                            <?php  } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="32%">Score</td>
                                        <td>:</td>
                                        <td><?= $komik_detail->score == '' ? '???' : $komik_detail->score; ?></td>

                                    </tr>
                                    <tr>
                                        <td width="32%">Status</td>
                                        <td>:</td>
                                        <td><?= $komik_detail->status; ?></td>

                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="desk pt-2 pb-4 pb-lg-0 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="sinopsis my-3">
                        <h4 class="text-white">Sinopsis</h4>
                    </div>
                    <?= $komik_detail->deskripsi; ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box-advert wow fadeInUp" data-wow-delay="0.3s">
                    <?php if ($bIklan12->aktif != 0) { ?>
                    <a href="<?= $bIklan12->url; ?>">
                        <img src="https://admin103.geraianime.com/upload/iklan/<?= $bIklan12->image; ?>"
                            class="img-fluid w-100" alt="<?= $bIklan12->nama; ?>" title="<?= $bIklan12->nama; ?>">
                    </a>
                    <?php } else { ?>
                    <img src="<?= base_url() ?>assets/img/iklan2.jpg" class="img-fluid w-100" alt="">
                    <?php } ?>
                </div>
                <div class="side-other-manga">
                    <div class="header-title py-2 px-3 text-center mt-4 wow fadeInUp" data-wow-delay="0.3s">
                        <h4>Rekomendasi Manga</h4>
                    </div>
                    <div class="row g-4 mt-4">
                        <?php foreach ($recomend_manga as $rm) {
                                $slg = str_replace("-", "_", $rm->slug_turunan);

                            ?>
                        <div class="col-lg-4 col-md-2 col-4 wow fadeInUp" data-wow-delay="0.3s">
                            <a href="<?= base_url(); ?>komik/komik_detail/<?= $rm->slug; ?>">
                                <div class="img">
                                    <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/thumbnail/<?= $rm->image; ?>"
                                        class="img-fluid w-100" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-8 col-md-4 col-8 wow fadeInUp" data-wow-delay="0.3s">
                            <a href="<?= base_url(); ?>komik/komik_detail/<?= $rm->slug; ?>">
                                <div class="content">
                                    <p><?= $rm->nama; ?> Bahasa Indonesia</p>
                                    <span>UP
                                        <?= format_hari_tanggal(date('l d M Y', strtotime($rm->tgl_rilis))); ?></span>
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-top border-3 border-white" style="margin-right: calc(var(--bs-gutter-x) / 2);
            margin-left: calc(var(--bs-gutter-x) / 2);"></div>
        <div class="row">
            <div class="col-lg-8">
                <div class="header-title my-4 wow fadeInUp" data-wow-delay="0.3s">
                    <h1>Chapter List</h1>
                </div>
                <div class="box-scroll-chapter">
                    <?php foreach ($chapter_list as $cl) { ?>
                    <a href="<?= base_url(); ?>komik/komik_chapter/<?= $cl->slg; ?>/<?= $cl->id_nama_komik; ?>">
                        <div class="chapter wow fadeInUp" data-wow-delay="0.3s">
                            <p><?= $cl->nama; ?> Chapter <?= $cl->chapter; ?></p>
                            <span><?= time_ago($cl->createDate); ?></span>
                        </div>
                    </a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box-advert mt-5 wow fadeInUp" data-wow-delay="0.3s">
                    <?php if ($bIklan13->aktif != 0) { ?>
                    <a href="<?= $bIklan13->url; ?>">
                        <img src="https://admin103.geraianime.com/upload/iklan/<?= $bIklan13->image; ?>"
                            class="img-fluid w-100" alt="<?= $bIklan13->nama; ?>" title="<?= $bIklan13->nama; ?>">
                    </a>
                    <?php } else { ?>
                    <img src="<?= base_url() ?>assets/img/iklan_manga1.jpg" class="img-fluid w-100" alt="">
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="manga-chp-container text-center" align="center">
            <div class="header-title text-start mb-4 mt-5 wow fadeInUp" data-wow-delay="0.3s">
                <h1>Baca Juga Manga terupdate </h1>
            </div>
            <div class="row">
                <?php foreach ($update_manga as $um) {
                        $slg = str_replace("-", "_", $um->slug_turunan);
                    ?>
                <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="box-manga-latest position-relative">
                        <a href="<?= base_url(); ?>komik/komik_chapter/<?= $um->slug; ?>/<?= $um->id_nama_komik; ?>">
                            <div class="manga-latest-wrap">
                                <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/thumbnail/<?= $um->image; ?>"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="content">
                                <p><?= $um->nama; ?></p>
                                <div class="d-flex justify-content-between mt-2">
                                    <span class="chapter">Ch. <?= $um->chapter; ?></span>
                                    <span><?= time_ago($um->createDate); ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php } ?>

            </div>
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