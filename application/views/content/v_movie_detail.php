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
<?php $slg = str_replace("-", "_", $movie->slug_turunan); ?>

<div class="container-xxl movie-detail">
    <div class="container py-5">
        <div class="row pb-5">
            <div class="col-lg-8">
                <div class="header-title-detail wow fadeInUp" data-wow-delay="0.3s">
                    <h2 class="text-white"><?= $movie->nama; ?> Subtitle Indonesia</h2>
                </div>
                <ul class="breadcrumb mb-0 wow fadeInUp" data-wow-delay="0.3s">
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li><?= $movie->nama; ?> Subtitle Indonesia</li>
                </ul>
                <div class="share my-3 wow fadeInUp" data-wow-delay="0.3s">
                    <a onclick="is_share(<?= $movie->id; ?>,'facebook')"
                        href="https://www.facebook.com/sharer.php?u=<?= base_url(); ?>movie/anime_movie/<?= $movie->slug; ?>"
                        target="_blank" rel="nofollow" class="rounded-3 text-white py-1 px-2" title="Share ke Facebook"
                        style="background: #36528C;">
                        <i class="fa fa-facebook me-1"></i>
                        SHARE
                    </a>
                    <a onclick="is_share(<?= $movie->id; ?>,'twitter')"
                        href="https://twitter.com/intent/tweet?text=<?= base_url(); ?>movie/anime_movie/<?= $movie->slug; ?>"
                        target="_blank" rel="nofollow" class="rounded-3 text-white py-1 px-2 mx-3"
                        title="Share ke Twitter" style="background: #1D9BF0;">
                        <i class="fa fa-twitter me-1"></i>
                        SHARE
                    </a>
                    <a onclick="is_share(<?= $movie->id; ?>,'whatsapp')"
                        href="//api.whatsapp.com/send?text=<?= base_url(); ?>movie/anime_movie/<?= $movie->slug; ?>"
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
                <div class="video pt-3 wow fadeInUp" data-wow-delay="0.3s">
                    <video width="100%" controls>
                        <source src="https://admin103.geraianime.com/upload/<?= $slg; ?>/movie/<?= $movie->video; ?>"
                            type="video/mp4">
                    </video>
                </div>
                <div class="about-anime mt-4">
                    <table class="table table-striped wow fadeInUp" data-wow-delay="0.3s">
                        <tbody>
                            <tr>
                                <td>Judul</td>
                                <td>:</td>
                                <!-- <td><a href="<?= base_url(); ?>anime/anime_detail/<?= $movie->slug_turunan; ?>"
                                        title="<?= $movie->nama; ?> Subtitle Indonesia"
                                        class="text-white"><?= $movie->nama; ?></a>
                                </td> -->
                                <td><?= $movie->nama; ?></td>
                            </tr>
                            <tr>
                                <td>Sutradara</td>
                                <td>:</td>
                                <td><?= $movie->sutradara == '' ? '???' : $movie->sutradara; ?></td>
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
                                    <?php foreach ($this->db->query("SELECT * FROM tbl_genre a LEFT JOIN tbl_genre_detail b ON a.id=b.genreID WHERE b.animeID = '" . $movie->id . "'")->result() as $g) { ?>
                                    <i>,</i><span> <?= $g->nama; ?> </span>
                                    <?php  } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Score</td>
                                <td>:</td>
                                <td><?= $movie->score == '' ? '???' : $movie->score; ?></td>

                            </tr>
                        </tbody>
                    </table>

                    <div class="img-detail mt-4 wow fadeInUp" data-wow-delay="0.3s">
                        <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/<?= $movie->image; ?>"
                            class="img-fluid" alt="">
                    </div>
                    <div class="desk pt-2 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="sinopsis my-3">
                            <h4 class="text-white">Sinopsis</h4>
                        </div>
                        <?= $movie->deskripsi; ?>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="box-advert mt-4 mt-lg-0 wow fadeInUp" data-wow-delay="0.3s">
                    <?php if ($bIklan14->aktif != 0) { ?>
                    <a href="<?= $bIklan14->url; ?>">
                        <img src="https://admin103.geraianime.com/upload/iklan/<?= $bIklan14->image; ?>"
                            class="img-fluid w-100" alt="<?= $bIklan14->nama; ?>" title="<?= $bIklan14->nama; ?>">
                    </a>
                    <?php } else { ?>
                    <img src="<?= base_url(); ?>assets/img/iklan2.jpg" class="img-fluid w-100" alt="">
                    <?php } ?>
                </div>
                <div class="side-other-movies">
                    <div class="header-title py-2 px-3 text-center mt-4 wow fadeInUp" data-wow-delay="0.3s">
                        <h4>Popular Movies</h4>
                    </div>
                    <div class="row g-4 mt-4">
                        <?php foreach ($recomend_movie as $rm) {
                            $slg = str_replace("-", "_", $rm->slug_turunan);

                        ?>
                        <div class="col-4 col-md-2 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                            <a href="<?= base_url(); ?>movie/anime_movie/<?= $rm->slug; ?>" title="<?= $rm->nama; ?>">
                                <div class="img">
                                    <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/thumbnail/<?= $rm->image; ?>"
                                        class="img-fluid w-100" alt="">
                                </div>
                            </a>

                        </div>
                        <div class="col-8 col-md-4 col-lg-8 px-0 wow fadeInUp" data-wow-delay="0.3s">
                            <a href="<?= base_url(); ?>anime/anime_detail/<?= $rm->slug; ?>" title="<?= $rm->nama; ?>">
                                <div class="content ms-2">
                                    <p><?= $rm->nama; ?> Subtitle Indonesia</p>
                                    <span>UP
                                        <?= format_hari_tanggal(date('l d M Y', strtotime($rm->create_date))); ?></span>
                                </div>
                            </a>
                        </div>
                        <?php } ?>

                    </div>

                </div>
            </div>
        </div>
        <div class="movie-container text-center" align="center">
            <div class="header-title text-start mb-4 mt-5 wow fadeInUp" data-wow-delay="0.3s">
                <h1>Movie Terbaru</h1>
            </div>
            <div class="row g-4">
                <?php foreach ($movie_terbaru as $mt) {
                    $slg = str_replace("-", "_", $mt->slug_turunan);
                ?>
                <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="box-movie position-relative">
                        <a href="<?= base_url(); ?>movie/anime_movie/<?= $mt->slug; ?>" title="<?= $mt->nama; ?>">
                            <div class="movie-wrap">
                                <img src="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/thumbnail/<?= $mt->image; ?>"
                                    class="img-fluid" alt="">
                            </div>
                            <div class="content">
                                <p class="mb-1"><?= $mt->nama; ?></p>
                                <span><?= time_ago($mt->create_date); ?></span>
                            </div>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>

        </div>
    </div>
</div>


<script>
function is_share(id, sosmed) {
    base_url = '<?php echo base_url(); ?>';
    $.ajax({
        type: "POST",
        url: base_url + "ShareSosmed/movie",
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