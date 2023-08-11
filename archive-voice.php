<?php

/**
 * The template for displaying all pages
 * Template Name: Voice
 
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header('1'); ?>
<div id="mainvnone"></div>
<div class="breadcrumb-container">
    <ul id="pankuzu" class="pank breadcrumb-pt15">
        <li><a href="<?php bloginfo('url'); ?>">HOME</a></li>
        <li><span>お客様の声</span></li>
    </ul>
</div>
<!-- mv section start-->
<main class="voice_page">
    <!-- mv section start -->
    <section class="legacy_voice_mv">
        <div class="inner_tax_mv">
            <div class="mv_title">
                <p>
                    【相続専門】<br class="d_sp" />税理士法人レガシィ
                </p>
                <p class="red_ttl mt10">お客様の声</p>
            </div>
            <div class="mv_info_txt d_pc">
                <p class="over_txt">
                    <span>
                        <span class="no">98<span class="percent">%</span></span>のお客様に満足いただいています。
                    </span>
                </p>
                <p class="under_txt">
                    経験豊富な税理士が責任をもって管理するチーム制を導入しているので、若手税理士等が担当でも「レガシィの安心品質」を保証します。<br>
                    完了後にお客様から頂いたアンケートでは、多くの方が「丁寧な対応でわかりやすかった」、「こちらから催促しなくてもキビキビ動いてくれた」と評価してくださっています。
                </p>
            </div>
        </div>
    </section>
    <!-- mv section end -->
    <!-- mv section sp start -->
    <section class="voice_mv_sp">
        <div class="mv_info_txt d_sp">
            <p class="over_txt">
                <span>
                    <span class="no">98<span class="percent">%</span></span>のお客様に満足いただいています。
                </span>
            </p>
            <p class="under_txt">
                経験豊富な税理士が責任をもって管理するチーム制を導入しているので、若手税理士等が担当でも「レガシィの安心品質」を保証します。<br>
                完了後にお客様から頂いたアンケートでは、多くの方が「丁寧な対応でわかりやすかった」、「こちらから催促しなくてもキビキビ動いてくれた」と評価してくださっています。
            </p>
        </div>
    </section>
    <!-- mv section sp end -->
    <!-- customer satisfaction section start  -->
    <section class="cus_satisfaction_sec">
        <div class="container">
            <div class="sub_container">
                <div class="cus_flex_list">
                    <div class="list_01">
                        <p class="cus_head_txt">お客様満足度</p>
                        <div class="cus_img">
                            <img src="<?php echo bloginfo('template_url'); ?>/assets/img/voice/cus_img_01.png" alt="お客様満足度" />
                        </div>
                    </div>
                    <div class="list_02">
                        <p class="cus_head_txt">選ばれた理由TOP3</p>
                        <ul class="top_list">
                            <li>
                                <p class="left_txt txt_01">1</p>
                                <p class="right_txt">専門知識がある</p>
                            </li>
                            <li>
                                <p class="left_txt txt_02">2</p>
                                <p class="right_txt">提案が良い</p>
                            </li>
                            <li>
                                <p class="left_txt txt_03">3</p>
                                <p class="right_txt">対応が早い</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- customer satisfaction section end  -->
    <section>
        <div class="voice_container">
            <p class="voice_ttl">お客様からこんな声を<br class="sp">いただいています</p>
            <ul class="voice_flex">
                <?php
                $paged = get_query_var('paged') ? get_query_var('paged') : 1; //start page
                $args = array(
                    'post_type'         => 'voice',
                    'posts_per_page'    => 9,
                    'paged'             => $paged
                );
                $q = new WP_Query($args);
                if ($q->have_posts()) :
                    while ($q->have_posts()) : $q->the_post(); ?>
                        <?php
                        $voice_add = SCF::get("voice_add");
                        $voice_age = SCF::get("voice_age");
                        $voice_gender = SCF::get("voice_gender");

                        $trim_age = rtrim($voice_age, "代");
                        $int_age = (int) $trim_age;
                        ?>
                        <?php if (!empty($voice_age)) { ?>
                            <li class="voice_card">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="card_head">
                                        <p class="profile">
                                            <?php if (!empty($voice_add)) { ?>
                                                <span class="address"><?php echo ($voice_add); ?></span>
                                            <?php } ?>
                                            <span class="age"><?php echo ($int_age); ?>代</span>
                                            <span class="gender"><?php echo ($voice_gender); ?></span>
                                        </p>
                                    </div>
                                    <div class="card_body">
                                        <?php
                                        $scf_evaluation = SCF::get("voice_evaluation"); ?>
                                        <div class="evaluation_block">

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
                                        <div class="reason_block">
                                            <?php $voice_reason = SCF::get('voice_reason'); ?>
                                            <?php if (!empty($voice_reason)) : ?>
                                                <div class="reason_txt">
                                                    <p>選んだ理由</p>
                                                </div>
                                            <?php endif ?>
                                            <div class="reason_desc">
                                                <?php if (!empty($voice_reason)) : ?>
                                                    <?php foreach ($voice_reason as $reason) : ?>
                                                        <div class="desc_txt"><?php echo esc_html($reason); ?></div>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="good_point_block">
                                            <?php $voice_point = SCF::get('voice_point'); ?>
                                            <?php if (!empty($voice_point)) : ?>
                                                <div class="god_point_txt">
                                                    <p>よかった点</p>
                                                </div>
                                            <?php endif ?>
                                            <div class="good_points">
                                                <?php if (!empty($voice_point)) : ?>
                                                    <?php foreach ($voice_point as $point) : ?>
                                                        <div class="good_point"><?php echo esc_html($point); ?></div>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="voice_txt">
                                            <?php
                                            $voice_comment = SCF::get('voice_comment');
                                            if (!empty($voice_comment)) {
                                                $maxCharacters = 33; // Maximum number of characters to keep
                                                $trimmedText = mb_substr(strip_tags($voice_comment), 0, $maxCharacters, 'UTF-8');
                                                $concatenatedText = rtrim($trimmedText) . '...';
                                            ?>
                                                <?php echo $concatenatedText; ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="card_footer">
                                        <div class="view_details">詳細を見る</div>
                                    </div>
                                </a>
                            </li>
                        <?php } ?>
                <?php endwhile;
                endif; ?>
            </ul>
            <!-- <div class="pagination mt50 mt30-sp">
                <?php //wp_pagenavi(array('query' => $q)); ?>
            </div> -->
        </div>
    </section>
</main>
<?php get_footer(); ?>