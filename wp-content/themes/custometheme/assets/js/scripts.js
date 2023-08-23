var sb = sb || {};
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
                        var myArray = new Array();
                        postlist.forEach(function(data){
                            $('#myadmintable').append('<tr class="tablerow">'
                            +'<td>'+data.post_id+'</td>'
                            +'<td>'+data.post_term_name+'</td>'
                            +'<td class="title">'+data.post_title+'</td>'
                            +'<td>'+data.post_content+'</td>'
                            +'<td>'+data.post_date+'</td>'
                            +'<td>'+data.post_status+'</td>'
                            +'</tr>');
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
        fliterCategories:function(){
            $('#casual').click(function(){
                var value = 'casual'.toLowerCase();
                var count = 0 ;
               $('#myadmintbody  tr').filter(function(){
                  if($(this.children[1]).text().toLowerCase().indexOf(value))
                  {
                    $(this).toggle($(this.children[1]).text().toLowerCase().indexOf(value) > -1);
                    count = count+1;
                  } 
               })
           })
            $('#maxi').click(function(){
                 var value = 'maxi'.toLowerCase();
                $('#myadmintbody  tr').filter(function(){
                    if($(this.children[1]).text().toLowerCase().indexOf(value))
                    {
                        $(this).toggle($(this.children[1]).text().toLowerCase().indexOf(value) > -1);
                        count = count+1;
                    }
                })
                console.log( $(this).toggle($(this.children[1]).text().toLowerCase().indexOf(value) > -1).length);
            })
            $('#frock').click(function(){
                 var value = 'Frock'.toLowerCase();
                 var count = 0 ;
                $('#myadmintbody  tr').filter(function(){
                    if($(this.children[1]).text().toLowerCase().indexOf(value)){
                        $(this).toggle($(this.children[1]).text().toLowerCase().indexOf(value) > -1);
                        count = count+1;
                    }
                      
                })
                window
                $('#frockcount').appendTo(count);
                
            })
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
            
        }
    };
    return self;
}();
sb.core.load();