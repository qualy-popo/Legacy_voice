<?php
$voice_add = SCF::get("voice_add");
$voice_age = SCF::get("voice_age");
$voice_gender = SCF::get("voice_gender");
get_header('1'); ?>
<div id="mainvnone"></div>
<div class="breadcrumb-container">
    <ul id="pankuzu" class="pank breadcrumb-pt15">
        <li><a href="<?php bloginfo('url'); ?>">HOME</a></li>
        <li><a href="<?php bloginfo('url'); ?>/voice">お客様の声</a></li>
        <li><span><?php echo the_title(); ?></span></li>
    </ul>
</div>
<!-- mv section start-->
<main class="voice_page_detail">
    <section>
        <div class="voice_container voice_detail">
            <div class="m-w920 mt50">
                <div class="voice_head_txt">
                    <p>川崎市 / 30代 / 女性</p>
                </div>
                <div class="voice_detail_bg ">
                    <div class="voice_detail_flex_sec">
                        <p class="upper_txt mt20 mb20">利用サービス </p>
                        <div class="detail_flex_list detail_flex">
                            <div class="list tax_return">
                                <div class="omakase">
                                    <p class="txt_content">相続税申告</p>
                                </div>
                            </div>
                            <div class="list">
                                <p class="txt_content">不動産投資コンサルティング</p>
                            </div>
                            <div class="list">
                                <p class="txt_content">お助け税務調査</p>
                            </div>
                        </div>
                        <?php $scf_evaluation = SCF::get("voice_evaluation"); ?>
                        <div class="detail_eval_block">

                            <?php if ($scf_evaluation !== "非表示") {
                                $trim_evaluation = trim($scf_evaluation, "点");
                                $float_evaluation = (float) $trim_evaluation;
                            ?>
                                <?php if ($float_evaluation >= 0) { ?>
                                    <div class="rating">
                                        <div class="stars">
                                            <?php
                                            $rating = $float_evaluation;
                                            for ($i = 1; $i <= 5; $i++) {
                                                $class = '';
                                                if ($i <= $rating) {
                                                    $class = 'rated';
                                                }
                                                if ($i == ceil($rating) && $rating - floor($rating) == 0.5) {
                                                    $class = 'half-rated';
                                                }
                                            ?>
                                                <span class="star <?php echo $class; ?>"></span>
                                            <?php } ?>
                                        </div>
                                        <p class="rating_num"><?php echo $float_evaluation ?></p>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>

                    <?php
                    $voice_comment = SCF::get('voice_comment');
                    if (!empty($voice_comment)) { ?>
                        <div class="voice_comment"><?php echo $voice_comment; ?></div>
                    <?php } ?>
                    <?php
                    $voice_img_gp = SCF::get('voice_img_gp');
                    foreach ($voice_img_gp as $fields) { ?>
                        <?php $voice_img = wp_get_attachment_image_src($fields['voice_img'], 'full'); ?>
                        <?php if (!empty($voice_img)) { ?>
                            <div class="voice_content_bg mt40">
                                <a href="javascript:void(0);" class="voice_bg_img">
                                    <img src="<?php echo $voice_img[0]; ?>" alt="お手紙画像">
                                </a>
                                <div id="modal"></div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="relation-btn">
                    <div class="btn-block">
                        <?php
                        $prev_post = get_adjacent_post(false, '', true);
                        if (!empty($prev_post)) { ?>
                            <div class="btn prev-btn">
                                <a href="<?php echo get_permalink($prev_post->ID) ?>" rel="prev">前の投稿</a>
                            </div>

                        <?php } ?>
                    </div>
                    <div class="btn-block mid">
                        <div class="btn btn02">
                            <a href="<?php echo home_url(); ?>/voice">一覧に戻る</a>
                        </div>
                    </div>
                    <div class="btn-block right">
                        <?php $next_post = get_adjacent_post(false, '', false);
                        if (!empty($next_post)) { ?>
                            <div class="btn next-btn">
                                <a href="<?php echo get_permalink($next_post->ID) ?>" rel="next">次の投稿</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>