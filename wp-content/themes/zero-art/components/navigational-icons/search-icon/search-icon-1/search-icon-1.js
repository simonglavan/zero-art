import "./_search-icon-1.scss";

$(function () {
    $('.search-icon-1__link').click(function (e) { 
        e.preventDefault();

        
        if($('.search-icon__search-form-container').css('display') == "none") {
            $('.search-icon__search-form-container').slideDown(400, function() {
                $('.search-box-close').css('transform', 'scale(0.9)');
            });
            
        } else {
            $('.search-icon__search-form-container').slideUp(400, function() {
                $('.search-box-close').css('transform', 'scale(0)'); 
            });
            
        }
       
    });
});