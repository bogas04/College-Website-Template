<?php include 'php/header.php'; ?>
<script>
  $(document).ready(function(){
    $('#content .img-block').click(function() {
      $('#lightbox #img-content').css("background",$(this).css('background-image') + " 100% 100% / 100% no-repeat");
      $('#lightbox').show();
    });
  });
</script>
<style>
  #lightbox{  
    padding:4px;
    position: fixed;
    background: none repeat scroll 0% 0% #FFF;
    border: 1px solid #000;
    height: 50%;
    display: none;
    box-shadow: 0px 0px 10px 2px;
    width: 60%;
    height: 70%;
    z-index:102;
  }#lightbox #img-content img{
    width: 100%;
    padding: 10px;
  }.img-block{
    width:225px;
    height:175px;
    margin:10px;
    cursor:pointer;
  }#img-content{
    width:100%;
    height:100%;
  }</style>
<div id="content" class="col-md-9">
  <?php
    if ($handle = opendir('img/gallery')) {
      while (false !== ($entry = readdir($handle)) && (stripos($entry,"jpg") !== false || stripos($entry,"jpeg") !== false || stripos($entry,"png") !== false || stripos($entry,"gif") !== false)) {
        echo '<div class="col-xs-6 col-md-5 img-block" style="background:url(img/gallery/'.$entry.') 100% 100% / 100% no-repeat;"></div>';
      }
      closedir($handle);
    }
  ?>
 <div id="lightbox">
  <span class="pull-right close" style="height: 26px; width: 27px; position: fixed;  border-radius: 50%;margin-top: -20px;background: none repeat scroll 0% 0% #000;margin-left: -17px;color: white; opacity: 1;-moz-opacity:1;-webkit-opacity:1;-o-opacity:1;-ms-opacity:1;border: 2px solid #000; box-shadow: 0px 0px 5px 2px #808080; text-align: center;" onclick="$('#lightbox').hide();">×</span>
  <div id='img-content'></div>
 </div>
 <div class="help-block"> 
  Send us images related to Manufacturing and Processes at <a href="mailto:divjot.singh@live.in">divjot.singh@live.in</a>
 </div>
</div>
<?php include 'php/footer.php'; ?>
