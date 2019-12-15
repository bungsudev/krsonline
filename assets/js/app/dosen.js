var mode = "";
$(document).ready(function(){
    tampilDosen();

    $("#reload").click(function(){
        tampilDosen();
    });

    $("#tambah").click(function(){
        mode = "add";
        $("form")[0].reset();
        $("#mode").html("Tambah");
        $("span.help-block").remove();
        $(".form-group").removeClass("has-error");
        $("input[name='iddosen']").removeAttr("readonly");
        $("#form-dosen").modal("show");
    });

    $("tbody").on("click","#rubah",function(){
        mode = "edit";
        var id = $(this).data("id");

        $("span.help-block").remove();
        $(".form-group").removeClass("has-error");

        $("input[name='iddosen']").attr("readonly",true);

        bacaDosen(id);
    });

    $("tbody").on("click","#hapus",function(){
        var id = $(this).data("id");
        hapusDosen(id);
    });

    $("#simpan").click(function(){
        simpanDosen();
    });
})

function showMessage(mode){
    var divMessage = "<div class='alert alert-success'>" +
                            "Berhasil <strong>" + mode.toUpperCase() + "</strong> Data Dosen" +
                        "</div>";
    $(divMessage)
        .prependTo(".container")
        .delay(2000)
        .slideUp("slow");
}

function hapusDosen(id){
    if(confirm("Anda yakin hapus ?")){
        $.ajax({
            url: "dosen/hapus/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                if(data.status){
                    tampilDosen();
                    showMessage("delete");
                }
            }
        });
    }
}

function bacaDosen(id){
    $("form")[0].reset();

    $.ajax({
        url: "dosen/baca/"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data){
            $("#iddosen").val(data.iddosen);
            $("#nama").val(data.nama);
            $("#alamat").val(data.alamat);
            $("#telepon").val(data.telepon);
            $("#email").val(data.email);

            $("#mode").html("Rubah");
            $("#form-dosen").modal("show");
        }
    })
}

function simpanDosen(){
    $.ajax({
        url: "dosen/simpan/"+mode,
        type: "POST",
        data: $("form").serialize(),
        dataType: "JSON",
        success: function(data){
            if(data.status){
                tampilDosen();
                showMessage(mode);
                $("#form-dosen").modal("hide");
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

function tampilDosen(){
    $.ajax({
        type: "ajax",
        url: "dosen/data",
        dataType: "JSON",
        success: function(data){
            var html = "";
            for(i=0;i < data.length;i++){
                html += "<tr>" + 
                            "<td>"+ data[i].iddosen +"</td>" + 
                            "<td>"+ data[i].nama +"</td>" + 
                            "<td>"+ data[i].alamat +"</td>" + 
                            "<td>"+ data[i].telepon +"</td>" +
                            "<td>"+ data[i].email +"</td>" +
                            "<td><button id='rubah' class='btn btn-warning btn-block' data-id='" + data[i].iddosen + "'>" +
                                "<span class='glyphicon glyphicon-pencil'></span> Rubah</button>" +
                            "</td>" +
                            "<td><button id='hapus' class='btn btn-danger btn-block' data-id='" + data[i].iddosen + "'>" +
                                "<span class='glyphicon glyphicon-trash'></span> Hapus</button>" +
                            "</td>" + 
                        "</tr>";
            }
            $("tbody").html(html);
        }
    })
}