<div class="bg-linier-orange">
    <div class="container-fluid  footer position-relative">
        <div class="container py-5">
            <div class="img-footer mb-4 wow fadeInUp" data-wow-delay="0.3s">
                <a href="<?= base_url() ?>" title="<?= $website->name; ?>">
                    <img src="<?= base_url(); ?>assets/img/logo_header.png" class="img-fluid" alt="">
                </a>
            </div>
            <div class="row justify-content-between wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="desk mb-4">
                        <p class="text-white"><?= $website->description; ?></p>
                    </div>
                    <div class="terms">
                        <a href="<?= base_url(); ?>terms" title="Terms & Agreements"
                            class="text-white fs-5 fw-normal me-3">Terms & Agreem ents</a>
                        <a href="<?= base_url(); ?>privacy" title="Privacy Policy"
                            class="text-white fs-5 fw-normal">Privacy Policy</a>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
                    <div class="newslatter">
                        <h4 class="mb-4 text-white">Our Newslatter</h4>
                        <p class="text-white">Gabung sekarang untuk mendapatkan info terbaru dari kami</p>

                        <div class="position-relative w-100 mt-3">
                            <input type="text" class="form-control py-3 ps-4">
                            <button class="py-2 h-100 position-absolute top-0 end-0 px-3">Subsrcibe</button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="copyright text-center position-relative mt-5 wow fadeInUp" data-wow-delay="0.3s">
                <img src="<?= base_url() ?>assets/img/logo_copyright.png" class="img-fluid" alt="">
                <div class="row d-flex justify-content-center  text-center">
                    <div class="col-xl-5 col-lg-6 col-md-7 col-sm-9 col-12">
                        <p>Copyright © 2022 - GeraiAnime All Rights Reserved.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Back to Top -->
<!-- <a href="#" class="btn btn-lg btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up text-white"></i></a> -->

<!-- JavaScript Libraries -->
<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/lib/wow/wow.min.js"></script>
<script src="<?= base_url() ?>assets/lib/easing/easing.min.js"></script>
<script src="<?= base_url() ?>assets/lib/waypoints/waypoints.min.js"></script>
<script src="<?= base_url() ?>assets/lib/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url() ?>assets/lib/counterup/counterup.min.js"></script>
<script src="<?= base_url() ?>assets/lib/isotope/isotope.pkgd.min.js"></script>

<!-- Template Javascript -->
<script src="<?= base_url() ?>assets/js/swiper.min.js"></script>
<script src="<?= base_url() ?>assets/js/main.js"></script>
</body>

</html>