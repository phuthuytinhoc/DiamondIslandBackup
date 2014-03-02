<span id = 'slide-left-click-bg'></span><span id = 'slide-right-click-bg'></span>

<script type="text/javascript">
    $(document).ready(function(){

        var slideStep = 132;
        var flip = 0;
        var currentPic = 0;
        var total = $('.gal-slide_images img').size();
        var lastcheck = total - 5;
        var  srcImage = "";
        var ttl = parseInt(total *132);

        $('body').css({'overflow' : 'hidden'});
        $(".gal-slide_images").css('width' , ttl);
        function showShareIt(attr)
        {
            if(flip++ % 2 == 0)
                $(attr).slideDown(600);
            else
                $(attr).slideUp(200);
        }

        function changeCSSIMG(idPic)
        {
            $('.gal-slide_images img').removeClass('selected-gallery');
            $('.gal-slide_images img#' + idPic).addClass('selected-gallery');
        }

        function move()
        {
            $(".gal-slide_images").css("transform","translateX("+currentPic* -122+"px)");
        }

        function moveOther(id)
        {
            $(".gal-slide_images").css("transform","translateX("+id* -122+"px)");
        }

        function listImages(id, src)
        {
            $('#bg-img').attr('src', src)
        }



        $('#bg-img').attr('src', $('.gal-slide_images img#0').attr('alt'));
        changeTitle(currentPic);
        //SCROLLBAR list images
        $('.gal-slide-container').niceScroll();

        $('#clicked-fb').click(function(){
            showShareIt('.gal-share-right');
        });

        $('#clicked-twt').click(function(){
            showShareIt('.gal-share-right');
        });

        $('#clicked-share').click(function(){
            showShareIt('.gal-share-right');
        });

        //SLIDE SHOW
        //nhan nut button ben phai
        $('.gal-rightarrow').click(function(){
            currentPic++;
            if(currentPic < total)
            {
                changeCSSIMG(currentPic);//
            }
            else
            {
                currentPic = 0;
                changeCSSIMG(currentPic);
            }
            srcImage  =  $('.gal-slide_images img#' + currentPic).attr('alt');
            $('#bg-img').attr('src', srcImage);
            changeTitle(currentPic);
            if(currentPic<lastcheck)
                move();
        });

        //nhan nut button ben trai
        $('.gal-leftarrow').click(function(){
            currentPic--;
            if(currentPic > 0 || currentPic == 0)
            {
                changeCSSIMG(currentPic);
            }
            else
            {
                currentPic = total-1;
                changeCSSIMG(currentPic);
                var ha = currentPic -5;
                moveOther(ha);

            }
            srcImage  =  $('.gal-slide_images img#' + currentPic).attr('alt');
            $('#bg-img').attr('src', srcImage);
            changeTitle(currentPic);
            if(currentPic<lastcheck)
                move();
        });

        function changeTitle(id)
        {
            var title = $('.gal-slide_images #' + id).attr('title');
            $('div.gal-caption-content p').html(title);
        }

        //click on pics
        $('.gal-slide_images img').click(function(){
            var idNow = $(this).attr('id');
           currentPic = idNow;
            srcImage  =  $(this).attr('alt');
            $('#bg-img').attr('src', srcImage)
            changeTitle(currentPic);
            changeCSSIMG(currentPic);
            if(currentPic < lastcheck )
            {
               move();
            }
        });

    })
</script>

<script type="text/javascript">
    $(document).ready(function(){

        var iframe = $('#block-fblikebutton-fblikebutton-static-block .content').html();
        $('#block-fblikebutton-fblikebutton-static-block').html('');
        $('#clicked-like').append(iframe);

        //DECTECT IPAD ARROW
        if(navigator.platform == "iPad")
        {
            $('.gal-caption-img').css('margin-top','125px');
            $('.mid-gallery').css('height','180px');
        }


    });
</script>

<script type="text/javascript">
    var id = "#background-image img";

    $(document).ready(function(){
        var Img = $("#bg-img");
        var style = $("#slelect-bg");
        Img.css({ width: style.width(), height: style.height()});
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
    <img src="" alt="" class="fullBg-bg" id="bg-img" style="" />
</div>
<div class="wrap-gallery">
    <div style="position: fixed; width: 100%; bottom: 41px;">
        <div id = 'gallery'>
        <div class="arrows-gallery">
            <div style="height: 215px; width: 100%;"></div> <!-- div trong -->
            <div class="gal-leftarrow"> </div>    <!-- left arrow -->
            <div class="gal-rightarrow"> </div>    <!-- right arrow -->
        </div>
        <div class="mid-gallery">
            <!-- <div style="height: 250px; width: 53px; background-color: red;"></div>   -->
            <div class="gal-caption-img"> <!-- div caption ben trai -->
                <div class="gal-caption-content">
                    <p style=""></p>
                </div>
                <div style="height: 11px;"> </div>
            </div>
            <div class="gal-share-right" style="display: none;"> <!-- div share ben phai -->
                <form name = 'share-friend' action = 'gallery/gallery_mail' method = 'post'>
                    <label class="lbl-share"><?php print $lang['text_share-it'];?></label>
                    
                    <input type="text" name = 'email-address' id = 'email-address' placeholder="<?php print $lang['text_share-your-mail-friend'];?>" class="email-share">
                     <textarea name = 'body-share' id = 'body-share' placeholder="<?php print $lang['text_your-message'];?>" class="content-share"></textarea>
                    <input type="submit" id = 'commit-share' name = 'commit' class="btn-shareit" value="<?php print $lang['text_send'];?>">
                </form>
                <div id = "message"></div>
            </div>
        </div>
        <div class="bottom-gallery">

            <!-- day la phan plug in mang xa hoi -->
            <div class="header-title">
                <div class="title-gallery" >
                    <?php print $lang['text_gellary'];?>
                </div>
                <div class="icon-shareit" >
                    <div id="clicked-like" >

<!--                        <img src="--><?php //print base_path() . drupal_get_path('theme', 'daokimcuong') . '/images/image_0019_thumb-up.png' ?><!--">-->
                    </div>
                    <div style="float: left; width: 15px;">
                        <a href="http://www.facebook.com/sharer/sharer.php?u=<?php print $_SERVER['HTTP_HOST'] . request_uri();?>"target="_blank" class="social">
                            <img src="<?php print base_path() . drupal_get_path('theme', 'daokimcuong') . '/images/image_0001_facebook.png' ?>">
                        </a>
                    </div>
                    <div>
                        <a href="https://twitter.com/home?status=<?php print $_SERVER['HTTP_HOST'] . request_uri();?>"target="_blank"class="social">
                            <img src="<?php print base_path() . drupal_get_path('theme', 'daokimcuong') . '/images/image_0000_twitter.png' ?>">
                        </a>
                    </div>
                    <div id="clicked-share">
                        <img src="<?php print base_path() . drupal_get_path('theme', 'daokimcuong') . '/images/image_0018_share.png' ?>">
                    </div>
                </div>
            </div>

            <div style="height: 95px; width: 20px; display: inline-block; float: left;"></div>  <!-- div trong  -->

            <div class="img-list-gallery" style="overflow: hidden;">
                    <div class="gal-slide-container" >
                        <div class="gal-slide_images">
                            <?php $index = 0; foreach ($nodes as $node) { 
                                $items = field_get_items('node',$node,'field_image');
                                $img_url = $items[0]['uri'];
                                $img_thumb_url =  image_style_url('thumbnail', $img_url);
                                $img_full_url = file_create_url($items[0]['uri']);
                                if($index == 0){
                                    $img = getimagesize($img_full_url);
                                    $h = "height:".$img[1]."px".";";
                                    $w = "width:".$img[0]."px".";";
                                    print "<div id = 'slelect-bg' style='display:none;".$w.$h."'></div>";
                                    print "<img alt = ".$img_full_url." id = ".$index." class = 'selected-gallery' src = ".$img_thumb_url." title = '$node->title'>";
                                }else{
                                    print "<img alt = ".$img_full_url." id = ".$index." src = ".$img_thumb_url." title = '$node->title'>"; 
                                }$index++;
                            }?>
                        </div>
                    </div>

                    <div style="height: 22px; width: 100%;"> <!-- scroll bar -->

                    </div>
            </div>
        </div>
    </div>
    </div>
    <div style="height: 44px; width: 100%;"> </div>  <!-- div trong -->
</div>


<script type="text/javascript">
    $(document).ready(function(){
        var email = "", body = "";
        var state = false;

        function IsEmail(email) {
          var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          return regex.test(email);
        }
        $('#email-address').change(function(){

            email = $(this).val();
            if(IsEmail(email)){
                $(this).css('border','1px solid green');
                state = true;
            }else{
                $(this).css('border','1px solid red');
                state = false;
            }
        });

        $('#body-share').change(function(){
            body = $(this).val();
            if(body.length > 9){
                $(this).css('border','1px solid green');
                state = true;
            }else{
                $(this).css('border','1px solid red');
                state = false;
            }
        });
        $("#commit-share").click(function(){
            var url = window.location;
            url = "<br><a href = '"+url+"'>"+url+"</a>";
            if (state) {
                $.ajax({
                    type: "POST",
                    url: "<?php print base_path(); ?>gallery/gallery_mail",
                    data: {email: email, body: body+url},
                    success: function(string){ 
                        if (string == 1){
                            $('#your-email').html('');
                            $('#body').html('');
                            $('#message').html("<span class = 'notice-successfull'> Email send.</span>");
                        }else{
                            $('#message').html("<span class = 'notice-error'>Email not send.</span>");  
                        };
                    }
                });
            };
            
            return false;
        });
    });
</script>