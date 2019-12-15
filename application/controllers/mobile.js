$(document).on("mobileinit",function(){
    var idkelas = "";
    var idmatakuliah = "";
    var pertemuan = "";

    $("#page-kelas").on("pageshow",function(){
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
    })

    $("#page-kelas").on("click",
        "a[href='#page-matakuliah']",function(){
        idkelas = $(this).data("idkelas");
    });

    $("#page-matakuliah")
        .on("click",
            "a[href='#page-pertemuan']",function(){
        idmatakuliah = $(this).data("idmatakuliah");
    })

    $("a[href='#page-absensi']").click(function(){
        pertemuan = $(this).data("pertemuan");
    });

    $("#page-matakuliah").on("pageshow",function(){
        $.post("mobile/page/ambilmatakuliah",
            {idkelas: idkelas},function(data){
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

    $("#page-pertemuan").on("pageshow",function(){
        //console.log("show page pertemuan");
    })

    $("#page-absensi").on("pageshow",function(){
        $.post("mobile/page/ambilmahasiswa",
            {idkelas: idkelas},function(data){
                var html = "";
                html += "<input type='hidden' name='idkelas' value='"+ idkelas +"' />";
                html += "<input type='hidden' name='idmatakuliah' value='"+ idmatakuliah +"' />";
                html += "<input type='hidden' name='pertemuan' value='"+ pertemuan +"' />";
                $.each(data,function(index,item){
                    html += "<li>" +
                                "<img src='assets/img/admin.png' alt=''> " +
                                "<h2>"+ item.nama +"</h2>" + 
                                "<p>"+ item.nim +"</p>" + 
                                "<fieldset data-role='controlgroup' data-type='horizontal'>" + 
                                    "<label for='hadir["+ item.nim +"]'>H</label>" + 
                                    "<input type='radio' name='status["+ item.nim +"]' id='hadir["+ item.nim +"]' value='h'>" + 
                                    "<label for='absen["+ item.nim +"]'>A</label>" +
                                    "<input type='radio' name='status["+ item.nim +"]' id='absen["+ item.nim +"]' value='a'>" +
                                    "<label for='izin["+ item.nim +"]'>I</label>" +
                                    "<input type='radio' name='status["+ item.nim +"]' id='izin["+ item.nim +"]' value='i'>" +
                                    "<label for='sakit["+ item.nim +"]'>S</label>" +
                                    "<input type='radio' name='status["+ item.nim +"]' id='sakit["+ item.nim +"]' value='s'>" +
                                "</fieldset>" +
                            "</li>";
                });
                html += "<li><input type='submit' value='Submit'></li>";
                $("#list-absensi")
                    .html(html)
                    .listview("refresh")
                    .enhanceWithin();
        },"json");
    })

    $("form").submit(function(event){
        event.preventDefault();
        $.post("mobile/page/simpanabsensi",
                $(this).serialize(),function(data){
            if(data.status){
                $(location).attr("href","mobile/page#page-kelas")
            }
        },"json");
    })
})