<!DOCTYPE html>
    <html lang="ja">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <title>MyHomePageSample</title>
            <meta name="keywords" content="">
            <meta name="description" content="">
            
            <link rel="stylesheet" href="style.css" type="text/css" media="screen">
  
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="js/script.js"></script>
            <link href="js/slick-theme.css" rel="stylesheet" type="text/css">
            <link href="js/slick.css" rel="stylesheet" type="text/css">
            <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
            <script type="text/javascript" src="js/slick.min.js"></script>


        </head>
        <body>
            <div id="wrapper">
                <header id="header">
                    <h1>MyHomePageSample</h1>
                    <!--ロゴ-->
                    <div class="logo">
                        <a href="index.html"><img src="images/logo.png" width="60" height="60" alt=""/>
                            <p>Company Name<span>Your Company Slogan</span></p></a>
                    </div>
                    <!--電話番号＆受付時間-->
                    <div class="info">
                        <p class="tel"><span>電話：</span>012-3456-7890</p>
                        <p class="open">受付時間：平日 AM 10:00 ～ PM 5:00</p>
                    </div>
                </header>

                <!--メインナビゲーション-->
                <nav id="mainNav">
                    <!--
                    <a class="menu" id="menu"><span>MENU</span></a>
                    -->
                        <div class="panel">
                            <ul>
                                <li class="active"><a href="index.html"><strong>トップページ</strong><span>Top</span></a></li>
                                <li><a href="subpage.html"><strong>ごあいさつ</strong><span>Greeting</span></a></li>
                                <li><a href="subpage.html"><strong>サービス概要</strong><span>Service</span></a></li>
                                <li><a href="subpage.html"><strong>弊社の取り組み</strong><span>Approach</span></a></li>
                                <li><a href="subpage.html"><strong>会社情報</strong><span>Company</span></a></li>
                                <li class="last"><a href="subpage.html"><strong>お問い合わせ</strong><span>Contact</span></a></li>
                            </ul>
                        </div>
                </nav>

                <!--メイン画像-->
                <div id="mainBanner">
                    <div class="multiple">
                        <div><img src="images/img001.jpg" alt="image01"></div>
                        <div><img src="images/img002.jpg" alt="image02"></div>
                        <div><img src="images/img003.jpg" alt="image03"></div>
                        <div><img src="images/img004.jpg" alt="image04"></div>
                        <div><img src="images/img005.jpg" alt="image05"></div>
                        <div><img src="images/img006.jpg" alt="image06"></div>
                        <div><img src="images/img007.jpg" alt="image07"></div>
                    </div>
                    <div class="slogan">
                        <h2>企業スローガン</h2>
                        <p>ホームページサンプルは自然との調和を目指します<br/>革新的な技術の世の中を動かす企業を目指します。</p>

                    </div>
                </div>

                <!--3カラム-->
                <section calss="gridWrapper">

                <form action="detail.php" method="post">
                    <article class="grid">
                        <div class="box">
                            <img src="images/item001.jpg" width="260" height="110" alt="">
                            <h3>自然との調和を目指す企業です</h3>
                            <p>ホームページサンプル株式会社では最新技術と自然との調和を目指します。革新的な技術で世の中を動かす企業を目指します。</p>
                            <input type="hidden" name="id" value="<?php echo 1;?>";>
                            <input type="submit" value="詳細画面へ">
                        </div>
                    </article>
                </form>

                <form action="detail.php" method="post">
                    <article class="grid">
                        <div class="box">
                            <img src="images/item002.jpg" width="260" height="110" alt="">
                            <h3>自然との調和を目指す企業です</h3>
                            <p>ホームページサンプル株式会社では最新技術と自然との調和を目指します。革新的な技術で世の中を動かす企業を目指します。</p>
                            <input type="hidden" name="id" value="<?php echo 2;?>";>
                            <input type="submit" value="詳細画面へ">
                        </div>
                    </article>
                </form>

                <form action="detail.php" method="post">
                    <article class="grid">
                        <div class="box">
                            <img src="images/item003.jpg" width="260" height="110" alt="">
                            <h3>自然との調和を目指す企業です</h3>
                            <p>ホームページサンプル株式会社では最新技術と自然との調和を目指します。革新的な技術で世の中を動かす企業を目指します。</p>
                            <input type="hidden" name="id" value="<?php echo 3;?>";>
                            <input type="submit" value="詳細画面へ">
                        </div>
                    </article>
                </form>

                <form action="detail.php" method="post">
                    <article class="grid">
                        <div class="box">
                            <img src="images/item004.jpg" width="260" height="110" alt="">
                            <h3>自然との調和を目指す企業です</h3>
                            <p>ホームページサンプル株式会社では最新技術と自然との調和を目指します。革新的な技術で世の中を動かす企業を目指します。</p>
                            <input type="hidden" name="id" value="<?php echo 4;?>";>
                            <input type="submit" value="詳細画面へ">
                        </div>
                    </article>
                </form>


                </section>


            <!-- フッター -->
	<footer id="footer">
		<!-- 左側 -->
		<div id="info" class="grid">
			<!-- ロゴ -->
			<div class="logo">
				<a href="index.html"><img src="images/logo.png" width="45" height="45" alt="Sample site"><p>Company Name<br><span>Your Company Slogan</span></p></a>
			</div>
			<!-- / ロゴ -->
			<!-- 電話番号+受付時間 -->
			<div class="info">
				<p class="tel"><span>電話:</span> 012-3456-7890</p>
				<p class="open">受付時間: 平日 AM 10:00 〜 PM 5:00</p>
			</div>
			<!-- / 電話番号+受付時間 -->
		</div>  
		<!-- / 左側 -->
		<!-- 右側 ナビゲーション -->
		<ul class="footnav">
			<li><a href="subpage.html">eco・環境事業</a></li>
			<li><a href="subpage.html">コンピュータ事業</a></li>
			<li><a href="subpage.html">飲食店事業</a></li>
			<li><a href="subpage.html">介護・医療事業</a></li>
			<li><a href="subpage.html">ごあいさつ</a></li>
			<li><a href="subpage.html">サービス概要</a></li>
			<li><a href="subpage.html">会社情報</a></li>
			<li><a href="subpage.html">お問い合わせ</a></li>
			<li><a href="subpage.html">サイトマップ</a></li>
		</ul>
		<!-- / 右側 ナビゲーション -->
	</footer>
	<!-- / フッター -->
	<address>Copyright(c) 2013 Sample Inc. All Rights Reserved. Design by <a href="http://f-tpl.com" target="_blank" rel="nofollow">http://f-tpl.com</a></address>
</div>

</body>
</html>



