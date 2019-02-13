 $(document).ready(function(){
  
     $('.select-sort').click(function(){
     
         $('.sorting-list').slideToggle(400);
  });
     
//     $('.block-category > ul > li > a').click(function(){
//        
//         if ($(this).attr('class') != 'active'){
//             
//             $('.block-category > ul > li > ul').slideUp(200);
//             $(this).next().slideToggle(200);
//             
//                $('.block-category > ul > li > a').removeClass('active');
//                $(this).addClass('active');
//                $.cookie('select_cat', $(this).attr('id'));
//         }else
//             {
//                 $('.block-category > ul > li > a').removeClass('active');
//                 $('.block-category > ul > li > ul').slideUp(200);
//                 $.cookie('select_cat', '');
//             }
//         
//     });
//     
//     if ($.cookie('select_cat') != '')
//         {
//             $('.block-category > ul > li > #'+$.cookie('select_cat')).addClass('active').next().show();
//         }
      $("ul.tabs").jTabs({content: ".tabs_content", animate: true});
     loadcart();
     
     $('#gen_pass').click(function(){
         $.ajax({
             type: "POST",
             url: "functions/genpass.php",
             dataType: "html",
             cache: false,
             success: function(data){
                 $('#reg_pass').val(data);
             }
         });
     });
     
     $("#reloadcaptcha").click(function(){
         $("#block-captcha img").attr("src", "reg/reg_captcha.php?r="+Math.random());
     });
     
     $(".top-auth").toggle(
     function(){
         $(".top-auth").attr("id","active-button");
         $(".block-top-auth").fadeIn(200);
     },
     function(){
         $(".top-auth").attr("id","");
         $(".block-top-auth").fadeOut(200);
     });
     
     $("#button-pass-show-hide").click(function(){
         var statuspass = $("#button-pass-show-hide").attr("class");
         
         if (statuspass == "pass-show")
             {
                $("#button-pass-show-hide").attr("class", "pass-hide");
                        var $input = $("#auth-pass");
                        var change = "text";
                        var rep = $("<input placeholder='Пароль' type='" +change+"' id='auth-pass'>")
                        .attr("id", $input.attr("id"))
                        .attr("name", $input.attr("name"))
                        .attr("class", $input.attr("class"))
                        .val($input.val())
                        .insertBefore($input);
                 $input.remove();
                 $input.rep;
             }else
                 {
                     $("#button-pass-show-hide").attr("class", "pass-show");
                        var $input = $("#auth-pass");
                        var change = "password";
                        var rep = $("<input placeholder='Пароль' type='" +change+"' id='auth-pass'>")
                        .attr("id", $input.attr("id"))
                        .attr("name", $input.attr("name"))
                        .attr("class", $input.attr("class"))
                        .val($input.val())
                        .insertBefore($input);
                 $input.remove();
                 $input.rep;
                 }
     });
     
     
     $("#button-auth a").click(function(){
         var auth_login = $("#auth-login").val();
         var auth_pass = $("#auth-pass").val();
         
        
         if (auth_login == "" || auth_login.length > 30)
            { 
                $("#auth-login").css("borderColor", "#FDB6B6");
                send_login = 'no';
            }else
                {
                    $("#auth-login").css("borderColor", "#DBDBDB");
                    send_login = 'yes';
                }
         
           if (auth_pass == "" || auth_pass.length > 30)
            { 
                $("#auth-pass").css("borderColor", "#FDB6B6");
                send_pass = 'no';
            }else
                {
                    $("#auth-pass").css("borderColor", "#DBDBDB");
                    send_pass = 'yes';
                }
         if ($("#rememberme").prop('checked'))
             {
                 auth_rememberme = 'yes';
             }else{auth_rememberme = 'no';}
         
         if (send_login == 'yes' && send_pass == 'yes')
             {
                 $("#button-auth").hide();
                 $("#auth-loading").show();
                 
                 $.ajax({
                     type: "POST",
                     url: "include/auth.php",
                     data: "login="+auth_login+"&pass="+auth_pass+"&rememberme="+auth_rememberme,
                     dataType: "html",
                     cache: false,
                     success:function(data){
                         if (data == 'yes_auth')
                             {
                                 lacation.reload();
                             }else
                                 {
                                     $("#message-auth").slideDown(400);
                                     $("#auth-loading").hide();
                                     $("#button-auth").show();
                                 }
                     }
                 });
             }
         
     });
     
     //Шаблон проверки t-mail на правильность
//     function isValidEmailAddress(emailAddress) {
//         var pattern = new RegExp(/^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/i);
//     }
     
     
     $(".add-to-cart").click(function(){
         var tid = $(this).attr("tid");
         
         $.ajax({
             type: "POST",
             url: "include/addtocart.php",
             data: "id="+tid,
             dataType: "html",
             cache: false,
             success: function(data){
                 loadcart();
             }
         });
     });
     
     function loadcart(){
         $.ajax({
             type: "POST",
             url: "include/loadcart.php",
             dataType: "html",
             cache: false,
             success: function(data){
                 if (data == "0")
                     {
                         $("#itog-price-cart").html("0");
                         
                     }else{
                         $("#itog-price-cart").html(data);
//                         $(".itog-price-cart").html(fun_group_price(itogprice));
                         
                     }
             }
         });
     }
     
     function fun_group_price(intprice){
         var result_total = String(intprice);
         var lenstr = result_total.length;
         
         switch(lenstr){
             case 4:
                 {groupprice =result_total.substring(0, 1) + " "+result_total.substring(1, 4);
            break;}
                 case 5:
                { groupprice =result_total.substring(0, 2) + " "+result_total.substring(2, 5);
            break;}
                 case 6:
                 {groupprice =result_total.substring(0, 3) + " "+result_total.substring(3, 6);
            break;}
                 case 7:
                 {groupprice =result_total.substring(0, 1) + " "+result_total.substring(1, 4) + " " + result_total.substring(4,7);}
            break;
             default: {
                 groupprice = result_total;
                 
             }
                
                 
         }
         return groupprice;
     }
     
     
     
     $(".count-minus").click(function(){
         var idcount = $(this).attr("data-idcount");
         
         $.ajax({
             type: "POST",
             url: "include/count-minus.php",
             data: "id="+idcount,
             dataType: "html",
             cache: false,
             success: function(data){
                 
                $("#input-id"+idcount).val(data);
                 loadcart();
                 
                 //ПЕРЕМЕННАЯ С УЕНОЙ ПРОДУКТА
                 var priceproduct = $("#tovar"+idcount+" > p").attr("price");
                 
                    //УЕНУ УМНОЖАЕМ НА КОЛИЧЕСТВО
                 result_total = Number(priceproduct) * Number(data);
                 
                 $("#tovar"+idcount+" > p").html(fun_group_price(result_total) + " руб");
                 $("#tovar"+idcount+" > h5 > .span-count").html(data);
                 
                 itog_price();
             }
         });
     });
     
     

     
      $(".count-plus").click(function(){
         var idcount = $(this).attr("data-idcount");
         $.ajax({
             type: "POST",
             url: "include/count-plus.php",
             data: "id="+idcount,
             dataType: "html",
             cache: false,
             success: function(data){
                $("#input-id"+idcount).val(data);
                 loadcart();
                 
                 //ПЕРЕМЕННАЯ С УЕНОЙ ПРОДУКТА
                 var priceproduct = $("#tovar"+idcount+" > p").attr("price");
                    //УЕНУ УМНОЖАЕМ НА КОЛИЧЕСТВО
                 result_total = Number(priceproduct) * Number(data);
                 $("#tovar"+idcount+" > p").html(fun_group_price(result_total) + " руб");
                 $("#tovar"+idcount+" > h5 > .span-count").html(data);
                 
                 itog_price();
             }
         });
     });
     
     $(".count-input").keypress(function(e){
         if (e.keyCode == 13){
             var idcount = $(this).attr("data-idcount");
             var incount = $("#input-id"+idcount).val();
             
             $.ajax({
                type: "POST",
                 url: "include/count-input.php",
                 data: "id="+idcount+"&count="+incount,
                 dataType: "html",
                 cache: false,
                 success: function(data){
                     $("#input-id"+idcount).val(data);
                     loadcart();
                     
                     //ПЕРЕМЕННАЯ С ЦЕНОЙ ПРОДУКТА
                     var priceproduct = $("#tovar"+idcount+" > p").attr("price");
                     //ЦЕНУ УМНОЖАЕМ НА КОЛИЧЕСТВО
                     result_total = Number(priceproduct) * Number(data);
                 $("#tovar"+idcount+" > p").html(fun_group_price(result_total) + " руб");
                 $("#tovar"+idcount+" > h5 > .span-count").html(data);
                 
                 itog_price();
                } 
                 }); 
                }
            });
     
    function itog_price(){
        $.ajax({
            type: "POST",
            url: "include/itog_price.php",
            dataType: "html",
            cache: false,
            success: function(data){
                console.log(data);
                $(".itog-price > strong").html(data);
            }
        });
    }
     
     $("#button-send-review").click(function(){
         var name = $("#name_review").val();
         var good = $("#good_review").val();
         var bad = $("#bad_review").val();
         var comment = $("#comment_review").val();
         var iid = $("#button-send-review").attr("data-iid");
         
         if (name != "")
             {
                var name_review = '1';
                 $("#name_review").css("borderColor","#dbdbdb");
             }else{
                 name_review = '0';
                 $("#name_review").css("borderColor","#fdb6b6");
             }
         
        if (good != "")
             {
                 var good_review = '1';
                 $("#good_review").css("borderColor","#dbdbdb");
             }else{
                 good_review = '0';
                 $("#good_review").css("borderColor","#fdb6b6");
             } 
         
        if (bad != "")
             {
                 var bad_review = '1';
                 $("#bad_review").css("borderColor","#dbdbdb");
             }else{
                 bad_review = '0';
                 $("#bad_review").css("borderColor","#fdb6b6");
             } 
        
        if (comment != "")
             {
                 var comment_review = '1';
                 $("#comment_review").css("borderColor","#dbdbdb");
             }else{
                 comment_review = '0';
                 $("#comment_review").css("borderColor","#fdb6b6");
             }
         if (name_review == '1' && good_review == '1' && bad_review == '1' && comment_review == '1')
             {
                 $("#button-send-review").hide();
                 $("#reload-img").show();
                 console.log(iid);
                 console.log(name);
                 console.log(good);
                 console.log(bad);
                 console.log(comment);
                 $.ajax({
                    type: "POST",
                    url: "include/add_review.php",
                    data: "id="+iid+"&name="+name+"&good="+good+"&bad="+bad+"&comment="+comment,
                    dataType: "html",
                    cache: false,
                    success: function(){
                        setTimeout("$.fancybox.close()",1000);
                        
                    }
                     
                 });
             }
     });
     
});






