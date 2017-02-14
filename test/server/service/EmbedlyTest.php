<?php
require_once($_SERVER["DOCUMENT_ROOT"] . '/madero/main/server/service/Embedly.php');

$urls = array(
    "http://www.youtube.com/watch?v=iF3gzfel-a0",
    "http://www.howcast.com/videos/328008-How-To-Marble-Easter-Eggs",
    // "http://img402.yfrog.com/i/mfe.jpg/",
    "http://www.flickr.com/photos/10349896@N08/4490293418/",
    "http://imgur.com/6pLoN",
    //"http://twitgoo.com/1as",
    "http://www.qwantz.com/index.php?comic=1686",
    "http://www.23hq.com/mhg/photo/5498347",
    //---"http://www.youtube.com/watch?v=gghKdx558Qg",
    //"http://revision3.com/hak5/DualCore",
    //---"http://www.dailymotion.com/video/xcstzd_greek-wallets-tighten-during-easter_news",
    //"http://www.collegehumor.com/video:1682246",
    //"http://www.twitvid.com/D9997",
    "http://www.break.com/game-trailers/game/just-cause-2/just-cause-2-lost-easter-egg?res=1",
    "http://vids.myspace.com/index.cfm?fuseaction=vids.individual&videoid=104063637",
    "http://www.metacafe.com/watch/105023/the_easter_bunny/",
    // demora mucho "http://blip.tv/file/449469",
    //"http://video.google.com/videoplay?docid=-5427138374898988918&q=easter+bunny&pl=true",
    //"http://www.viddler.com/explore/BigAppleChannel/videos/113/",
    //---"http://www.liveleak.com/view?i=e0b_1239827917",
    //"http://www.hulu.com/watch/67313/howcast-how-to-make-braided-easter-bread",
    //---"http://www.funnyordie.com/videos/f6883f54ae/the-unsettling-ritualistic-origin-of-the-easter-bunny",
    //---"http://vimeo.com/10446922",
    //---"http://www.ted.com/talks/jared_diamond_on_why_societies_collapse.html",
    "http://www.thedailyshow.com/watch/thu-december-14-2000/intro---easter",
);

$oembed = new Embedly();
print_r($oembed->getOembeds($urls));

//print_r($oembed->getOEmbedsWithWidthHeight($urls, 200, 50));