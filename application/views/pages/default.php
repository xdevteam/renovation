

<!-- Main Content -->

<div id="main">
    <div class="container wf-wrap" id="main_wrapper_wf">
        <div class="row">
            <!-- Tabs -->
            <div id="tabs-container"> 
                <div class="tabs-content clearfix">
                    <!-- Categories List -->
                    <?php include_once'application/views/templates/category-sidebar.php'; ?>
                    <!-- Categories List End -->
                    <!-- Home tab Grid -->
                    <div class="col-sm-8 col-md-7 col-lg-7 col-xs-12 clearfix tabs-content-grid home-tab-grid">
                        <div id="category_content">                       
                            <?php include_once'application/views/templates/slider.php'; ?>
                        </div>
                        <?php //}
                        ?>
                        <!-- </div> -->
                    </div>
                    <!-- Home tab grid End -->                   
                     <!-- Brands List-->
                    <?php include_once'application/views/templates/brand-list.php'; ?>                    
                </div>                
                <!-- Brands List End -->
            </div>
            <!-- Tabs End -->
        </div>
         <hr>       
    </div>
</div>