<script type="text/javascript">
    $(document).ready(function(){

       // $('#left-col-envi').niceScroll();
//        $('#right-col-envi').niceScroll();

        $('body').css('overflow','scroll');

        if($.browser.safari)
        {
            $('#maincontent').css('margin-top','64px');
        }

        if($.browser.mozilla)
        {
            $('#maincontent').css('margin-top','64px');
        }

        if($.browser.opera)
        {

            $('#maincontent').css('margin-top','64px');
            $('.detect-brower').css('margin-top', '90px');
        }
 
    });
    

    if(navigator.platform == "iPad")
    {
        $('#maincontent').css('left','0px');
    }
</script>

<script type="text/javascript">
    $(document).ready(function(){

        $('.main-content  img').click(function(){
            var src = $(this).attr("src");

            $(".image-inside img").attr("src",src);
            $('.overlay').css('display', 'block');
        });

        $('.overlay').click(function(){
            $('.overlay').css('display', 'none');
        });

    });

</script>

<script>
    $(document).ready(function() {

//            var Img = $('#imgbg');
//        var content = $("#background-image");
////        resizeImage(Img);
//
//        $("#background-image").ezBgResize({
//            id: Img,
//            center  : true,
//            content: content
//        });
    });

</script>

<script type="text/javascript">
    var id = "#background-image img";

    $(document).ready(function(){
        image_resize(id);
    });

    $(window).resize(function () {
        image_resize(id);
    });

    $(window).load(function () {
        image_resize(id);
    });

</script>



<div id = "background-image">
    <?php
       $bg_img = field_get_items("node",$items,"field_background_image");
        if($bg_img){
            $bg_url = file_create_url($bg_img[0]['uri']);
            $img = getimagesize($bg_url);

            $w = "width:".$img[0]."px".";";
            $h = "height:".$img[1]."px".";";
    ?>
             <img src = "<?php print $bg_url;?>" style = "<?php print $w.$h;?>" id = "imgbg" class="fullBg-bg">
    <?php

        }else{
            print "<img src = ".base_path().drupal_get_path('theme','daokimcuong')."/images/image_0007_1352803640.png  style = 'width:1331px; height: 713px;' class = 'fullBg-bg' id = 'imgbg'>";
        }
    ?>
</div>

<div style="width:100%; height:100%; position:absolute;  margin: 0 auto; z-index:4;">
<div class="detect-brower" style="width:100%; margin-top: 65px;" >

<div id="maincontent">
    <div id="environment">

        <div class="envi">
            <div style="display: block;">
                <?php if ($breadcrumbs){ print $breadcrumbs;}?>
            </div>
            <div style="width: 22px; height: 100%; float: left"></div>
            <div id="left-col-envi" style="">
                <fieldset class="related-post" >
                    <legend ><?php print $lang['text_related-post'];?></legend>

                    <?php 
                    if ($nodes) {foreach ($nodes as $node) {?>
                    <div class="all-newpost">
                        <div class="post-img">
                            <?php
                                if ($node['ismedia'] == 1) {
                                    if($node['virtual'] == 1){
                                        print "<a href=".base_path()."node/".$node["id"]."><img src = ".$node['img_media']."></a>";
                                    }else{
                                        print $node['media_src'];
                                    }
//                                    print "<a href = ".base_path()."node/".$node['id']."><img src=".$node['img_media']."></a>";
                                }else{
                                    print "<a href = ".base_path().'node/'.$node['id'].">
                                    <img src = ".$node['image_url']."></a>";
                                }
                            ?>
                        </div>
                        <div class="main-post">
                            <div class="header-post">
                                <div class="title-post">
                                    <a href = "<?php print base_path().'node/'.$node['id']; ?>">
                                        <?php print $node['title'];?>
                                    </a>
                                </div>
                                <div class="content-post">
                                    <?php 
                                        if ($node['ismedia'] == 0) {
                                            print $node['body'];
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="read-more">
                                <?php if ($node['ismedia'] == 0) { ?>
                                <a href = "<?php print base_path() . 'node/' . $node['id'];?>">
                                    <?php print $lang['text_read'];?>
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div style="height: 20px;"></div>
                    <?php } }?>
                </fieldset>
            </div>
            <div style="width: 22px; height: 100%; float: left;"></div>
            
            <div id="right-col-envi" style="">
                <?php if(count($items)>0){?>
                <div class="header-content">
                    <span class="title-header"><?php print $items->title; ?></span>
                    <span class="date-header">

                        <?php
                            $thu = date("l",$items->created);
                            $month = date("M",$items->created);
                            $day = date("d",$items->created);
                            $year = date("Y",$items->created);
                            $hour = date("h:i A",$items->created);

                            print $hour." ".$lang['text_dayofweek'][$thu]." ".$day." ".$lang['text_monthofyear'][$month].", ".$year;
                        ?>

                    </span>
                </div>

                <div class="main-content">
                    <div style="height: 15px; width: 500px;"></div>
                    <div class="image-content">
                         <?php
                            $ismedia = field_get_items('node',$items,'field_is_media');

                            if ($ismedia[0]['value'] == 0) {
                                 $imgs = field_get_items('node',$items,'field_image');
                                if ($imgs){
                                    $image_url = file_create_url($imgs[0]['uri']);
                                    print "<img src = ".$image_url.">";
                                }
                            }else{
                                $srcmedia = field_get_items('node',$items,'field_source_media');
                                print $srcmedia[0]['value'];
                                $body = field_get_items("node",$items,"body");
                                $img = field_get_items("node",$items,"field_image");
                                if(!(empty($body) && empty($img))){
                                    $m_img = file_create_url($img[0]['uri']);

                                     print "<div class = 'media-body'>".$body[0]['value']."</div>";

                                     print "<div class = 'media-img'> <img src=".$m_img."> </div>";
                                }
                            }

                        ?>
                    </div>

                    <div style="height: 15px; width: 500px;"></div>
                     <?php
                        $ismedia = field_get_items('node',$items,'field_is_media');
                        if ($ismedia[0]['value'] == 0){
                            $bobies = field_get_items('node',$items,'body');
                            print $bobies[0]['value'];
                        }
                     ?>
                    <?php }?>
                </div>
                <div style="height: 60px; width: 500px;"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>


</div>
</div>


<div class="overlay" style=" padding-top: 30px; ">
    <div class="image-inside" style="margin: 0 auto; text-align: center;width: 800px; padding: 53px; border: 2px; ">
        <strong class="closebutton" style="position: relative; top: 15px; left: 15px;">X</strong>
        <img style="padding: 5px;" src="" width="800" height="500" alt="">
    </div>
</div>