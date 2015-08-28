<section id="home-section" class="slider1">
    <!--
    #################################
            - THEMEPUNCH BANNER -
    #################################
    -->
    <div class="tp-banner-container">
        <div class="tp-banner" >
            <ul>    <!-- SLIDE  -->
                <?php
                foreach ($slider as $item) {
                    if ($item['status'] == 'enable') {
                        if ($item['position'] == "style1") {
                            ?>
                            <li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on"  data-title="Intro Slide">
                                <!-- MAIN IMAGE -->
                                <img src="<?= $item['path'] ?>"  alt="slidebg1" data-lazyload="<?= $item['path'] ?>" class="hidden" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                                <!-- LAYERS -->

                                <!-- LAYER NR. 1 -->
                                <div class="tp-caption finewide_medium_white lfl tp-resizeme rs-parallaxlevel-0"
                                     data-x="30"
                                     data-y="180" 
                                     data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                     data-speed="500"
                                     data-start="1200"
                                     data-easing="Power3.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     style="z-index: 8; max-width: auto; max-height: auto; white-space: pre-wrap;"><?= $item['header1'] ?><br><span><?= $item['header2'] ?></span> <br>
                                </div>

                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption small_text customin  rs-parallaxlevel-0"
                                     data-x="100"
                                     data-y="350" 
                                     data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                     data-speed="500"
                                     data-start="1800"
                                     data-easing="Power3.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.05"
                                     data-endelementdelay="0.1"
                                     style="z-index: 7; max-width: 650px; max-height: auto; white-space: pre-wrap;"><?= $item['text'] ?>
                                </div>

                                <!-- LAYER NR. 3 -->
                                <div class="tp-caption lfl tp-resizeme rs-parallaxlevel-0"
                                     data-x="100"
                                     data-y="600" 
                                     data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                     data-speed="500"
                                     data-start="2400"
                                     data-easing="Power3.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     data-linktoslide="next"
                                     style="z-index: 10; max-width: auto; max-height: auto; white-space: nowrap;"><a href='#' class='trans-btn'>load more</a>
                                </div>

                                <!-- LAYER NR. 4 -->
                                <div class="tp-caption lfr tp-resizeme rs-parallaxlevel-0"
                                     data-x="300"
                                     data-y="600" 
                                     data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                     data-speed="500"
                                     data-start="2500"
                                     data-easing="Power3.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     data-linktoslide="next"
                                     style="z-index: 11; max-width: auto; max-height: auto; white-space: nowrap;"><a href='#' class='trans-btn2'>Portfolio</a>
                                </div>

                            </li>
                        <?php } elseif ($item['position'] == "style2") { ?>
                            <!-- SLIDE  -->
                            <li data-transition="fade" data-slotamount="7" data-masterspeed="2000" data-saveperformance="on"  data-title="Ken Burns Slide">
                                <!--MAIN IMAGE--> 
                                <img src="images/dummy.png" class="hidden" alt="2" data-lazyload="<?= $item['path'] ?>" data-bgposition="right top" data-kenburns="on" data-duration="12000" data-ease="Power0.easeInOut" data-bgfit="115" data-bgfitend="100" data-bgpositionend="center bottom">
                                <!--LAYERS--> 

                                <!--LAYER NR. 1--> 

                                <div class="tp-caption finewide_medium_white lfl tp-resizeme rs-parallaxlevel-0"
                                     data-x="160"
                                     data-y="228" 
                                     data-speed="500"
                                     data-start="1800"
                                     data-easing="Power3.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.05"
                                     data-endelementdelay="0.05"
                                     style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;"><?= $item['header1'] ?>
                                </div>

                                <!--LAYER NR. 2--> 
                                <div class="tp-caption finewide_medium_white lfr tp-resizeme rs-parallaxlevel-0"
                                     data-x="185"
                                     data-y="302" 
                                     data-speed="500"
                                     data-start="1800"
                                     data-easing="Power3.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;"><span><?= $item['header2'] ?></span>
                                </div>

                                <div class="tp-caption small_text customin  rs-parallaxlevel-0"
                                     data-x="150"
                                     data-y="420" 
                                     data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                     data-speed="500"
                                     data-start="1200"
                                     data-easing="Power3.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.05"
                                     data-endelementdelay="0.1"
                                     style="z-index: 9; max-width: 670px; max-height: auto; white-space: pre-wrap;"><?= $item['text'] ?>
                                </div>



                                <!--LAYER NR. 4--> 
                                <div class="tp-caption lfb tp-resizeme rs-parallaxlevel-0"
                                     data-x="590"
                                     data-y="600"
                                     data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                     data-speed="500"
                                     data-start="2400"
                                     data-easing="Power3.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     data-linktoslide="next"
                                     style="z-index: 12; max-width: auto; max-height: auto; white-space: nowrap;">
                                    <a href='#' class='trans-btn'>View Projects</a>
                                </div>
                            </li>
                        <?php } elseif ($item['position'] == "style3") {
                            ?>
                            <li data-transition="fade" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on"  data-title="Parallax 3D">
                                <!-- MAIN IMAGE -->
                                <img class="hidden" src="<?= $item['path'] ?> "  alt="3dbg" data-lazyload="<?= $item['path'] ?>" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                                <!-- LAYERS -->

                                <!-- LAYER NR. 1 -->
                                <div class="tp-caption finewide_medium_white lfl tp-resizeme rs-parallaxlevel-0"
                                     data-x="30"
                                     data-y="250" 
                                     data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                     data-speed="500"
                                     data-start="1200"
                                     data-easing="Power3.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;">
                                    <span><?= $item['header1'] ?></span><br>
                                    <?= $item['header2'] ?><br>
                                </div>

                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption small_text customin  rs-parallaxlevel-0 backgroun-col"
                                     data-x="500"
                                     data-y="350" 
                                     data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                     data-speed="500"
                                     data-start="1800"
                                     data-easing="Power3.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.05"
                                     data-endelementdelay="0.1"
                                     style="z-index: 7; max-width: 650px; max-height: auto; white-space: pre-wrap;"><?= $item['text'] ?>
                                </div>

                                <!-- LAYER NR. 3 -->
                                <div class="tp-caption lfl tp-resizeme rs-parallaxlevel-0"
                                     data-x="0"
                                     data-y="560" 
                                     data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                     data-speed="500"
                                     data-start="2400"
                                     data-easing="Power3.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     data-linktoslide="next"
                                     style="z-index: 10; max-width: auto; max-height: auto; white-space: nowrap;"><a href='#' class='trans-btn'>load more</a>
                                </div>

                                <!-- LAYER NR. 4 -->
                                <div class="tp-caption lfr tp-resizeme rs-parallaxlevel-0"
                                     data-x="200"
                                     data-y="560" 
                                     data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                     data-speed="500"
                                     data-start="2500"
                                     data-easing="Power3.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     data-linktoslide="next"
                                     style="z-index: 11; max-width: auto; max-height: auto; white-space: nowrap;"><a href='#' class='trans-btn2'>Projects</a>
                                </div>
                            </li>

                            <?php
                        }
                    }
                }
                ?>
            </ul>
            <div class="tp-bannertimer"></div>
        </div>
    </div>
    <!-- <div id="blur-overlay" class="normal-overlay"></div> -->
</section>



    



<!-- Main Slideshow End -->