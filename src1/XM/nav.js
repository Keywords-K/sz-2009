define(["jquery"],function($){
    function download(){
        $.ajax({
            type:"get",
            url:"../data/nav.json",
            success:function(result){
                var bannerArr = result.banner;
                for(var i = 0;i<bannerArr.length;i++){
                    $(`<a href="#">
                    <img class = 'swiper-lazy swiper-lazy-loaded' src = '../images/banner/2.jpg' alt=""
                    <a/>`).appendTo("#J_homeSwiper.swiper-slide");

                    var node = $(`<a href="#" class = 'swiper-pagination-bullet swiper-pagination-bullet-active'></`)
                }
            },
            error:function(msg){
                console.log(msg);
            }
        })
    }
})