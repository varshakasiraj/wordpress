var sb = sb || {};
//Core scripts
sb.core = function () {
    var self = {
        load: function () {
            jQuery(document).ready(self.ready);
        },
        ready: function () {
            self.loadtable();
            self.loaddata();
            self.tablesearch();
            self.tablesort();
            self.fliterCategories();
            self.tablerefresh();
            
        },

        loadtable:function(){
            $('#sortmenu').append('<input id="filterbar" type="text" placeholder="Search..">');
            
            $('#mytable').append('<table id="myadmintable">');
            $('#myadmintable').append('<thead id="myadminhead">');
            $('#myadminhead').append('<tr>'
            +'<th>ID</th>'
            +'<th>'+'Post_categories_name'+'</th>'
            +'<th>'+'Post_title'+'</th>'
            +'<th>'+'Post_content'+'</th>'
            +'<th>'+'Post_date'+'</th>'
            +'<th>'+'Post_status'+'</th>'
            +'</tr>');
            
            $('#mytable').append('</thead>');
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
                                myArray[data.post_term_id ]=[data.post_term_name];
                            } 
                         });                   
                        $('#myadmintable').append("</tbody>");
                        $('#filtercheckbox').append('<div class="filtercheckboxdiv">');
                        myArray.forEach(function(value,key){ 
                            $('.filtercheckboxdiv').append('<input type="checkbox" name="' +key+ '" id="' +key+ '"/>' +
                             '<label for="' +value + '">' + value +'</label>');
                             self.fliterCategories(key,value);
                        });
                        $('#filtercheckbox').append('</div>');
                        self.pagination();
                        self.exportcsvfile();
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
                    
            }).appendTo(' #myadmintable #myadmintbody'); 
            });
           
        },
        tablerefresh:function(){
            $('#refreshtable').click(function(){
                history.go(0);
            });
            
        },
        pagination:function(){
            $('#paginationdiv').append('<div id="paginationbutton">');
            $('#paginationbutton').append('</div>');
            var perPage = 2;
            var total_posts = $('body #myadmintbody tr').length;
            var number_pages = Math.ceil(total_posts/perPage);
            console.log(number_pages );
            for(var i=1; i<= number_pages; i++){
                $('#paginationbutton').append('<button  type="button">'+i+'</button> &nbsp');

            };
            showPage = function(page) {
                $(".tablerow").hide();
                $(".tablerow").each(function(n) {
                    if (n >= perPage * (page - 1) && n < perPage * page)
                        $(this).show();
                });        
            }
            
            showPage(1);
            $('#paginationbutton button').click(function (params) {
                $("#paginationbutton button").removeClass("current");
                $(this).addClass("current");
                $(this).css('background',' aqua');
                showPage(parseInt($(this).text()))
            });
        },
        exportcsvfile:function(){
            $('#exportcsvfile ').click(function(){
                var arrCSVData = [];
                var sVal = '';

            $('#mytable').each(function () {
                if ($(this).find("th").length) {
                    var arrData = [];
                    $(this).find("th").each(function () {
                     sVal = $(this).text().replace(/"/g, '""');
                     arrData.push('"' + sVal + '"');

                    });
                    arrCSVData.push(arrData.join(','));
                }
                if($(this).find("td").length){
                    $(this).find("td").each(function () {
                        sVal = $(this).text().replace(/"/g, '""');
                        arrData.push('"' + sVal + '"');
                    });

                    arrCSVData.push(arrData.join(','));
                }
            });
            var csvData = arrCSVData.join('n');
            var downloadURL= 'data:application/csv;charset=UTF-8,' +  
            encodeURIComponent(csvData);
            $(this).attr("href", downloadURL);
            })
        }
    };
    return self;
}();
sb.core.load();