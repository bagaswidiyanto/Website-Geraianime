<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php
    $uri3 = $this->uri->segment(3);
    $uri4 = $this->uri->segment(4);
    ?>
    <?php foreach ($this->db->query("SELECT * FROM tbl_navigation WHERE status = 1")->result() as $n) { ?>
    <?php if ($this->uri->segment(1) == $n->slug) {
            $segment1 = $website->name . ' | ' . $n->title;
            $metaKey = $n->metaKeywords;
            $metaDes = $n->metaDescription;
        } elseif ($this->uri->segment(1) == '') {
            $segment1 = $website->name;
            $metaKey = $n->metaKeywords;
            $metaDes = $n->metaDescription;
        } ?>
    <?php } ?>


    <?php
    if ($this->uri->segment(2) == 'anime_list') {
        $segment1 = $website->metaTitle . ' | Anime List';
        $metaKey = $website->metaKeywords;
        $metaDes = $website->metaDescription;
    } else if ($this->uri->segment(2) == 'komik_list') {
        $segment1 = $website->metaTitle . ' | Komik List';
        $metaKey = $website->metaKeywords;
        $metaDes = $website->metaDescription;
    } else if ($this->uri->segment(1) == 'Komik') {
        $segment1 = $website->metaTitle . ' | Komik';
        $metaKey = $website->metaKeywords;
        $metaDes = $website->metaDescription;
    } else if ($this->uri->segment(1) == 'movie') {
        $segment1 = $website->metaTitle . ' | Movie';
        $metaKey = $website->metaKeywords;
        $metaDes = $website->metaDescription;
    } else if ($this->uri->segment(1) == 'anime') {
        $segment1 = $website->metaTitle . ' | Anime';
        $metaKey = $website->metaKeywords;
        $metaDes = $website->metaDescription;
    } else if ($this->uri->segment(2) == 'anime_popular') {
        $segment1 = $website->metaTitle . ' | Anime Popular';
        $metaKey = $website->metaKeywords;
        $metaDes = $website->metaDescription;
    } else if ($this->uri->segment(1) == 'welcome') {
        $segment1 = $website->metaTitle;
        $metaKey = $website->metaKeywords;
        $metaDes = $website->metaDescription;
    } else if ($this->uri->segment(1) == 'search') {
        $segment1 = $website->metaTitle;
        $metaKey = $website->metaKeywords;
        $metaDes = $website->metaDescription;
    }
    ?>

    <?php if ($this->uri->segment(2) != 'anime_detail' && $this->uri->segment(2) != 'anime_eps' && $this->uri->segment(2) != 'anime_movie' && $this->uri->segment(2) != 'komik_detail' && $this->uri->segment(2) != 'anime_eps') { ?>
    <title><?= $segment1; ?> </title>
    <meta name="keywords" content="<?= $metaKey; ?>">
    <meta name="description" content="<?= $metaDes; ?>">

    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?= $website->metaTitle; ?>" />
    <meta property="og:description" content="<?= $website->metaDescription; ?>" />
    <meta property="og:url" content="http://geraianime.com" />
    <meta property="og:image" itemprop="image" content="<?= base_url(); ?>/assets/img/logo_anime.jpg">
    <link rel="apple-touch-icon" href="<?= base_url(); ?>/assets/img/logo_anime.jpg" />
    <meta name="msapplication-TileImage" content="<?= base_url(); ?>/assets/img/logo_anime.jpg" />
    <?php } ?>


    <!-- Meta untuk Anime Episode dan Detail Anime -->
    <?php
    if ($this->uri->segment(2) == 'anime_detail') {
        $meta = $this->db->get_where('tbl_nama_anime', array('slug' => $this->uri->segment(3)))->row(); ?>
    <?php $slg = str_replace("-", "_", $meta->slug); ?>
    <title><?= $meta->nama; ?> </title>
    <meta name="keywords" content="<?= $meta->metaKeywords; ?>">
    <meta name="description" content="<?= $meta->metaDescription; ?>">


    <meta property="og:site_name" content="Geraianime" />
    <meta property="og:title" content="<?= $meta->nama; ?>" />
    <meta property="og:description" content="<?= $meta->metaDescription; ?>" />
    <meta property="og:url" content="http://geraianime.com/anime/anime_detail/<?= $meta->slug; ?>" />
    <meta property="og:type" content="article" />
    <meta property="article:publisher" content="http://geraianime.com" />
    <meta property="article:section" content="Geraianime" />
    <meta property="article:tag" content="Geraianime" />
    <meta property="og:image"
        content="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/<?= $meta->image; ?>" />
    <meta property="og:image:secure_url"
        content="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/<?= $meta->image; ?>" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="640" />
    <meta property="twitter:card" content="summary" />
    <meta property="twitter:image"
        content="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/<?= $meta->image; ?>" />
    <meta property="twitter:site" content="@geraianime" />

    <?php } ?>

    <?php
    if ($this->uri->segment(2) == 'anime_eps') {
        $meta = $this->db->query("SELECT a.slug , a.id_anime, a.episode, b.nama, b.slug as slgAnime, b.metaKeywords, metaDescription, b.image FROM tbl_anime_list a LEFT JOIN tbl_nama_anime b ON a.id_anime = b.id WHERE a.slug = '" . $uri3 . "' AND a.id_anime = '" . $uri4 . "' ")->row(); ?>
    <?php $slg = str_replace("-", "_", $meta->slgAnime); ?>
    <title><?= $meta->nama; ?> Episode <?= $meta->episode; ?></title>
    <meta name="keywords" content="<?= $meta->metaKeywords; ?>">
    <meta name="description" content="<?= $meta->metaDescription; ?>">


    <meta property="og:site_name" content="Geraianime" />
    <meta property="og:title" content="<?= $meta->nama; ?> Episode <?= $meta->episode; ?>" />
    <meta property="og:description" content="<?= $meta->metaDescription; ?>" />
    <meta property="og:url"
        content="http://geraianime.com/anime/anime_eps/<?= $meta->slug; ?>/<?= $meta->id_anime; ?>" />
    <meta property="og:type" content="article" />
    <meta property="article:publisher" content="http://geraianime.com" />
    <meta property="article:section" content="Geraianime" />
    <meta property="article:tag" content="Geraianime" />
    <meta property="og:image"
        content="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/<?= $meta->image; ?>" />
    <meta property="og:image:secure_url"
        content="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/<?= $meta->image; ?>" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="640" />
    <meta property="twitter:card" content="summary" />
    <meta property="twitter:image"
        content="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/<?= $meta->image; ?>" />
    <meta property="twitter:site" content="@geraianime" />

    <?php } ?>
    <!-- END Meta untuk Anime Episode dan Detail Anime -->


    <!-- Meta untuk Anime Movie -->
    <?php
    if ($this->uri->segment(2) == 'anime_movie') {
        $meta = $this->db->get_where('tbl_movie', array('slug' => $this->uri->segment(3)))->row(); ?>
    <?php $slg = str_replace("-", "_", $meta->slug_turunan); ?>
    <title><?= $meta->nama; ?></title>
    <meta name="keywords" content="<?= $meta->metaKeywords; ?>">
    <meta name="description" content="<?= $meta->metaDescription; ?>">


    <meta property="og:site_name" content="Geraianime" />
    <meta property="og:title" content="<?= $meta->nama; ?>" />
    <meta property="og:description" content="<?= $meta->metaDescription; ?>" />
    <meta property="og:url" content="http://geraianime.com/movie/anime_movie/<?= $meta->slug; ?>" />
    <meta property="og:type" content="article" />
    <meta property="article:publisher" content="http://geraianime.com" />
    <meta property="article:section" content="Geraianime" />
    <meta property="article:tag" content="Geraianime" />
    <meta property="og:image"
        content="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/<?= $meta->image; ?>" />
    <meta property="og:image:secure_url"
        content="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/<?= $meta->image; ?>" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="640" />
    <meta property="twitter:card" content="summary" />
    <meta property="twitter:image"
        content="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/<?= $meta->image; ?>" />
    <meta property="twitter:site" content="@geraianime" />

    <?php } ?>
    <!-- END Meta untuk Anime Movie -->


    <!-- Meta untuk Komik Episode dan Detail Komik -->
    <?php
    if ($this->uri->segment(2) == 'komik_detail') {
        $meta = $this->db->get_where('tbl_nama_komik', array('slug' => $this->uri->segment(3)))->row(); ?>
    <?php $slg = str_replace("-", "_", $meta->slug_turunan); ?>
    <title><?= $meta->nama; ?> </title>
    <meta name="keywords" content="<?= $meta->metaKeywords; ?>">
    <meta name="description" content="<?= $meta->metaDescription; ?>">


    <meta property="og:site_name" content="Geraianime" />
    <meta property="og:title" content="<?= $meta->nama; ?>" />
    <meta property="og:description" content="<?= $meta->metaDescription; ?>" />
    <meta property="og:url" content="http://geraianime.com/anime/komik_detail/<?= $meta->slug; ?>" />
    <meta property="og:type" content="article" />
    <meta property="article:publisher" content="http://geraianime.com" />
    <meta property="article:section" content="Geraianime" />
    <meta property="article:tag" content="Geraianime" />
    <meta property="og:image"
        content="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/<?= $meta->image; ?>" />
    <meta property="og:image:secure_url"
        content="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/<?= $meta->image; ?>" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="640" />
    <meta property="twitter:card" content="summary" />
    <meta property="twitter:image"
        content="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/<?= $meta->image; ?>" />
    <meta property="twitter:site" content="@geraianime" />

    <?php } ?>

    <?php
    if ($this->uri->segment(2) == 'komik_chapter') {
        $meta = $this->db->query("SELECT a.slug , a.id_nama_komik, a.chapter, b.nama, b.slug as slgKomik, b.metaKeywords, metaDescription, b.image FROM tbl_komik a LEFT JOIN tbl_nama_komik b ON a.id_nama_komik = b.id WHERE a.slug = '" . $uri3 . "' AND a.id_nama_komik = '" . $uri4 . "' ")->row(); ?>
    <?php $slg = str_replace("-", "_", $meta->slgKomik); ?>
    <title><?= $meta->nama; ?> Chapter <?= $meta->chapter; ?></title>
    <meta name="keywords" content="<?= $meta->metaKeywords; ?>">
    <meta name="description" content="<?= $meta->metaDescription; ?>">


    <meta property="og:site_name" content="Geraianime" />
    <meta property="og:title" content="<?= $meta->nama; ?> Chapter <?= $meta->chapter; ?>" />
    <meta property="og:description" content="<?= $meta->metaDescription; ?>" />
    <meta property="og:url"
        content="http://geraianime.com/anime/anime_eps/<?= $meta->slug; ?>/<?= $meta->id_nama_komik; ?>" />
    <meta property="og:type" content="article" />
    <meta property="article:publisher" content="http://geraianime.com" />
    <meta property="article:section" content="Geraianime" />
    <meta property="article:tag" content="Geraianime" />
    <meta property="og:image"
        content="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/<?= $meta->image; ?>" />
    <meta property="og:image:secure_url"
        content="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/<?= $meta->image; ?>" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="640" />
    <meta property="twitter:card" content="summary" />
    <meta property="twitter:image"
        content="https://admin103.geraianime.com/upload/<?= $slg; ?>/gambar_anime/<?= $meta->image; ?>" />
    <meta property="twitter:site" content="@geraianime" />

    <?php } ?>
    <!-- END Meta untuk Komik Episode dan Detail Komik -->

    <!-- Favicon -->
    <link rel="icon" href="<?= base_url() ?>assets/img/icon.png" sizes="32x32">
    <link rel="icon" href="<?= base_url() ?>assets/img/icon.png" sizes="192x192" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link href='https://fonts.googleapis.com/css?family=Montserrat:400,500,700,900|Ubuntu:400,500,700' rel='stylesheet'> -->
    <link href='https://fonts.googleapis.com/css?family=Bowlby One SC' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>


    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/flaticon/font/flaticon.css">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url() ?>assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/lib/glightbox/css/glightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/detail_anime.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/detail_manga.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/detail_movie.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/list_anime.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/search.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/responsive.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/swiper.css" rel="stylesheet">
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="51">

    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0" id="home">
        <div class="hero-header position-relative">
            <div class="hero-bg">
                <img src="https://admin103.geraianime.com/upload/<?= $hero->image; ?>" class="img-fluid w-100" alt="">
            </div>
            <div class="sosmed">
                <div class="d-flex justify-content-end align-items-center">
                    <p>Fanspage : @geraianime </p>
                    <div class="d-flex align-items-center">
                        <?php foreach ($sosmed as $s) { ?>
                        <a class="btn btn-outline-light btn-social" href="<?= $s->link; ?>" target="_blank"
                            title="<?= $s->nama; ?>"><i class="fa <?= $s->icon; ?>"></i></a>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="logo">
                <a href="<?= base_url() ?>" title="<?= $website->name; ?>">
                    <img src="<?= base_url() ?>assets/img/logo_header.png" class="img-fluid" alt="">
                </a>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light px-4 py-2 py-lg-0">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <?php
                    $hal1 = $this->uri->segment(1);
                    $hal2 = $this->uri->segment(2);
                    ?>
                    <div class="navbar-nav py-0">
                        <?php foreach ($this->db->query("SELECT * FROM tbl_navigation WHERE parent = 0 AND status = 1 ORDER BY id ASC")->result() as $key) { ?>
                        <a href="<?= ($key->id != 1) ? base_url() . strtolower($key->slug) : base_url() ?>"
                            onclick="window.location.href='<?= base_url() . $key->slug; ?>/';"
                            title="<?= $key->title; ?>"
                            class="nav-item nav-link <?php if ($key->slug != "") {
                                                                                                                                                                                                                                            if ($this->uri->segment(1) == $key->slug) {
                                                                                                                                                                                                                                                echo "active";
                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                                            if ($this->uri->segment(1) == "") {
                                                                                                                                                                                                                                                echo "active";
                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                        } ?>"><?= $key->title ?></a>
                        <?php } ?>
                        <!-- <a href="<?= base_url() ?>animelist"
                            class="nav-item nav-link <?= ($hal1 == 'animelist') ? 'active' : ''; ?>">Anime List </a>
                        <a href="<?= base_url() ?>komiklist"
                            class="nav-item nav-link <?= ($hal1 == 'komiklist') ? 'active' : ''; ?>">Manga List </a>
                        <a href="<?= base_url() ?>komik"
                            class="nav-item nav-link <?= ($hal1 == 'komik') ? 'active' : ''; ?>">Manga</a>
                        <a href="<?= base_url() ?>movie"
                            class="nav-item nav-link <?= ($hal1 == 'movie') ? 'active' : ''; ?>">Movie</a> -->
                        <!-- <a href="#" class="nav-item nav-link">Jadwal</a> -->

                    </div>
                    <form role="search" method="get" action="<?= base_url(); ?>search"
                        class="position-relative ms-auto py-4 py-lg-0">
                        <input type="text" name="s" placeholder="Pencarian..." class="pe-5 ps-0 py-0">
                        <button type="submit"
                            class="border-0 bg-transparent position-absolute end-0 top-0 m-4 m-lg-0"><i
                                class="fa fa-search text-white"></i></button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Navbar & Hero End -->
    </div>