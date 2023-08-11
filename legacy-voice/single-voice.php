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
            <div class="m-w920">
                <div class="voice_detail_bg">
                    <div class="voice_detail_flex">
                        <div class="voice_detail_card">
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
                                case $int_age == 30 || $int_age == 40:
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

                            ?>
                            <div class="voice_detail_head <?php echo (empty($voice_service)) ? "one_fr" : ""; ?>">
                                <div class="profile_block">
                                    <div class="profile_picture">
                                        <img src="<?php echo bloginfo('template_url');
                                                    echo $img; ?>" alt="<?php echo $voice_gender; ?>" />
                                    </div>
                                    <?php if (!empty($voice_add)) { ?>
                                        <p class="address"><?php echo ($voice_add); ?></p>
                                    <?php } ?>
                                    <p class="apperance"><?php if ($int_age > 0) { ?><span class="age"><?php echo ($int_age); ?>代</span><?php } ?><span class="gender"><?php echo ($voice_gender); ?></span></p>
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
                                $scf_evaluation = SCF::get("voice_evaluation");
                                if ($scf_evaluation !== "非表示") {
                                    $trim_evaluation = trim($scf_evaluation, "点");
                                    $float_evaluation = (float) $trim_evaluation;
                                    if ($float_evaluation >= 0) {
                                ?>
                                        <div class="evaluation_block">
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
                                        </div>
                                    <?php
                                    }
                                    ?>
                                <?php
                                }
                                ?>
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
                            </div>
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