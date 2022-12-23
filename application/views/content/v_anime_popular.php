<style>

</style>
<?php
function singkat_angka($n, $presisi = 1)
{
    if ($n < 900) {
        $format_angka = number_format($n, $presisi);
        $simbol = '';
    } else if ($n < 900000) {
        $format_angka = number_format($n / 1000, $presisi);
        $simbol = 'rb';
    } else if ($n < 900000000) {
        $format_angka = number_format($n / 1000000, $presisi);
        $simbol = 'jt';
    } else if ($n < 900000000000) {
        $format_angka = number_format($n / 1000000000, $presisi);
        $simbol = 'M';
    } else {
        $format_angka = number_format($n / 1000000000000, $presisi);
        $simbol = 'T';
    }

    if ($presisi > 0) {
        $pisah = '.' . str_repeat('0', $presisi);
        $format_angka = str_replace($pisah, '', $format_angka);
    }

    return $format_angka . $simbol;
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

<div class="container-xxl all-anime">
    <div class="container py-5">
        <div class="header-title py-4 wow fadeInUp" data-wow-delay="0.3s">
            <h1 style="font-size: 24pt;">Popular Anime</h1>
        </div>
        <div class="anime-eps-container">
            <?php foreach ($animePopular as $ap) {
                $slg = str_replace("-", "_", $ap->slug);
            ?>
            <div class="anime-eps-item">
                <div class="box-anime-eps position-relative">
                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $ap->slug; ?>" title="<?= $ap->nama; ?>">
                        <div class="anime-eps-wrap">
                            <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/thumbnail/<?= $ap->image; ?>"
                                class="img-fluid" alt="">
                        </div>
                        <div class="episode py-1 px-2">
                            <p>Viewer : <?= singkat_angka($ap->jml); ?></p>
                        </div>
                        <div class="content">
                            <p class="mb-2"><?= $ap->nama; ?></p>
                            <span>UP <?= time_ago($ap->tgl_rilis); ?></span>
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