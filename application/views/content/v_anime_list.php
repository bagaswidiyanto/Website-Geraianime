<div class="container-xxl anime-list-on-going">
    <div class="container py-5">
        <div class="header-title">
            <h1>Anime List Video A-Z</h1>
        </div>

        <div class="on-going list-anime">
            <div class="header-title-going my-4">
                <h2>On Going Anime</h2>
            </div>
            <div class="row ">
                <?php foreach ($this->db->query("SELECT * FROM tbl_nama_anime WHERE aktif = 'Y' AND status = 'On Going' ORDER BY nama ASC")->result() as $na) {
                    $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $na->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                ?>
                <div class="col-lg-6 ">
                    <div class="bg-white pb-3">
                        <div class="list d-flex justify-content-between">
                            <a href="<?= base_url(); ?>anime/anime_detail/<?= $na->slug; ?>"
                                title="<?= $na->nama; ?> Subtitle Indonesia"><?= $na->nama; ?></a>
                            <span><?= $genre->nama; ?></span>
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>


<div class="container-fluid bg-abjtext">
    <div class="container">
        <div class="abjtext py-4 text-center">
            <h4 class="text-white pb-3 text-start">ANIME LIST GO TO</h4>
            <div class="col-abjad">
                <a href="#">#</a>
            </div>
            <div class="col-abjad">
                <a href="#A">A</a>
            </div>
            <div class="col-abjad">
                <a href="#B">B</a>
            </div>
            <div class="col-abjad">
                <a href="#C">C</a>
            </div>
            <div class="col-abjad">
                <a href="#D">D</a>
            </div>
            <div class="col-abjad">
                <a href="#E">E</a>
            </div>
            <div class="col-abjad">
                <a href="#F">F</a>
            </div>
            <div class="col-abjad">
                <a href="#G">G</a>
            </div>
            <div class="col-abjad">
                <a href="#H">H</a>
            </div>
            <div class="col-abjad">
                <a href="#I">I</a>
            </div>
            <div class="col-abjad">
                <a href="#J">J</a>
            </div>
            <div class="col-abjad">
                <a href="#K">K</a>
            </div>
            <div class="col-abjad">
                <a href="#L">L</a>
            </div>
            <div class="col-abjad">
                <a href="#M">M</a>
            </div>
            <div class="col-abjad">
                <a href="#N">N</a>
            </div>
            <div class="col-abjad">
                <a href="#O">O</a>
            </div>
            <div class="col-abjad">
                <a href="#P">P</a>
            </div>
            <div class="col-abjad">
                <a href="#Q">Q</a>
            </div>
            <div class="col-abjad">
                <a href="#R">R</a>
            </div>
            <div class="col-abjad">
                <a href="#S">S</a>
            </div>
            <div class="col-abjad">
                <a href="#T">T</a>
            </div>
            <div class="col-abjad">
                <a href="#U">U</a>
            </div>
            <div class="col-abjad">
                <a href="#V">V</a>
            </div>
            <div class="col-abjad">
                <a href="#W">W</a>
            </div>
            <div class="col-abjad">
                <a href="#X">X</a>
            </div>
            <div class="col-abjad">
                <a href="#Y">Y</a>
            </div>
            <div class="col-abjad">
                <a href="#Z">Z</a>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl anime-list">
    <div class="container py-5">
        <div class="box-advert">
            <?php if ($bIklan4->image != '') { ?>
            <a href="<?= $bIklan4->url; ?>">
                <img src="https://admin103.geraianime.com/upload/iklan/<?= $bIklan4->image; ?>" class="img-fluid w-100"
                    alt="<?= $bIklan4->nama; ?>" title="<?= $bIklan4->nama; ?>">
            </a>
            <?php } else { ?>
            <img src="<?= base_url() ?>assets/img/iklan1.jpg" class="img-fluid w-100" alt="">
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <div class="list-anime mt-3">
                    <div class="row g-4 justify-content-between pt-2">
                        <?php $a = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'A%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($a->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="A">
                                <h4 class="text-white">A</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'A%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $b = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'B%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($b->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="B">
                                <h4 class="text-white">B</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'B%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $c = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'C%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($c->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="C">
                                <h4 class="text-white">C</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'C%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $d = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'D%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($d->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="D">
                                <h4 class="text-white">D</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'D%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $e = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'E%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($e->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="E">
                                <h4 class="text-white">E</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'E%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $f = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'F%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($f->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="F">
                                <h4 class="text-white">F</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'F%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $g = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'G%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($g->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="G">
                                <h4 class="text-white">G</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'G%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $h = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'H%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($h->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="H">
                                <h4 class="text-white">H</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'H%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $i = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'i%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($i->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="I">
                                <h4 class="text-white">I</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'I%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $j = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'J%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($j->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="J">
                                <h4 class="text-white">J</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'J%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $k = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'K%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($k->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="K">
                                <h4 class="text-white">K</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'K%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $l = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'L%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($l->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="L">
                                <h4 class="text-white">L</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'L%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $m = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'M%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($m->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="M">
                                <h4 class="text-white">M</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'M%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $n = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'N%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($n->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="N">
                                <h4 class="text-white">N</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'N%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $o = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'O%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($o->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="O">
                                <h4 class="text-white">O</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'O%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $p = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'P%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($p->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="P">
                                <h4 class="text-white">P</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'P%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $q = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'Q%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($q->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="Q">
                                <h4 class="text-white">Q</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'Q%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $r = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'Q%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($r->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="R">
                                <h4 class="text-white">R</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'R%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $s = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'S%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($s->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="S">
                                <h4 class="text-white">S</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'S%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $t = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'T%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($t->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="T">
                                <h4 class="text-white">T</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'T%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $u = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'U%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($u->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="U">
                                <h4 class="text-white">U</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'U%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $v = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'V%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($v->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="V">
                                <h4 class="text-white">V</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'V%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $w = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'W%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($w->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="W">
                                <h4 class="text-white">W</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'W%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $c = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'X%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($c->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="X">
                                <h4 class="text-white">X</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'X%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $y = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'Y%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($y->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="Y">
                                <h4 class="text-white">Y</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'Y%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $z = $this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'Z%' ORDER BY nama ASC")->row() ?>
                        <?php if (isset($z->nama)) { ?>
                        <div class="col-lg-6">
                            <div class="abjad bg-linier-orange py-1 px-3" id="Z">
                                <h4 class="text-white">Z</h4>
                            </div>
                            <div class="bg-white pb-3">
                                <?php foreach ($this->db->query("SELECT slug, nama FROM tbl_nama_anime WHERE aktif = 'Y' AND nama LIKE 'Z%' ORDER BY nama ASC")->result() as $list) {
                                        $genre = $this->db->query("SELECT c.nama FROM tbl_nama_anime a left JOIN tbl_genre_detail b ON a.id=b.animeID LEFT JOIN tbl_genre c ON b.genreID=c.id WHERE a.slug = '" . $list->slug . "'  GROUP by b.animeID ORDER BY b.genreID ASC ")->row();
                                    ?>
                                <div class="list d-flex justify-content-between">
                                    <a href="<?= base_url(); ?>anime/anime_detail/<?= $list->slug; ?>"
                                        title="<?= $list->nama; ?> Subtitle Indonesia"><?= $list->nama; ?></a>
                                    <span><?= $genre->nama; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>