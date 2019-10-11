<?php include "includes/header.php"; ?>
	<img class="bac" src="img/0.jpg">
	<div id="pageslider">
		<div class="ul">
			<div>

				<div class="spilitter"></div>
				<marquee class="pro" behavior="alternate">
                    <img src="img/porto/0.jpg">
                    <img src="img/porto/1.jpg">
                    <img src="img/porto/2.jpg">
                    <img src="img/porto/3.jpg">
                    <img src="img/porto/4.jpg">
					<img src="img/porto/5.jpg">
					<img src="img/porto/5.jpg">
					<img src="img/porto/5.jpg">
					<img src="img/porto/5.jpg">
					<img src="img/porto/5.jpg">
				</marquee>
                <div class="container">
                    <div class="col-md-6">
                        <div class="flex-column f-gro">
                            <div>
                                <h1 class="title">
                                    <?php title_show(); ?>
                                </h1>
                            </div>
                            <div>
                                <p class="m-5 bio">
                                    <?php bio_show(); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="flex-column f-gro">
                            <div style="display: flex ;justify-content: center;" class="mt-5">
                                <img src="img/logo.jpg" class="arm" alt="marbin" draggable="false">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="spilitter"></div>
			</div>
			<div>
				<div class="container">
					<div class="navbar">
                        <?php categories_show('side'); ?>
					</div>
					<div class="content">
                        <?php contents_show(); ?>
					</div>
				</div>
				<div class="spilitter"></div>
			</div>
			<div>
				<div class="porto">
				</div>
                <div id="porto_archive" style="display: none;">
                    <?php porto_items_show(); ?>
                </div>
				<div class="spilitter"></div>
			</div>
			<div>
                <div class="spilitter"></div>
                <div class="container" style="flex-flow: column;">
                    <div class="contact_row" style="direction: rtl; display: flex;">
                        <div id="contact_col_1">
                            <h3 class="text-right" style="text-shadow: 0px 0px 35px #333;">راه های ارتباطی:</h3>
                            <p style="text-align: right; font-weight: 400; font-size: 18px; margin-right: 50px; line-height: 40px;">
                            <b>آدرس:</b>اصفهان میدان جمهوری خ خرم خ شهیدان احدپلاست ماربین<br>
                            <strong>تلفن:</strong> 33300000 - 33383944<br>
                            <strong>ایمیل</strong>: info@ahadplast.ir<br>
                            <strong>همراه:</strong> +989131055386<br>
                            <?php /*contact_show();*/ ?>
                            <div class="d-flex mx-auto" id="soc_box">
                                <div class="social_icons"><a href=""><img src="img/social/instagram2.jpg" alt="" class="fill"></a></div>
                                <div class="social_icons"><a href=""><img src="img/social/whatsapp2.png" alt="" class="fill"></a></div>	
                            </div>
                            </p>
                        </div>
                        <div id="contact_col_2">
                            <div class="d-flex" id="goolin">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3358.473514693989!2d51.64482661643733!3d32.67345179192405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fbc35aa47852b81%3A0xd9157edbb645348b!2z2KfYrdivINm-2YTYp9iz2Ko!5e0!3m2!1sen!2s!4v1557941642003!5m2!1sen!2s" width="600" height="450" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
		</div>
        
		<div class="slider-button" data-dir='next'>محصولات<img src="img/cur.png" style="position: absolute; bottom: 15px;"></div>
		<div class="pageindicator"></div>
		<div class="pi_notification">شما می توانید با دبل کلیک به حالت اسکرول بروید!</div>
	</div>
	
	
<?php include "includes/footer.php"; ?>