var ITJL = ITJL || {};
//Core scripts
ITJL.core = function () {
    var self = {
        load: function () {
            console.log('hi varsha');
         
            jQuery(document).ready(self.ready);
        },
        ready: function () {
            var productDataUrl = 'http://localhost/wordpress/wp-json/sb_clothes/v1/clothes/';
            jQuery.ajax({
                type: "GET",
                url: productDataUrl,
                success: function (response) {
                    var postlist  = JSON.parse(response);
                    postlist.forEach(function(data){
                        console.log(data.post_id);
                     })
                }
            });
        }
    };
    return self;
}();
ITJL.core.load();