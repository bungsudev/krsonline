var mode = "";
$(document).ready(function(){
    tampilKelas();

    $("#reload").click(function(){
        tampilKelas();
    });

    $("#tambah").click(function(){
        mode = "add";
        $("form")[0].reset();
        $("#mode").html("Tambah");
        $("span.help-block").remove();
        $(".form-group").removeClass("has-error");
        $("input[name='idkelas']").removeAttr("readonly");
        $("#form-kelas").modal("show");
    });

    $("tbody").on("click","#rubah",function(){
        mode = "edit";
        var id = $(this).data("id");

        $("span.help-block").remove();
        $(".form-group").removeClass("has-error");

        $("input[name='idkelas']").attr("readonly",true);

        bacaKelas(id);
    });

    $("tbody").on("click","#hapus",function(){
        var id = $(this).data("id");
        hapusKelas(id);
    });

    $("#simpan").click(function(){
        simpanKelas();
    });
})

function showMessage(mode){
    var divMessage = "<div class='alert alert-success'>" +
                            "Berhasil <strong>" + mode.toUpperCase() + "</strong> Data Kelas" +
                        "</div>";
    $(divMessage)
        .prependTo(".container")
        .delay(2000)
        .slideUp("slow");
}

function hapusKelas(id){
    if(confirm("Anda yakin hapus ?")){
        $.ajax({
            url: "kelas/hapus/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                if(data.status){
                    tampilKelas();
                    showMessage("delete");
                }
            }
        });
    }
}

function bacaKelas(id){
    $("form")[0].reset();

    $.ajax({
        url: "kelas/baca/"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data){
            $("#idkelas").val(data.idkelas);
            $("#semester").val(data.semester);
            $("#jurusan").val(data.jurusan);
            $("#sesi").val(data.sesi);

            $("#mode").html("Rubah");
            $("#form-kelas").modal("show");
        }
    })
}

function simpanKelas(){
    $.ajax({
        url: "kelas/simpan/"+mode,
        type: "POST",
        data: $("form").serialize(),
        dataType: "JSON",
        success: function(data){
            if(data.status){
                tampilKelas();
                showMessage(mode);
                $("#form-kelas").modal("hide");
            }else{
                $("span.help-block").remove();
                $(".form-group").removeClass("has-error");

                $.each(data.message,function(index,value){
                    if(value){
                        $("input[name="+index+"]")
                            .after(value)
                            .parent()
                            .addClass("has-error");
                    }
                });
            }
        }
    })
}

function tampilKelas(){
    $.ajax({
        type: "ajax",
        url: "kelas/data",
        dataType: "JSON",
        success: function(data){
            var html = "";
            for(i=0;i < data.length;i++){
                html += "<tr>" + 
                            "<td>"+ data[i].idkelas +"</td>" + 
                            "<td>"+ konversiSemester(data[i].semester) +"</td>" + 
                            "<td>"+ konversiJurusan(data[i].jurusan) +"</td>" + 
                            "<td>"+ konversiSesi(data[i].sesi) +"</td>" +
                            "<td><button id='rubah' class='btn btn-warning btn-block' data-id='" + data[i].idkelas + "'>" +
                                "<span class='glyphicon glyphicon-pencil'></span> Rubah</button>" +
                            "</td>" +
                            "<td><button id='hapus' class='btn btn-danger btn-block' data-id='" + data[i].idkelas + "'>" +
                                "<span class='glyphicon glyphicon-trash'></span> Hapus</button>" +
                            "</td>" + 
                        "</tr>";
            }
            $("tbody").html(html);
        }
    })
}