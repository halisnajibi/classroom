<div class="footer">
    <div class="copyright">
        <p>Copyright © Designed &amp; Developed by <a href="https://www.instagram.com/bihaliz/" target="_blank">Haliz Najibi</a> <?= date('Y') ?></p>
    </div>
</div>
</div>
<!-- Required vendors -->
<script src="<?= base_url('assets/template/') ?>vendor/global/global.min.js"></script>
<script src="<?= base_url('assets/template/') ?>vendor/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="<?= base_url('assets/template/') ?>js/plugins-init/sweetalert.init.js"></script>

<script src="<?= base_url('assets/template/') ?>vendor/chart.js/Chart.bundle.min.js"></script>
<script src="<?= base_url('assets/template/') ?>vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

<script src="<?= base_url('assets/template/') ?>vendor/owl-carousel/owl.carousel.js"></script>

<script src="<?= base_url('assets/template/') ?>js/custom.min.js"></script>
<script src="<?= base_url('assets/template/') ?>js/dlabnav-init.js"></script>
<script src="<?= base_url('assets/template/') ?>js/demo.js"></script>
<script src="<?= base_url('assets/template/') ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/template/') ?>js/plugins-init/datatables.init.js"></script>

<script src="<?= base_url('assets/template/') ?>vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="<?= base_url('assets/template/') ?>vendor/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="<?= base_url('assets/template/') ?>vendor/js/me.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $('#summernote').summernote({
        placeholder: 'Silahkan Ketik Materi',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['font', ['bold', 'underline', 'clear', 'italic']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', ]],

        ]
    });
</script>
<script>
    function cardsCenter() {

        /*  testimonial one function by = owl.carousel.js */



        jQuery('.card-slider').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            //center:true,
            slideSpeed: 3000,
            paginationSpeed: 3000,
            dots: true,
            navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 1
                },
                800: {
                    items: 1
                },
                991: {
                    items: 1
                },
                1200: {
                    items: 1
                },
                1600: {
                    items: 1
                }
            }
        })
    }

    jQuery(window).on('load', function() {
        setTimeout(function() {
            cardsCenter();
        }, 1000);
    });
</script>

</body>

</html>