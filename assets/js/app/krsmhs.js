$(document).ready(function(){
    $("#filter").click(function(){
        var prodi = $("#prodi").val();
        var kelas = $("#kelas").val();
        var semester = $("#semester").val();

        tampilkrsmhs(prodi,kelas,semester);
    });
 

    $("tbody").on("click","#lihat",function(){
        var nim = $(this).data("nim");
        var nama = $(this).data("nama");
        var dpa = $(this).data("dpa");
        var komentar = $(this).data("komentar");
        // var jumlah = $(this).data("jumlah");

        $("#dpatampil").text(dpa);
        $("#nimtampil").text(nim);
        $("#namatampil").text(nama);
        $("#komentardtl").text(komentar);
        hitungsks(nim);

        // $("#skstotal").text(jumlah);
        tampilkrsmhsdetil(nim);
        $("#form-lihatmb").modal("show");
    });

    $("tbody#krsmhsdtl").on("click","#hapus",function(){
        if(confirm("Anda yakin hapus? ")){
            var idkrsmhsdtl = $(this).data("idkrsmhsdtl");
            var nim = $(this).data("nim");
            hapuskrsdtl(idkrsmhsdtl);
            
            console.log("luar",nim);
            tampilkrsmhsdetil(nim);
        }
    });

    $("tbody#krsmhs").on("click","#hapus",function(){
        if(confirm("Anda yakin hapus? ")){
            var nim = $(this).data("nim");
            var prodi = $("#prodi").val();
            var kelas = $("#kelas").val();
            var semester = $("#semester").val();

            hapuskrsmhs(nim);
            hapuskrsmhsdtl(nim);
            console.log(prodi,kelas,semester);
            tampilkrsmhs(prodi,kelas,semester);
        }
    });

})



function hitungsks(nim){
    $.ajax({
        url: "krsmhs/hitungsks/"+nim,
        type: "POST",
        dataType: "JSON",
        success: function(data){
            var total ="";
            var sisa = "";
            $.each(data,function(key,item){
               
                total=item.jumlah;
                sisa = 21 - total;
            });
            $("#skstotal").text(total);
            $("#skssisa").text(sisa);
        }
    })
}

function showMessage(){
    var divMessage = "<div class='alert alert-success'>" +
                            "Berhasil <strong> Delete </strong> Data KRS Mahasiswa" +
                        "</div>";
    $(divMessage)
        .prependTo(".container")
        .delay(2000)
        .slideUp("slow");
}


function hapuskrsmhsdtl(nim){
        $.ajax({
            url: "krsmhs/hapusdtl/"+nim,
            type: "POST",
            dataType: "JSON",
            success: function(data){

            }
        });
}

function hapuskrsmhs(nim){
        $.ajax({
            url: "krsmhs/hapus/"+nim,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                    showMessage();
                   
            }
        });
}

function hapuskrsdtl(idkrsmhsdtl){
    $.ajax({
        url: "krsmhs/hapusdetail/"+idkrsmhsdtl,
        type: "POST",
        dataType: "JSON",
        success: function(data){         
        }
    });
}





function tampilkrsmhs(prodi,kelas,semester){
    $.ajax({
        url: "krsmhs/ambilkrsmhs/"+prodi+"/"+kelas+"/"+semester,
        type: "POST",
        dataType: "JSON",
        success: function(data){
            var html = "";
            for(i=0;i<data.length;i++){
                html += "<tr>" +
                            "<td>"+ data[i].nim +"</td>" +
                            "<td>"+ data[i].nama +"</td>" +
                            " <td>"+ data[i].kelas +"</td> " +
                            "<td align='center'>"+ konversiSemester(data[i].semester) +"</td>" +
                            konversiStatusKrs(data[i].status) +
                            "<td style='width:100px;'>" +
                                "<button data-komentar='"+ data[i].komentar +"' data-jumlah='"+ data[i].jumlah +"' data-nim='"+ data[i].nim +"' data-nama='"+ data[i].nama +"' data-dpa='"+ data[i].dpa +"' id='lihat' class='btn btn-info btn-block' >Lihat " +
                                        "<span class='glyphicon glyphicon-eye-open'></span>" +
                                "</button>" +
                            "</td>" +
                            "<td style='width:100px;'>" +
                                    "<button id='hapus' data-nim='"+ data[i].nim +"' class='btn btn-danger btn-block'>Hapus" +
                                            "<span class='glyphicon glyphicon-trash'></span>" +
                                    "</button>" +
                            "</td>" +
                        "</tr>";
            }
            $("tbody#krsmhs").html(html);
        }
    })
}

function tampilkrsmhsdetil(nim){
    $.ajax({
        url: "krsmhs/ambilkrsmhsdtl/"+nim,
        type: "POST",
        dataType: "JSON",
        success: function(data){
            var html = "";
            $.each(data,function(key,item){
                html += "<tr>" +
                            "<td>"+ item.idkrsmhsdtl +"</td>" +
                            "<td>"+ item.idmatakuliah +"</td>" +
                            "<td>"+ item.namamk +"</td>" +
                            "<td>"+ item.sks +"</td>" +
                            "<td align='center'>"+ konversiSemester(item.semester) +"</td>" +
                            "<td>" +
                                    "<button id='hapus'  data-idkrsmhsdtl='"+ item.idkrsmhsdtl +"' data-nim='"+ item.nim +"' class='btn btn-danger btn-block'>Hapus" +
                                            "<span class='glyphicon glyphicon-trash'></span>" +
                                    "</button>" +
                            "</td>" +
                        "</tr>";
                    });
            $("tbody#krsmhsdtl").html(html);
        }
    })
}
