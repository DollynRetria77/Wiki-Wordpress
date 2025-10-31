<?php $avantages = get_field('bloc_avantage', 'option'); ?>
<?php if(!empty($avantages)): ?>
<section class="section-avantages">
    <div class="container">
        <div class="section-avantages__wrap">
            <div class="advantage">
                <?php foreach($avantages as $avantageItem): ?>
                <div class="advantage__item">
                    <?php if(!empty($avantageItem['icone'])): ?>   
                        <?php $icone = $avantageItem['icone']; 
                            $size_av = "pre_footer_logo"; // (thumbnail, medium, large, full or custom size)
                            $image_av = wp_get_attachment_image_src( $icone, $size_av );
                        ?>
                        <div class="avantage-icon">
                            <img src="<?php echo $image_av[0]; ?>" alt="<?php echo !empty($avantageItem['labelle']) ? $avantageItem['labelle'] : ''; ?>" width="32" height="32" />
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($avantageItem['labelle'])): ?>
                        <?php $labelle = $avantageItem['labelle']; ?>
                        <div class="avantage-label">
                            <?php echo nl2br($labelle); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>