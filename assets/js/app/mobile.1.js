$(document).on("mobileinit",function(){
    
    $("#page-prodi").on("click","a[href='#page-kelas']",function(){
        $.get("mobile/page/ambiljadwal",function(data){
            var html = "";
            $.each(data,function(key,item){
                html += "<li><a href='#page-matakuliah' data-idkelas="+item.idkelas+" data-transition='slide'>" +
                            "<h2>"+ item.idkelas +"</h2>" +
                            "<p>"+ konversiJurusan(item.jurusan) +"</p>" +
                            "<span class='ui-li-count'>"+ item.jumlah +"</span>" + 
                        "</a></li>";
            });
            $("#list-kelas").html(html)
                .listview("refresh");
        },"json")
    });
})