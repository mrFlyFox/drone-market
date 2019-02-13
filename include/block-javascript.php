<!--<script src="javascript/jquery-1.12.3.min.js"></script>-->
<!--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
    <script src="javascript/js-jquery-1.7.2.min.js"></script>
    <script src="javascript/jquery.bxslider.min.js"></script>
    <script src="javascript/dropmenu.js"></script>
    <script src="javascript/main.js"></script>
    <script src="javascript/jquery.cookie.js"></script>
    <script src="javascript/jquery-ui.js"></script>
    <script src="javascript/jTabs.js"></script>
    <script src="javascript/jquery.form.js"></script>
    <script src="javascript/jquery.validate.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
  $('.bxslider').bxSlider({
    auto: true,
    pause: 6000,
    speed: 1000
  });
});
         $(document).ready(function(){
  $('.bxslider2').bxSlider({
    auto: true,
    pause: 6000,
    speed: 1000,
      minSlides: 4,
  maxSlides: 4,
  slideWidth: 275,
  slideMargin: 22
  });
});
        $(function() {
    $( "#accordion" ).accordion({
      collapsible: true
    });
  });
    </script>