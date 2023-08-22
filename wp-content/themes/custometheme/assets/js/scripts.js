var sb = sb || {};
//Core scripts
sb.core = function () {
    var self = {
        load: function () {
            jQuery(document).ready(self.ready);
        },
        ready: function () {
            self.loadtable();
            self.tablesearch();
        },
        loadtable:function(){
            $('#mytable').append('<table id="myadmintable">');
            $('#myadmintable').append('<tr>'
            +'<th>ID</th>'
            +'<th>Post_title</th>'
            +'<th>'+'Post_content'+'</th>'
            +'<th>'+'Post_date'+'</th>'
            +'<th>'+'Post_status'+'</th>'
            +'</tr>');

            self.loaddata();
            $('#mytable').append('</table>');
        },
        loaddata:function(){
            var productDataUrl = 'http://localhost/wordpress/wp-json/sb_clothes/v1/clothes/';
            jQuery.ajax({
                type: "GET",
                url: productDataUrl,
                success: function (response) {

                    var postlist  = JSON.parse(response);
                    $('#myadmintable').append("<tbody id='myadmintbody'>");
                    var myArray = new Array();
                    postlist.forEach(function(data){
                        $('#myadmintable').append('<tr>'
                        +'<td>'+data.post_id+'</td>'
                        +'<td class="title">'+data.post_title+'</td>'
                        +'<td>'+data.post_content+'</td>'
                        +'<td>'+data.post_date+'</td>'
                        +'<td>'+data.post_status+'</td>'+
                        '</tr>');
                        myArray.push(data.post_id);
                     }
                     
                     )
                     self.tablesort(myArray);
                     $('#myadmintable').append("</tbody>");
                }
            });var sb = sb || {};
            //Core scripts
            sb.core = function () {
                var self = {
                    load: function () {
                        jQuery(document).ready(self.ready);
                    },
                    ready: function () {
                        self.loadtable();
                        self.tablesearch();
                    },
                    loadtable:function(){
                        $('#mytable').append('<table id="myadmintable">');
                        $('#myadmintable').append('<tr>'
                        +'<th>ID</th>'
                        +'<th>Post_title</th>'
                        +'<th>'+'Post_content'+'</th>'
                        +'<th>'+'Post_date'+'</th>'
                        +'<th>'+'Post_status'+'</th>'
                        +'</tr>');
            
                        self.loaddata();
                        $('#mytable').append('</table>');
                    },
                    loaddata:function(){
                        var productDataUrl = 'http://localhost/wordpress/wp-json/sb_clothes/v1/clothes/';
                        jQuery.ajax({
                            type: "GET",
                            url: productDataUrl,
                            success: function (response) {
            
                                var postlist  = JSON.parse(response);
                                $('#myadmintable').append("<tbody id='myadmintbody'>");
                                var myArray = new Array();
                                postlist.forEach(function(data){
                                    $('#myadmintable').append('<tr>'
                                    +'<td>'+data.post_id+'</td>'
                                    +'<td class="title">'+data.post_title+'</td>'
                                    +'<td>'+data.post_content+'</td>'
                                    +'<td>'+data.post_date+'</td>'
                                    +'<td>'+data.post_status+'</td>'+
                                    '</tr>');
                                    myArray.push(data.post_id);
                                 }
                                 
                                 )
                                 self.tablesort(myArray);
                                 $('#myadmintable').append("</tbody>");
                            }
                        });
                    },
                    tablesearch:function(){
                        $('#searchbar').on("keyup", function() {
                            var value = $(this).val().toLowerCase();
                            $('#myadmintbody  tr').filter(function(){
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                            })
                        });
                    },
                    tablesort:function(id){
                        var post_id = id;
            
                        $('#sorttable').click(function(){
                             post_id.reverse();
                             console.log(post_id);
                        });
                    }
                };
                return self;
            }();
            sb.core.load();
    };
    return self;
}();
sb.core.load();