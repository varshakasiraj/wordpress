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
            self.tablesort();
            self.fliterCategories();
            self.tablerefresh();
            self.tablepagination();
        },

        loadtable:function(){
            $('#sortmenu').append('<input id="filterbar" type="text" placeholder="Search..">');
            
            $('#mytable').append('<table id="myadmintable">');
            $('#myadmintable').append('<tr>'
            +'<th>ID</th>'
            +'<th>'+'Post_categories_name'+'</th>'
            +'<th>'+'Post_title'+'</th>'
            +'<th>'+'Post_content'+'</th>'
            +'<th>'+'Post_date'+'</th>'
            +'<th>'+'Post_status'+'</th>'
            +'</tr>');
            self.loaddata();
            $('#mytable').append('</table>');
            $('#mytable').append('<input type="hidden" id="name_order" value="asc"></input>');
        },
        loaddata:function(){
           
            var productDataUrl = 'http://localhost/wordpress/wp-json/sb_clothes/v1/clothes/';
            jQuery.ajax({
                type: "GET",
                url: productDataUrl,
                success: function (response) {
                    var postlist  = JSON.parse(response);
            
                        $('#myadmintable').append("<tbody id='myadmintbody'>");
                        var  myArray = new Array();
                        postlist.forEach(function(data){
                            $('#myadmintable').append('<tr class="tablerow" data-id="'+data.post_term_id+'">'
                            +'<td>'+data.post_id+'</td>'
                            +'<td>'+data.post_term_name+'</td>'
                            +'<td class="title">'+data.post_title+'</td>'
                            +'<td>'+data.post_content+'</td>'
                            +'<td>'+data.post_date+'</td>'
                            +'<td>'+data.post_status+'</td>'
                            +'</tr>');
                            if (myArray[data.post_term_id] === undefined) {
                                var term_id = data.post_term_id;
                                var term_name = data.post_term_name;
                                myArray[term_id] =[term_name];
                            } 
                         });                   
                        $('#myadmintable').append("</tbody>");
                        myArray.forEach(function(value,key){ 
                            $('#filtercheckbox').append('<li class = "filtercheckboxlist"><input type="checkbox" name="' +key+ '" id="' +key+ '"/>' +
                             '<label for="' +value + '">' + value +'</label></li>');
                             self.fliterCategories(key,value);
                        });
                        $('#filtercheckbox').append('</ul>');
                        
                   
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
        fliterCategories:function(key,value){
            $('#'+key).change(function() {
            var count = 0 ;
            if($('#'+key).is(':checked')){
               $('#myadmintbody  tr').filter(function(){
                 $(this).toggle($(this).attr("data-id").indexOf(key) > -1);
                 $('#'+key).parent().css('color', 'green');
                count =$('.tablerow:not([style*="display: none"])').length;    
             })
              $('<p>'+value +' count '+ count +'<p>').insertAfter("#filtercheckbox");
           }
        });
        },
        tablesort:function(){
            $('#sorttable').click(function(){
                var tbody =$('#myadmintbody');
                tbody.find('tr').sort(function(a, b){
                if($('#name_order').val()=='asc'){
                    return $('td:eq(2)', a).text().localeCompare($('td:eq(2)', b).text());
                }
                else 
                {
                    return $('td:eq(2)', b).text().localeCompare($('td:eq(2)', a).text());
                }
                    
            }).appendTo(' #mytable #myadmintbody'); 
            });
           
        },
        tablerefresh:function(){
            $('#refreshtable').click(function(){
                history.go(0);
            });
            
        },
    };
    return self;
}();
sb.core.load();