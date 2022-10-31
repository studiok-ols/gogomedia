<?php
wp_enqueue_style('owl-css', 'https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css', array('global-styles'), WP_VER);
wp_enqueue_style('owl-theme-css', 'https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css', array('owl-css'), WP_VER);


$slider = get_field('gogo_media_slider') ?? [];
?>
<!-- GogoMedia Slider -->
<section class="section-block gogomedia-slider container" >
    <div class="gogomedia-slider__container-inner">
        <div class="owl-carousel owl-theme">

            <?php
            foreach ($slider as $k=>$v):
                $ico = (!empty($v['ico'])) ? wp_get_attachment_image($v['ico'],'full') : null;
            ?>
            <div class="item gogomedia-slider__item">
                <h4 class="gogomedia-slider__title"><?php echo $v['title'];?></h4>
                <p class="gogomedia-slider__description"><?php echo $v['description'];?></p>
                <?php echo $ico; ?>
            </div>
            <?php
            endforeach;
            ?>

        </div>
    </div>
</section>
<!-- GogoMedia Slider -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

    jQuery(function($) {
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:20,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                782:{
                    items:2
                },
                990:{
                    items:3
                }
            }
        })
    });

</script>
