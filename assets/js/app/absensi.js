$(document).ready(function(){
    ambilMatakuliah($("#kelas").val());

    $("#kelas").change(function(){
        ambilMatakuliah($(this).val());
    })

    $("#submit").click(function(){
        var idkelas = $("#kelas").val();
        var idmatakuliah = $("#matakuliah").val();

        ambilAbsensi(idkelas,idmatakuliah);
    })

    $("tbody#absensi").on("click","#lihat",function(){
        var idkelas = $(this).data("idkelas");
        var idmatakuliah = $(this).data("idmatakuliah");
        var pertemuan = $(this).data("pertemuan");

        ambilAbsensidetail(idkelas,idmatakuliah,pertemuan);
        $("#form-absensidtl").modal("show");
    })

    $("#simpan").click(function(){
        //buat object beri nama data
        var data = {};        
        // ambil semua nilai select dengan nama status
        $("select[name='status']").map(function(){    
            //ambil nilai satus masukin ke object data dengan index idabsensi                    
            data[$(this).data("idabsensi")] = $(this).val();
        })

        //panggil fungsi simpan absensi
        updateabsensi(data);
    })
})

function updateabsensi(data){
    $.ajax({
        url: "absensi/update",
        type: "POST",
        dataType:"JSON",
        data: {
            data: data 
        },
        success: function(data){            
            //jika proses simpan absensi berhasil.. tutup modal
            $("#form-absensidtl").modal("hide");
        }
    })
}

function ambilAbsensidetail(idkelas,idmatakuliah,pertemuan){
    $.ajax({
        url: "absensi/getdetail/" + idkelas + "/" + idmatakuliah + "/" + pertemuan,
        type: "POST",
        dataType: "JSON",
        success: function(data){
            var html = "";
            $.each(data,function(key,item){
                html += "<tr>" + 
                            "<td>"+item.nim+"</td>" + 
                            "<td>"+item.nama+"</td>" + 
                            "<td>" + 
                                "<select name='status' data-idabsensi='"+item.idabsensi+"' " +
                                    "id='' class='form-control'>" + 
                                    "<option value='h' "+ (item.status== "h"?"selected":"") +">Hadir</option>" +
                                    "<option value='a' "+ (item.status== "a"?"selected":"") +">Absen</option>" + 
                                    "<option value='i' "+ (item.status== "i"?"selected":"") +">Izin</option>" + 
                                    "<option value='s' "+ (item.status== "s"?"selected":"") +">Sakit</option>" + 
                                "</select>" + 
                            "</td>" + 
                        "</tr>";
            });
            $("tbody#absensidetail").html(html);
        }
    })
}

function ambilAbsensi(idkelas,idmatakuliah){
    $.ajax({
        url: "absensi/get/" + idkelas + "/" + idmatakuliah,
        type: "POST",
        dataType: "JSON",
        success: function(data){
            var html = "";
            $.each(data,function(key,item){
                html += "<tr> " + 
                    "<td>"+ item.pertemuan +"</td>" + 
                    "<td>"+ item.hadir + "</td>" + 
                    "<td>"+ item.absen +"</td>" + 
                    "<td>"+ item.izin +"</td>" + 
                    "<td>"+ item.sakit +"</td>" + 
                    "<td>"+ item.total +"</td>" + 
                    "<td><button id='lihat' class='btn btn-warning btn-block' " + 
                        "data-idkelas='"+ idkelas + "' " + 
                        "data-idmatakuliah='" + idmatakuliah + "' " +
                        "data-pertemuan='"+ item.pertemuan +"'> " + 
                    "<span class='glyphicon glyphicon-eye-open'></span> Lihat</button></td>" + 
                "</tr>";
            });
            $("tbody#absensi").html(html);
        }
    });
}

function ambilMatakuliah(idkelas){
    $.ajax({
        url: "absensi/matakuliah/"+idkelas,
        type: "POST",
        dataType: "JSON",
        success: function(data){
            if(data){
                var html="";
                $.each(data,function(key,item){
                    html += "<option value='" + item.idmatakuliah + "'>" + 
                                item.nama + "</option>";
                })
                $("#matakuliah").html(html);
            }
        }
    })
}
