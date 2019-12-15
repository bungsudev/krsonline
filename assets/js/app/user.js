var mode = "";
$(document).ready(function(){
    tampilUser();

    $("#reload").click(function(){
        tampilUser();
    });

    $("#tambah").click(function(){
        mode = "add";
        $("form")[0].reset();
        $("#mode").html("Tambah");
        $("span.help-block").remove();
        $(".form-group").removeClass("has-error");
        $("input[name='userid']").removeAttr("readonly");
        $("#form-user").modal("show");
    });

    $("tbody").on("click","#rubah",function(){
        mode = "edit";
        var id = $(this).data("id");

        $("span.help-block").remove();
        $(".form-group").removeClass("has-error");

        $("input[name='userid']").attr("readonly",true);

        bacaUser(id);
    });

    $("tbody").on("click","#hapus",function(){
        var id = $(this).data("id");
        hapusUser(id);
    });

    $("tbody").on("click","#reset",function(){
        var id = $(this).data("id");
        resetUser(id);
    });

    $("#simpan").click(function(){
        simpanUser();
    });
})

function resetUser(id){
    if(confirm("Anda yakin reset ?")){
        $.ajax({
            url: "user/reset/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                if(data.status){
                    tampilUser();
                    showMessage("reset");
                }
            }
        });
    }
}

function showMessage(mode){
    var divMessage = "<div class='alert alert-success'>" +
                            "Berhasil <strong>" + mode.toUpperCase() + "</strong> Data User" +
                        "</div>";
    $(divMessage)
        .prependTo(".container")
        .delay(2000)
        .slideUp("slow");
}

function hapusUser(id){
    if(confirm("Anda yakin hapus ?")){
        $.ajax({
            url: "user/hapus/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                if(data.status){
                    tampilUser();
                    showMessage("delete");
                }
            }
        });
    }
}

function bacaUser(id){
    $("form")[0].reset();

    $.ajax({
        url: "user/baca/"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data){
            $("#userid").val(data.userid);
            $("#nama").val(data.nama);
            $("#alamat").val(data.alamat);            
            $("#telepon").val(data.telepon);
            $("#email").val(data.email);
            $("#status").val(data.status);

            $("#mode").html("Rubah");
            $("#form-user").modal("show");
        }
    })
}

function simpanUser(){
    $.ajax({
        url: "user/simpan/"+mode,
        type: "POST",
        data: $("form").serialize(),
        dataType: "JSON",
        success: function(data){
            if(data.status){
                tampilUser();
                showMessage(mode);
                $("#form-user").modal("hide");
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

function tampilUser(){
    $.ajax({
        type: "ajax",
        url: "user/data",
        dataType: "JSON",
        success: function(data){
            var html = "";
            for(i=0;i < data.length;i++){
                html += "<tr>" + 
                            "<td>"+ data[i].userid +"</td>" + 
                            "<td>"+ data[i].nama +"</td>" + 
                            "<td>"+ data[i].alamat +"</td>" + 
                            "<td>"+ data[i].telepon +"</td>" +
                            "<td>"+ data[i].email +"</td>" +
                            "<td>"+ konversiStatusUser(data[i].status) +"</td>" +
                            "<td><button id='rubah' class='btn btn-warning btn-block' data-id='" + data[i].userid + "'>" +
                                "<span class='glyphicon glyphicon-pencil'></span> Rubah</button>" +
                            "</td>" +
                            "<td><button id='hapus' class='btn btn-danger btn-block' data-id='" + data[i].userid + "'>" +
                                "<span class='glyphicon glyphicon-trash'></span> Hapus</button>" +
                            "</td>" + 
                            "<td><a id='reset' class='btn btn-primary btn-block' data-id='" + data[i].userid + "'>" +
                                "<span class='glyphicon glyphicon-repeat'></span> Reset</button>" +
                            "</td>" + 
                        "</tr>";
            }
            $("tbody").html(html);
        }
    })
}