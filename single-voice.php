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
                <div class="voice_detail_bg">
                    <div class="voice_detail_flex_sec">
                        <p class="upper_txt mt20 mb20">利用サービス </p>
                        <div class="detail_flex_list detail_flex">
                            <?php
                                $voice_service = SCF::get("voice_sevice");

                                foreach($voice_service as $service){
            
                                    if($service == "おまかせパック"){
                                        $service_class = "omakase";
                                    } else if($service == "相続税申告"){
                                        $service_class = "inherit_return";
                                    } else if($service == "相続手続き"){
                                        $service_class = "inherit_procedure";
                                    } else if($service == "不動産売買"){
                                        $service_class = "estate_sale";
                                    } else if($service == "安心プランニング"){
                                        $service_class = "safe_planning";
                                    } else if($service == "相続税診断"){
                                        $service_class = "tax_diagnosis";
                                    } else if($service == "不動産コンサルティング"){
                                        $service_class = "estate_consult";
                                    } else if($service == "不動産投資コンサルティング"){
                                        $service_class = "estate_investment";
                                    } else if($service == "事業承継"){
                                        $service_class = "business_succession";
                                    } else if($service == "贈与サポート"){
                                        $service_class = "gift_support";
                                    } else if($service == "【相続税診断付き】公正証書遺言作成"){
                                        $service_class = "notarized";
                                    } else if($service == "民事信託"){
                                        $service_class = "civil_trust";
                                    } else if($service == "法人活用簡易コンサル"){
                                        $service_class = "corporate_use";
                                    } else if($service == "地主の方へご提案"){
                                        $service_class = "landlords";
                                    } else if($service == "相続税還付"){
                                        $service_class = "tax_refund";
                                    } else if($service == "お助け税務調査"){
                                        $service_class = "tax_investigation";
                                    } else if($service == "相続のせんせい"){
                                        $service_class = "teacher_inheritance";
                                    } 
                            ?>
                                <div class="list tax_return">
                                    <div class="<?php echo $service_class; ?>">
                                        <p class="txt_content"><?php echo $service; ?></p>
                                    </div>
                                </div>
                            <?php
                                }
                            ?>                            
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
                        <div class="detail_flex_list_02 detail_flex">
                            <div class="reason_flex">
                                <?php $voice_reason = SCF::get('voice_reason'); ?>
                                <?php if (!empty($voice_reason)) : ?>
                                    <p class="upper_txt mb20">選んだ理由</p>
                                <?php endif ?>
                                <div class="detail_reasons_list">
                                    <?php if (!empty($voice_reason)) : ?>
                                        <?php foreach ($voice_reason as $reason) : ?>
                                            <div class="detail_reason">
                                                <?php echo esc_html($reason); ?>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="good_point_flex">
                                    <?php $voice_point = SCF::get('voice_point'); ?>
                                    <?php if (!empty($voice_point)) : ?>
                                        <p class="upper_txt mt20 mb20">よかった点</p>
                                    <?php endif ?>
                                    <div class="detail_points_list">
                                        <?php if (!empty($voice_point)) : ?>
                                            <?php foreach ($voice_point as $point) : ?>
                                                <div class="detail_point">
                                                    <?php echo esc_html($point); ?>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $voice_comment = SCF::get('voice_comment');
                        if (!empty($voice_comment)) { ?>
                            <div class="detail_voice_comment"><?php echo $voice_comment; ?></div>
                        <?php } ?>
                        <?php
                        $voice_img_gp = SCF::get('voice_img_gp');
                        foreach ($voice_img_gp as $fields) { ?>
                            <?php $voice_img = wp_get_attachment_image_src($fields['voice_img'], 'full'); ?>
                            <?php if (!empty($voice_img)) { ?>
                                <div class="voice_content_bg mt20">
                                    <a href="javascript:void(0);" class="voice_bg_img">
                                        <img src="<?php echo $voice_img[0]; ?>" alt="お手紙画像">
                                    </a>
                                    <div id="modal"></div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
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
    </section>
</main>
<?php get_footer(); ?>