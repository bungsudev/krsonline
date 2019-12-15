var mode = "";
$(document).ready(function(){
    tampilMatakuliah();

    $("#reload").click(function(){
        tampilMatakuliah();
    });

    $("#tambah").click(function(){
        mode = "add";
        $("form")[0].reset();
        $("#mode").html("Tambah");
        $("span.help-block").remove();
        $(".form-group").removeClass("has-error");
        $("input[name='idmatakuliah']").removeAttr("readonly");
        $("#form-matakuliah").modal("show");
    });

    $("tbody").on("click","#rubah",function(){
        mode = "edit";
        var id = $(this).data("id");

        $("span.help-block").remove();
        $(".form-group").removeClass("has-error");

        $("input[name='idmatakuliah']").attr("readonly",true);

        bacaMatakuliah(id);
    });

    $("tbody").on("click","#hapus",function(){
        var id = $(this).data("id");
        hapusMatakuliah(id);
    });

    $("#simpan").click(function(){
        simpanMatakuliah();
    });
})

function showMessage(mode){
    var divMessage = "<div class='alert alert-success'>" +
                            "Berhasil <strong>" + mode.toUpperCase() + "</strong> Data Matakuliah" +
                        "</div>";
    $(divMessage)
        .prependTo(".container")
        .delay(2000)
        .slideUp("slow");
}

function hapusMatakuliah(id){
    if(confirm("Anda yakin hapus ?")){
        $.ajax({
            url: "matakuliah/hapus/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                if(data.status){
                    tampilMatakuliah();
                    showMessage("delete");
                }
            }
        });
    }
}

function bacaMatakuliah(id){
    $("form")[0].reset();

    $.ajax({
        url: "matakuliah/baca/"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data){
            $("#idmatakuliah").val(data.idmatakuliah);
            $("#namamk").val(data.namamk);      
            $("#sks").val(data.sks); 
            $("#semester").val(data.semester);

            $("#mode").html("Rubah");
            $("#form-matakuliah").modal("show");
        }
    })
}

function simpanMatakuliah(){
    $.ajax({
        url: "matakuliah/simpan/"+mode,
        type: "POST",
        data: $("form").serialize(),
        dataType: "JSON",
        success: function(data){
            if(data.status){
                tampilMatakuliah();
                showMessage(mode);
                $("#form-matakuliah").modal("hide");
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

function tampilMatakuliah(){
    $.ajax({
        type: "ajax",
        url: "matakuliah/data",
        dataType: "JSON",
        success: function(data){
            var html = "";
            for(i=0;i < data.length;i++){
                html += "<tr>" + 
                            "<td>"+ data[i].idmatakuliah +"</td>" + 
                            "<td>"+ data[i].namamk +"</td>" +
                            "<td>"+ data[i].sks +"</td>" + 
                            "<td>"+ konversiSemester(data[i].semester) +"</td>" +                             
                            "<td><button id='rubah' class='btn btn-warning btn-block' data-id='" + data[i].idmatakuliah + "'>" +
                                "<span class='glyphicon glyphicon-pencil'></span> Rubah</button>" +
                            "</td>" +
                            "<td><button id='hapus' class='btn btn-danger btn-block' data-id='" + data[i].idmatakuliah + "'>" +
                                "<span class='glyphicon glyphicon-trash'></span> Hapus</button>" +
                            "</td>" + 
                        "</tr>";
            }
            $("tbody").html(html);
        }
    })
}