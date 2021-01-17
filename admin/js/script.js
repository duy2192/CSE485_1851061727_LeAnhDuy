$(document).ready(function () {
    // Upload backgound----------------------------------------------------------------------------------------------------------------------
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


    // upload avatar---------------------------------------------------------------------------------------------------------------------


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

    // About me-----------------------------------------------------------------------------------------------------------------------------


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
                    $('#txtname').html('' + $('#myname').val() + '');
                    $('#txtabme').html('' + $('#aboutme').val() + '');
                    $('#txtemail').html('' + $('#myemail').val() + '');
                    $('#txtphone').html('' + $('#myphone').val() + '');
                    $('#txtaddress').html('' + $('#myaddress').val() + '');
                    $('#txtlanguage').html('' + $('#mylanguage').val() + '');
                    $('.loading').show();
                    $('.loading').hide(1000);
                }
                else {
                    alert(res);
                }

            }
        })
    });
    $('#backaboutme').click(function () {
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

    $('#editservices').click(function () {
        $('.tblservice').toggle(500);
    })
    $('.editsv').click(function () {
        $(this).addClass('editMode');
    });

    $(".editsv").keyup(function () {
        $(this).removeClass("editMode");
        var id = this.id;
        var split_id = id.split("_");
        var field_name = split_id[0];
        var edit_id = split_id[1];
        var value = $(this).text();
        $.ajax({
            url: 'http://localhost/CSE485_1851061727_LeAnhDuy/admin/controller/edit-services.php',
            type: 'post',
            data: { field: field_name, value: value, id: edit_id },
            success: function (res) {
                if (res == '1') {
                    $("#1" + id + "").html(value);
                }
                else {
                    alert('Error')
                }
            }
        });
    })
    $('#addservices').click(function () {
        $('#formaddsv').show(500);
        $('#saveservices').show();
        $('#addservices').hide();
        $('#backservices').show();


    })
    $('#backservices').click(function () {
        $('#saveservices').hide();
        $('#addservices').show(500);
        $('#backservices').hide();
        $('#formaddsv').hide(500);
    })

    $('#saveservices').click(function () {
        $.ajax({
            url: 'http://localhost/CSE485_1851061727_LeAnhDuy/admin/controller/add-services.php',
            type: 'post',
            dataType: 'text',
            data: {
                title: $('#title_add').val(),
                content: $('#content_add').val()
            },
            success: function (res) {
                if (res == '0') {
                    alert('Error')
                }
                else if (res == '2') {
                    alert("Please enter your information!")
                }
                else {
                    alert('Saved');
                    $('#services').before(" <div class=' col-md-6 ' id='sv_" + res + "'><div class='services-list'><div class='service-block'><div class='service-icon'><i class='lnr lnr-code'></i></div><div class='service-text'><h4 id='1title_" + res + "'>" + $('#title_add').val() + "</h4><p id='1content_" + res + "'>" + $('#content_add').val() + "</p></div></div></div></div> ")
                    $('#tblsv').append(" <tr id='rowsv_" + res + "'><td scope='row'><div contentEditable='true' class='editsv' id='title_" + res + "'>" + $('#title_add').val() + " </div></td><td><div contenteditable='true' class='editsv' id='content_" + res + "'> " + $('#content_add').val() + " </div></td><td class='text-center'><i class='fas fa-trash-alt deletesv' id='delete_" + res + "'></i></td></tr> ")
                    $('#title_add').val('');
                    $('#content_add').val('');
                    $('#saveservices').hide();
                    $('#addservices').show(500);
                    $('#backservices').hide();
                    $('#formaddsv').hide(500);

                }
            }
        })

    })

    $('.deletesv').click(function () {
        if (confirm('Are you sure?') == true) {
            var id = this.id;
            var split_id = id.split("_");
            var del = split_id[1];
            $.ajax({
                url: 'http://localhost/CSE485_1851061727_LeAnhDuy/admin/controller/del-services.php?id=' + del + '',
                type: 'get',
                success: function (res) {
                    if (res == '1') {
                        $("tr#rowsv_" + del + "").remove();
                        $("div#sv_" + del + "").remove();

                    }
                    else {
                        alert('Error')
                    }
                }
            })
        }
        else {
            return false;
        }
    })



    // Resume---------------------------------------------------------------------------------------------------------------------------------------------------

    $('#formaddedu').hide()
    $('#saveedu').hide()
    $('#backedu').hide()
    $('.tbledu').hide()
    $('#addedu').click(function () {
        $('#addedu').hide();
        $('#formaddedu').show(500);
        $('#saveedu').show(500);
        $('#backedu').show(500);
        $('#editedu').hide();
        $('.tbledu').hide()


    })
    $('#backedu').click(function () {
        $('#editedu').show();
        $('#addedu').show();
        $('#formaddedu').hide(500);
        $('#saveedu').hide(500);
        $('#backedu').hide(500);
    })

    $('#editedu').click(function () {
        $('.tbledu').toggle(500)
        $('#addedu').toggle()

    });

    $('#saveedu').click(function () {
        $.ajax({

            url: 'http://localhost/CSE485_1851061727_LeAnhDuy/admin/controller/add-education.php',
            dataType: 'text',
            type: 'post',
            data: {
                title: $('#title_edu').val(),
                content: $('#content_edu').val(),
                time: $('#time_edu').val()
            },
            success: function (res) {
                if (res == '0') {

                }
                else if (res == '2') {
                    alert('Please enter your information!')
                }
                else {
                    $('#editedu').show();
                    $('#addedu').show();
                    $('#formaddedu').hide(500);
                    $('#saveedu').hide(500);
                    $('#backedu').hide(500);
                    alert('Success');
                    $('.main-timeline').append(" <div class='timeline currecnt'><div class='timeline-icon'><img src='images/resume/1.png' alt=''></div><div class='timeline-content'><span class='date'>" + $('#title_edu').val() + "</span><h5 class='title'>" + $('#content_edu').val() + "</h5><p class='description'>" + $('#time_edu').val() + "</p></div></div>  ")
                    $('#tbleditedu').append("<tr id='rowedu_" + res + "'><td><div contentEditable='true' class='editedu' id='title_" + res + "'> " + $('#title_edu').val() + " </div></td><td><div contenteditable='true' class='editedu' id='content_" + res + "'> " + $('#content_edu').val() + " </div></td><td><div contenteditable='true' class='editedu' id='time_" + res + "'> " + $('#time_edu').val() + " </div></td><td class='text-center'><i class='fas fa-trash-alt deleteedu' id='deleteedu_<?php echo $row[0] ?>'></i></td></tr> ")
                    $('#title_edu').val('')
                    $('#content_edu').val('')
                    $('#time_edu').val('')
                }
            }
        })
    })

    $('.deleteedu').click(function () {
        if (confirm('Are you sure?') == true) {
            var id = this.id;
            var split_id = id.split("_");
            var del = split_id[1];
            $.ajax({
                url: 'http://localhost/CSE485_1851061727_LeAnhDuy/admin/controller/del-education.php?id=' + del + '',
                type: 'get',
                success: function (res) {
                    if (res == '1') {
                        $("tr#rowedu_" + del + "").remove();
                        $("div#edu_" + del + "").remove();
                    }
                    else {
                        alert('Error')
                    }
                }
            })
        }
        else {
            return false;
        }
    })

    $('.editedu').click(function () {
        $(this).addClass('editMode');
    });

    $(".editedu").keyup(function () {
        $(this).removeClass("editMode");
        var id = this.id;
        var split_id = id.split("_");
        var field_name = split_id[0];
        var edit_id = split_id[1];
        var value = $(this).text();
        $.ajax({
            url: 'http://localhost/CSE485_1851061727_LeAnhDuy/admin/controller/edit-education.php',
            type: 'post',
            data: { field: field_name, value: value, id: edit_id },
            success: function (res) {
                if (res == '1') {
                    $("#sk" + id + "").html(value);
                }
                else {
                    alert('Error')
                }
            }
        });
    })


    $('#formaddskill').hide()
    $('#saveskill').hide()
    $('#backskill').hide()
    $('.tblskill').hide()

    $('#addskill').click(function () {
        $('#formaddskill').show(500)
        $('#saveskill').show()
        $('#backskill').show()
        $('#editskill').hide()
        $('#addskill').hide()
    })

    $('#backskill').click(function () {
        $('#formaddskill').hide(500)
        $('#saveskill').hide()
        $('#backskill').hide()
        $('#editskill').show()
        $('#addskill').show()

    })

    $('#saveskill').click(function () {
      
            $.ajax({
            url: 'http://localhost/CSE485_1851061727_LeAnhDuy/admin/controller/add-skills.php',
            type: 'post',
            data:{
                name: $('#name_skill').val(),
                ratio: $('#ratio').val()
            },
            success: function(res){
                if(res=='0'){
                    alert('Error!')
                }
                else if(res=='2'){
                    alert('Please enter your information!')
                }
                else{
                    $('#formaddskill').hide(500)
                    $('#saveskill').hide()
                    $('#backskill').hide()
                    $('#editskill').show()
                    $('#addskill').show()
                    alert('Success!')
                    $('.skills-items').append(" <div class='skill-item'><h4>"+$('#name_skill').val()+"</h4><div class='progress'><div class='progress-bar wow fadeInLeft' data-progress='95%' style='width: "+$('#ratio').val()+"%' data-wow-duration='1.5s' data-wow-delay='1.2s'> </div></div><span>"+$('#ratio').val()+"%</span></div> ")
                    $('#tbleditskill').append(" <tr id='rowski_<?php echo $row[0] ?>'><td scope='row'><div contentEditable='true' class='editskill' id='name_"+res+"'> "+$('#name_skill').val()+" </div></td><td><div contenteditable='true' class='editskill' id='skill_"+res+"'> "+$('#ratio').val()+" </div></td></tr> ")
                    $('#name_skill').val('')
                    $('#ratio').val('')
                }
               
            }
            })
        

    })

    $('#editskill').click(function () {
        $('#formaddskill').hide()
        $('#saveskill').hide()
        $('#backskill').hide()
        $('#addskill').toggle()
        $('.tblskill').toggle(500)
    })


    $('.ceditskill').click(function () {
        $(this).addClass('editMode');
    });

    $(".ceditskill").keyup(function () {
        $(this).removeClass("editMode");
        var id = this.id;
        var split_id = id.split("_");
        var field_name = split_id[0];
        var edit_id = split_id[1];
        var value = $(this).text();
        $.ajax({
            url: 'http://localhost/CSE485_1851061727_LeAnhDuy/admin/controller/edit-skills.php',
            type: 'post',
            data: { field: field_name, value: value, id: edit_id },
            success: function (res) {
                if (res == '1') {
                    $("#skn" + id + "").html(value);
                    $("#skr" + id + "").html(value+"%");
                    $("#ra" + id + "").css("width",value+"%")
                }
                else {
                    alert('Error')
                }
            }
        });
    })

    $('.deleteskill').click(function(){
        var id = this.id;
        var delid = id.split("_")[1];
        $.ajax({
            url: "http://localhost/CSE485_1851061727_LeAnhDuy/admin/controller/delete-skills.php?id="+delid+"",
            type: 'get',
            success: function (res) {
                if (res == '1') {
                    $('.skilli_'+delid+'').remove()
                    $("#rowski_" + delid + "").remove()
                }
                else {
                    alert('Error')
                }
            }
        });
    })

    $('.formaddpro').hide()
     $('#addproject').click(function(){
        $('.formaddpro').show(500)
        $('#addproject').hide()
     })

     $('#backproject').click(function(){
        $('.formaddpro').hide(500)
        $('#addproject').show()
     })

     $('#saveproject').click(function(){
         if($('#title_pro').val()==''||$('#content_pro').val()=='' ){
             alert('Please enter your information!')
             return false
         }
         else {
        //Lấy ra files
        var filedata = $('#imageproject').prop('files')[0];
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
                url: 'http://localhost/CSE485_1851061727_LeAnhDuy/admin/controller/add-projects_image.php',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (res) {
                    if(res=='Error!'){
                        alert(res)
                    }
                    else{
                        $.ajax({
                            url: 'http://localhost/CSE485_1851061727_LeAnhDuy/admin/controller/add-projects.php',
                            dataType: 'text',
                            data: {
                                title: $('#title_pro').val(),
                                content:$('#content_pro').val(),
                                id:res
                            },
                            type: 'post',
                            success: function (res1) {
                                if (res1=='0' || res1 =='2') {
                                    alert('Error!')
                                } else {
                                    alert('Success!')
                                    $('.projectss').append(" <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12 portfolio-item branding photography all project_"+res+"'><div class='portfolio-img'><img src='../"+res1+"' class='img-responsive' alt=''></div><div class='portfolio-data '><h4><a href='#'>"+$('#title_pro').val()+"</a></h4><p class='meta'>"+$('#content_pro').val()+"</p><button class='btn btn-primary mt-5 ml-5 delpro' id='delpro_"+res+"' name='' >Delete</button></div></div> ")
                                    $('#title_pro').val('')
                                    $('#content_pro').val('')
                                    $('#imageproject').val('')
                                    $('.formaddpro').hide(500)
                                    $('#addproject').show()
                                }
                            }
                        });
                    }
                }
            });
        } 
        else {
            alert('Chỉ được upload file ảnh');
        } 
    }
     })

     $('.delpro').click(function(){
        if (confirm('Are you sure?') == true) {
            var id = this.id;
            var split_id = id.split("_");
            var del = split_id[1];
            $.ajax({
                url: 'http://localhost/CSE485_1851061727_LeAnhDuy/admin/controller/delete-projects.php?id=' + del + '',
                type: 'get',
                success: function (res) {
                    if (res == '1') {
                        $('.project_'+del).remove()
                    }
                    else {
                        alert('Error')
                    }
                }
            })
        }
        else {
            return false;
        }
     })

     


    
})
