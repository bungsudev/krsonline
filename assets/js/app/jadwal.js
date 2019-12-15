$(document).ready(function(){
    $("#filter").click(function(){
        var jurusan = $("#jurusan").val();
        var sesi = $("#sesi").val();

        ambilJadwal(jurusan,sesi);
    });

    $("#simpan-mahasiswa").click(function(){
        var mahasiswa = $("#idmahasiswa").val();
        var idkelas = $("#simpan-mahasiswa").data("idkelas");

        simpanKelasMahasiswa(idkelas,mahasiswa);
    })

    $("#simpan-matakuliah").click(function(){
        var matakuliah = $("#idmatakuliah").val();
        var idkelas = $("#simpan-matakuliah").data("idkelas");

        simpanKelasMatakuliah(idkelas,matakuliah);
    })

    $("tbody#tabel-jadwal")
        .on("click","#matakuliah",function(){
            var idkelas = $(this).data("idkelas");

            $("#simpan-matakuliah").data("idkelas",idkelas);

            ambilKelasMatakuliah(idkelas);
            $("#form-kelas-matakuliah").modal("show");
        })
        .on("click","#mahasiswa",function(){
            var idkelas = $(this).data("idkelas");

            $("#simpan-mahasiswa").data("idkelas",idkelas);

            ambilKelasMahasiswa(idkelas);
            $("#form-kelas-mahasiswa").modal("show");
        });

    $("tbody#tabel-mahasiswakelas").on("click","#hapus",function(){
        if(confirm("Anda yakin hapus? ")){
            var idkelas = $(this).data("idkelas");
            var nim = $(this).data("nim");

            hapusKelasMahasiswa(idkelas,nim);
        }
    })

    $("tbody#tabel-matakuliahkelas").on("click","#hapus",function(){
        if(confirm("Anda yakin hapus? ")){
            var idkelas = $(this).data("idkelas");
            var idmatakuliah = $(this).data("idmatakuliah");

            hapusKelasMatakuliah(idkelas,idmatakuliah);
        }
    })
})

function simpanKelasMahasiswa(idkelas,mahasiswa){
    $.ajax({
        url: "jadwal/simpanKelasMahasiswa",
        type: "POST",
        dataType: "JSON",
        data: {
            "mahasiswa": mahasiswa,
            "idkelas": idkelas
        },
        success: function(data){
            if(data.status){
                ambilKelasMahasiswa(idkelas);
            }
        }
    })
}

function simpanKelasMatakuliah(idkelas,matakuliah){
    $.ajax({
        url: "jadwal/simpanKelasMatakuliah",
        type: "POST",
        dataType: "JSON",
        data: {
            "matakuliah": matakuliah,
            "idkelas": idkelas
        },
        success: function(data){
            if(data.status){
                ambilKelasMatakuliah(idkelas);
            }
        }
    })
}

function hapusKelasMahasiswa(idkelas,nim){
    $.ajax({
        url: "jadwal/hapusKelasMahasiswa/"+idkelas+"/"+nim,
        type: "POST",
        dataType: "JSON",
        success: function(data){
            if(data.status){
                ambilKelasMahasiswa(idkelas);
            }
        }
    })
}

function hapusKelasMatakuliah(idkelas,idmatakuliah){
    $.ajax({
        url: "jadwal/hapusKelasMatakuliah/"+idkelas+"/"+idmatakuliah,
        type: "POST",
        dataType: "JSON",
        success: function(data){
            if(data.status){
                ambilKelasMatakuliah(idkelas);
            }
        }
    })
}

function ambilKelasMahasiswa(idkelas){
    $.ajax({
        url: "jadwal/kelasmahasiswa/"+idkelas,
        type: "POST",
        dataType: "JSON",
        success: function(data){
            var html = "";
            $.each(data,function(key,item){
                html += "<tr>" + 
                            "<td>"+item.idkelas+"</td>" + 
                            "<td>"+item.nama+"</td>" + 
                            "<td><button data-idkelas='"+item.idkelas+"' " +
                            " data-nim='"+item.nim+"' id='hapus' class='btn btn-danger btn-block'>" + 
                                "<span class='glyphicon glyphicon-trash'></span> Hapus</button></td>" +
                        "</tr>";
            });
            $("tbody#tabel-mahasiswakelas").html(html);
        }
    })
}

function ambilKelasMatakuliah(idkelas){
    $.ajax({
        url: "jadwal/kelasmatakuliah/"+idkelas,
        type: "POST",
        dataType: "JSON",
        success: function(data){
            var html = "";
            $.each(data,function(key,item){
                html += "<tr>" + 
                            "<td>"+item.idkelas+"</td>" + 
                            "<td>"+item.nama+"</td>" + 
                            "<td><button data-idkelas='"+item.idkelas+"' " +
                            " data-idmatakuliah='"+item.idmatakuliah+"' id='hapus' class='btn btn-danger btn-block'>" + 
                                "<span class='glyphicon glyphicon-trash'></span> Hapus</button></td>" +
                        "</tr>";
            });
            $("tbody#tabel-matakuliahkelas").html(html);
        }
    })
}

function ambilJadwal(jurusan,sesi){
    $.ajax({
        url: "jadwal/ambiljadwal/"+jurusan+"/"+sesi,
        type: "POST",
        dataType: "JSON",
        success: function(data){
            var html = "";
            for(i=0;i<data.length;i++){
                html += "<tr>"+
                            "<td>"+data[i].idkelas+"</td>" +
                            "<td>"+konversiSemester(data[i].semester)+"</td>" + 
                            "<td>"+konversiJurusan(data[i].jurusan)+"</td>" +
                            "<td>"+konversiSesi(data[i].sesi)+"</td>" +
                            "<td class='jsiswa'>"+data[i].jumlah+"</td>"+
                            "<td>" +
                                "<button data-idkelas='"+data[i].idkelas+"' id='matakuliah' class='btn btn-primary btn-block'>" +
                                    "Mata Kuliah</button>" + 
                            "</td>" +
                            "<td>" +
                                "<button data-idkelas='"+data[i].idkelas+"' id='mahasiswa' class='btn btn-warning btn-block'>"+
                                    "Mahasiswa</button>" +
                            "</td>"+
                        "</tr>";
            }
            $("tbody#tabel-jadwal").html(html);
        }
    });
}