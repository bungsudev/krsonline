$(document).on("mobileinit",function(){
    var idmatakuliah = "";

    $("#page-matakuliah").on("pageshow",function(){
        $.post("mobile/page/ambilsemuamatakuliah",{},function(data){
            var html = "";
            $.each(data,function(index,item){
                html += " <li><a href='#page-pertemuan' " +
                               " data-idmatakuliah='"+item.idmatakuliah+ "'"+
                               " data-transition='slide'>" + 
                            "<h2>"+ item.nama +"</h2>" + 
                            "<p>Ruang 201</p>" + 
                        "</a></li>";
            })
            $("#list-matakuliah").html(html).listview("refresh");
        },"json");
    })

    $("#page-matakuliah")
        .on("click",
            "a[href='#page-pertemuan']",function(){
        idmatakuliah = $(this).data("idmatakuliah");
    })

    $("#page-pertemuan").on("pageshow",function(){
        $.post("mobile/page/ambilabsensimahasiswa"
            ,{idmatakuliah: idmatakuliah},function(data){
                var html = "";
                $.each(data,function(key,item){
                    html += "<li>Pertemuan "+item.pertemuan+
                            "<span class='ui-li-count'>"+konversiStatus(item.status)+"</span></li>";
                })
                $("#list-pertemuan")
                    .html(html)
                    .listview("refresh");
            },"json");
    })
})