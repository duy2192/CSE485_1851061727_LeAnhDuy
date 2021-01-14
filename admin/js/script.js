$(document).ready(function () {
    $('#upload').click(function () {
        //Lấy ra files
        var file_data = $('#image').prop('files')[0];
        //lấy ra kiểu file
        var type = file_data.type;
        //Xét kiểu file được upload
        var match = ["image/jpeg", "image/png", "image/jpg",];
        //kiểm tra kiểu file
        if (type == match[0] || type == match[1] || type == match[2]) {
            //khởi tạo đối tượng form data
            var form_data = new FormData();
            //thêm files vào trong form data
            form_data.append('file', file_data);
            $.ajax({
                url: 'http://localhost/CSE485_1851061727_LeAnhDuy/admin/controller/upload-bg.php', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (res) {
                    if (res.substr(0, 6) == 'images') {
                        $('#home-bg').css("background-image", "url('../" + res + "')");
                    } else {
                        alert(res)
                    }
                    $('#image').val('');
                }
            });
        } else {
            alert('Chỉ được upload file ảnh');
            $('#image').val('');
        }
        return false;
    });
    $('#change').click(function () {
        var form_data = new FormData();
        $.ajax({
            url: 'http://localhost/CSE485_1851061727_LeAnhDuy/admin/controller/change-hometitle.php',
            dataType: 'text',
            data: form_data,
            type: 'post',
            success: function (res) {
                alert(res);
            }
        });
    });

    $('#upavatar').click(function () {
        //Lấy ra files
        var filedata = $('#myavatar').prop('files')[0];
        //lấy ra kiểu file
        var typedata = filedata.type;
        //Xét kiểu file được upload
        var match = ["image/jpeg", "image/png", "image/jpg",];
        //kiểm tra kiểu file
        if (typedata == match[0] || typedata == match[1] || typedata == match[2]) {
            //khởi tạo đối tượng form data
            var form_data = new FormData();
            //thêm files vào trong form data
            form_data.append('file', filedata);
            $.ajax({
                url: 'http://localhost/CSE485_1851061727_LeAnhDuy/admin/controller/upload-avatar.php',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (res) {
                    if (res.substr(0, 6) == 'images') {
                        $('#avatar').attr("src", "../" + res);
                    } else {
                        alert(res)
                    }
                    $('#myavatar').val('');
                }
            });
        } else {
            alert('Chỉ được upload file ảnh');
            $('#myavatar').val('');
        }
        return false;
    });
    // About me-----------------------------------------------------------------------------
    $('#formaboutme').hide();
    $('#formprofile').hide();
    $('#saveaboutme').hide();
    $('#backaboutme').hide();
    $('.loading').hide();
    $('#editaboutme').click(function () {
        $('#formaboutme').show("slow");
        $('#formprofile').show("slow");
        $('#saveaboutme').show("slow");
        $('#editaboutme').hide();
        $('#backaboutme').show();
    })
    $('#saveaboutme').click(function () {

        $.ajax({
            url: 'http://localhost/CSE485_1851061727_LeAnhDuy/admin/controller/edit-aboutme.php',
            dataType: 'text',
            data: {
                name: $('#myname').val(),
                aboutme: $('#aboutme').val(),
                phone: $('#myphone').val(),
                email: $('#myemail').val(),
                address: $('#myaddress').val(),
                language: $('#mylanguage').val()
            },
            type: 'post',
            success: function (res) {
                if (res == '1') {
                    $('#formaboutme').hide("slow");
                    $('#formprofile').hide("slow");
                    $('#saveaboutme').hide("slow");
                    $('#editaboutme').show("slow");
                    $('#backaboutme').hide();
                    $('#txtname').html(''+$('#myname').val()+'');
                    $('#txtabme').html(''+$('#aboutme').val()+'');
                    $('#txtemail').html(''+$('#myemail').val()+'');
                    $('#txtphone').html(''+$('#myphone').val()+'');
                    $('#txtaddress').html(''+$('#myaddress').val()+'');
                    $('#txtlanguage').html(''+$('#mylanguage').val()+'');
                    $('.loading').show();
                    $('.loading').hide(1000);
                }
                else{
                    alert(res);
                }

            }
        })
    });
    $('#backaboutme').click(function(){
        $('#formaboutme').hide("slow");
        $('#formprofile').hide("slow");
        $('#saveaboutme').hide("slow");
        $('#editaboutme').show("slow");
        $('#backaboutme').hide();
    })
    $('.tblservice').hide();
    $('#formaddsv').hide();
    $('#saveservices').hide();
    $('#backservices').hide();
    $('#editservices').click(function(){
        $('.tblservice').toggle(500);
    })  
    $('.editsv').click(function(){
          $(this).addClass('editMode');
        });
    
    $(".editsv").keyup(function(){
          $(this).removeClass("editMode");
          var id = this.id;
          var split_id = id.split("_");
          var field_name = split_id[0];
          var edit_id = split_id[1];
          var value = $(this).text();
          $.ajax({
             url: 'http://localhost/CSE485_1851061727_LeAnhDuy/admin/controller/update-services.php',
             type: 'post',
             data: { field:field_name, value:value, id:edit_id },
             success:function(res){
                if(res=='1'){
                    $("#1"+id+"").html(value);
                }
                else{
                    alert('Error')
                }
             }
           });
        })
    $('#addservices').click(function(){
            $('#formaddsv').show(500);
            $('#saveservices').show();
            $('#addservices').hide();
            $('#backservices').show();


        })
    $('#backservices').click(function(){
            $('#saveservices').hide();
            $('#addservices').show(500);
            $('#backservices').hide();
            $('#formaddsv').hide(500);
        })
    $('#saveservices').click(function(){


        })
        $('.deletesv').click(function(){
            var id = this.id;
            var split_id = id.split("_");
            var del = split_id[1];
            $.ajax({
                url: 'http://localhost/CSE485_1851061727_LeAnhDuy/admin/controller/del-services.php?id='+del+'',
                type: 'get',
                success:function(res){
                    if(confirm('Are you sure?')==true){

                    if(res=='1'){
                        $("tr#rowsv_"+del+"").remove();
                        $("div#sv_"+del+"").remove();

                    }
                    else {
                        alert('Error')
                    }
                }
                    else{
                        return false;
                    }


                }
            })
        })
    
    $('#saveservices').click(function(){
        $.ajax({
            url: 'http://localhost/CSE485_1851061727_LeAnhDuy/admin/controller/add-services.php',
            type: 'post',
            dataType: 'text',
            data:{
                title: $('#title_add').val(),
                content: $('#content_add').val()
            },
            success:function(res){
                if(res=='1'){
                    alert('Saved');
                    $('#title_add').val('');
                    $('#content_add').val('');
                    $('#saveservices').hide();
                    $('#addservices').show(500);
                    $('#backservices').hide();
                    $('#formaddsv').hide(500);
                }
                else if(res=='0'){
                    alert('Error')
                }
                else{
                    alert(res)
                }
            }
        })

    })
})
