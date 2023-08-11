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
                            <img src="<?php echo bloginfo('template_url'); ?>/img/voice/cus_img_01.png" alt="お客様満足度" />
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
                        $male_profile_images = [
                            "/img/voice/profile_icon/male_34_img.png",
                            "/img/voice/profile_icon/male_56_img.png",
                            "/img/voice/profile_icon/male_78_img.png",
                            "/img/voice/profile_icon/male_910_img.png"
                        ];

                        $female_profile_images = [
                            "/img/voice/profile_icon/female_34_img.png",
                            "/img/voice/profile_icon/female_56_img.png",
                            "/img/voice/profile_icon/female_78_img.png",
                            "/img/voice/profile_icon/female_910_img.png"
                        ];

                        $default_img = "/img/voice/profile_icon/default_img.png";

                        $voice_add = SCF::get("voice_add");
                        $voice_age = SCF::get("voice_age");
                        $voice_gender = SCF::get("voice_gender");

                        $trim_age = rtrim($voice_age, "代");
                        $int_age = (int) $trim_age;


                        switch ($int_age) {
                            case $int_age == 20 || $int_age == 30 || $int_age == 40:
                                if ($voice_gender == "男性") {
                                    $img = $male_profile_images[0];
                                } else if ($voice_gender == "女性") {
                                    $img = $female_profile_images[0];
                                } else {
                                    $img = $default_img;
                                }
                                break;
                            case $int_age == 50 || $int_age == 60:
                                if ($voice_gender == "男性") {
                                    $img = $male_profile_images[1];
                                } else if ($voice_gender == "女性") {
                                    $img = $female_profile_images[1];
                                } else {
                                    $img = $default_img;
                                }
                                break;
                            case $int_age == 70 || $int_age == 80:
                                if ($voice_gender == "男性") {
                                    $img = $male_profile_images[2];
                                } else if ($voice_gender == "女性") {
                                    $img = $female_profile_images[2];
                                } else {
                                    $img = $default_img;
                                }
                                break;
                            case $int_age == 90 || $int_age == 100:
                                if ($voice_gender == "男性") {
                                    $img = $male_profile_images[3];
                                } else if ($voice_gender == "女性") {
                                    $img = $female_profile_images[3];
                                } else {
                                    $img = $default_img;
                                }
                                break;
                            default:
                                $img = $default_img;
                                break;
                        }

                        $voice_service = SCF::get("voice_service");

                        $service_imgs = [
                            "/img/voice/service_icon/omakase_img.png",
                            "/img/voice/service_icon/tax_return_img.png",
                            "/img/voice/service_icon/tax_diagnosis_img.png",
                        ];
                        if ($int_age <= 0) {
                            $post_id = get_the_ID();
                            wp_delete_post($post_id, true);
                        }
                        ?>
                        <?php if (!empty($voice_age)) { ?>
                            <li class="voice_card">
                                <a href="<?php the_permalink(); ?>">

                                    <div class="card_head <?php echo (empty($voice_service)) ? "one_fr" : ""; ?>">
                                        <div class="profile_block">
                                            <div class="profile_picture">
                                                <img src="<?php echo bloginfo('template_url');
                                                            echo $img; ?>" alt="<?php echo $voice_gender; ?>" />
                                            </div>
                                            <?php if (!empty($voice_add)) { ?>
                                                <p class="address"><?php echo ($voice_add); ?></p>
                                            <?php } ?>
                                            <p class="apperance"><span class="age"><?php echo ($int_age); ?>代</span><span class="gender"><?php echo ($voice_gender); ?></span></p>
                                        </div>
                                        <?php if (!empty($voice_service)) {

                                            $service_string = implode($voice_service);
                                            // echo($service_string);

                                            switch ($service_string) {
                                                case $service_string == "おまかせパック":
                                                    $service_img = $service_imgs[0];
                                                    break;
                                                case $service_string == "相続税申告":
                                                    $service_img = $service_imgs[1];
                                                    break;
                                                case $service_string == "【相続税診断付き】公正証書遺言作成":
                                                    $service_img = $service_imgs[2];
                                                    break;
                                                default:
                                                    $service_img = $service_imgs[0];
                                            }

                                            // echo($service_img);
                                        ?>
                                            <div class="service_block">
                                                <div class="service_picture">
                                                    <img src="<?php echo bloginfo('template_url');
                                                                echo $service_img; ?>" alt="<?php echo $service_string; ?>" />
                                                </div>
                                                <p class="service_used">【利用サービス】</p>

                                                <?php foreach ($voice_service as $service) { ?>
                                                    <p class="service_name"><?php echo esc_html($service); ?></p>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
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
                                                    <div class="evaluation_txt">
                                                        <p>評価</p>
                                                    </div>
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
                                        <?php
                                        $g_img_gp_fr = SCF::get('voice_img_gp');
                                        ?>
                                        <div class="img_txt_container">
                                            <div class="voice_img_container">
                                                <?php if (!empty($g_img_gp_fr[0]['voice_img'])) { ?>
                                                    <div class="voice_img">
                                                        <img src="<?php echo wp_get_attachment_url($g_img_gp_fr[0]['voice_img']); ?>" alt="お手紙画像" />
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <?php
                                            $voice_comment = SCF::get('voice_comment');
                                            ?>
                                            <div class="voice_txt">
                                                <?php
                                                if (!empty($voice_comment)) {
                                                    $maxCharacters = 33; // Maximum number of characters to keep
                                                    $trimmedText = mb_substr(strip_tags($voice_comment), 0, $maxCharacters, 'UTF-8');
                                                    $concatenatedText = rtrim($trimmedText) . '...';
                                                ?>
                                                    <?php echo $concatenatedText; ?>
                                                <?php } ?>
                                            </div>
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
<?php //get_footer(); ?>