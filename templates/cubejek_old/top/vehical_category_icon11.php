<?
   include_once("common.php");
   $meta_arr = $generalobj->getsettingSeo(2);
   $sql = "SELECT * from language_master where eStatus = 'Active'" ;
   $db_lang = $obj->MySQLSelect($sql);
   $sql = "SELECT * from country where eStatus = 'Active'" ;
   $db_code = $obj->MySQLSelect($sql);
   //echo "<pre>";print_r($db_lang);
	$script="vehical-cat-icon";
	$catquery = "SELECT iVehicleCategoryId,vHomepageLogo,vCategory_".$default_lang." as vehicalcategory FROM `vehicle_category` WHERE iParentId = 0 and eStatus = 'Active'";
	$vcatdata = $obj->MySQLSelect($catquery);
?>
<?php if($APP_TYPE == 'Ride-Delivery-UberX'){ ?>
<link rel="stylesheet" type="text/css" href="assets/css/home-new/home-new.css">
<link rel="stylesheet" type="text/css" href="assets/css/home-new/home-new-media.css">
<? } ?>
<script type="text/javascript" src="assets/js/amazingcarousel.js"></script>
<script type="text/javascript" src="assets/js/initcarousel.js"></script>

<!-- css -->
<!-- js -->
    <!-- Default Top Script and css -->
    <?php include_once("top/top_script.php");?>
    <?php include_once("top/validation.php");?>
    <!-- End: Default Top Script and css-->

    <!-- home page -->
    <div id="main-uber-page">
    <!-- Left Menu -->
    <?php include_once("top/left_menu.php");?>
    <!-- End: Left Menu-->
        <!-- Top Menu -->
        <?php include_once("top/header_topbar.php");?>
        <!-- End: Top Menu-->
        <!-- contact page-->
        <div class="our-services">
			<div class="our-services-inner">
                  <h2>NOSSOS SERVI�OS</h2>
                <ul>
					<?php
					if(!empty($vcatdata)){
						for($i=0;$i<count($vcatdata);$i++){
							if(!empty($vcatdata[$i]['vHomepageLogo'])){
					?>
					<li><b><img alt="Taxi Ride App" src="<?=$tconfig["tsite_upload_home_page_service_images"].'/'.$vcatdata[$i]['vHomepageLogo']?>"></b><span><?= $vcatdata[$i]['vehicalcategory'];?></span></li>
					<?php 
							}
						} 
					}
					?>
				 </ul>
                <div style="clear:both;"></div>
            </div>
        </div>
    <!-- footer part -->
    <?php include_once('footer/footer_home.php');?>
    <!-- footer part end -->
            <!-- End:contact page-->
            <div style="clear:both;"></div>
    </div>
    <!-- home page end-->
    <!-- Footer Script -->
    <?php include_once('top/footer_script.php');
    $lang = get_langcode($_SESSION['sess_lang']);?>
    <!-- End: Footer Script -->

