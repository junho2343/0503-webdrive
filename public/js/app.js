$(document).ready(function(){
      $("#upload").change(function(){
        $(this).siblings("input[type='submit']").click();
        console.log('ad');
    });
    $(".file_wrap").on("dblclick","img",function(){
        var target = $(this).attr("data-link");
        location.href = target;
    });
    $(".file_wrap img").on("contextmenu",function(e){
        console.log(e);
        e.preventDefault();
        $(".file_wrap img").css({"border":"1px solid #e6e6e6"});
        $(this).css({"border":"1px solid #4351d5"});
        $(".information").css({"display":"none"});
        $(this).siblings(".information").css({"display":"block"});
    });
    $(window).on("click",function(e){
        $(".file_wrap img").css({"border":"1px solid #e6e6e6"});
        $(".information").css({"display":"none"});

    });
    $(".name").on("click",function(){
        $(".frow p").css({"display":"block"});
        $(".frow .input_name").css({"display":"none"});
        $(this).parents(".frow").find("p").css({"display":"none"});
        $(this).parents(".frow").find(".input_name").css({"display":"block"});
        $(this).parents(".frow").find(".input_name").focus();
    });
})
