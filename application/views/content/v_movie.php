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

<style>

</style>

<div class="container-xxl all-movie">
    <div class="container py-5">
        <div class="movie">
            <div class="row g-4 mt-4">
                <?php foreach ($movie as $m) {
                    $slg = str_replace("-", "_", $m->slug_turunan);
                ?>
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="<?= base_url(); ?>movie/anime_movie/<?= $m->slug; ?>"
                        title="<?= $m->nama; ?> Subtitle Indonesia">
                        <div class="headline-last position-relative">
                            <div class="img">
                                <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/thumbnail/<?= $m->image; ?>"
                                    class="img-fluid w-100" alt="">
                            </div>
                            <div class="release">
                                <p>UP <?= format_hari_tanggal(date('l d M Y,', strtotime($m->create_date))); ?>
                                    <?= date('h:i', strtotime($m->create_date)); ?> WIB
                                </p>
                            </div>
                            <div class="content">
                                <p><?= $m->nama; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
        <nav class="blog-pagination justify-content-center d-flex wow fadeInUp" data-wow-delay="0.3s">
            <!-- <div class="halaman">
                <p class="text-white"><?= $pagination_des; ?></p>
            </div> -->
            <?= $pagination; ?>
        </nav>
    </div>
</div>