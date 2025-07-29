/*$('.schedule-datepicker').datepicker({
    Default: true,
    todayHighlight : true,
    format: 'dd-mm-yyyy',
    autoclose: true
}); */

// ACTIVATE DATE
    var baseUrl = window.location.origin;

$("#competition_type").change(function () {
    var type = $("#competition_type").val();

    if (type == 1) {
        $("#schedule_datepicker_end_date").css("display", "none");
        $("#schedule_datepicker_start_date").css("display", "block");
    } else if (type == 2) {
        $("#schedule_datepicker_end_date").css("display", "block");
        $("schedule_datepicker_start_date").css("display", "block");
    } else if (type == 3) {
        $("#schedule_datepicker_end_date").css("display", "block");
        $("schedule_datepicker_start_date").css("display", "block");
    } else {
        $("#schedule_datepicker_end_date").css("display", "block");
        $("schedule_datepicker_start_date").css("display", "block");
    }
});

$("#type").change(function () {
    var type = $("#type").val();

    if (type == "free") {
        $("#price").val(0);
    } else if (type == "buy") {
        $("#price").val("");
    }
});

$(".select2").select2({
    placeholder: "Choose one",
    searchInputPlaceholder: "Search options",
});



    if (typeof sessionMsg !== 'undefined') {
    // Display the SweetAlert popup
    swal({
        icon: 'success', // Change to 'error' or other options based on your message type
        title: 'Message',
        text: sessionMsg, // Display the session message
        confirmButtonText: 'OK'
    });
}

$(document).ready(function () {
    var baseurl = window.location.origin;

    // app form submit
    $("#AppSubmitButton").click(function (e) {
        e.preventDefault();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var data = new FormData(document.getElementById("AppForm"));

        /*Ajax Request Header setup*/
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        /* Submit form data using ajax*/
        $.ajax({
            url: baseurl + "/content/admin/app_update",
            method: "post",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            cache: false,
            global: false,
            beforeSend: function () {
                $("#AppSubmitButton").prop("disabled", true); // disable button
            },
            success: function (response) {
                //------------------------
                alert(response.message);
                window.location.href = baseurl + "/content/admin/app-list";

                //--------------------------
            },
            error: function (reject) {
                var errors = $.parseJSON(reject.responseText);

                $.each(errors.errors, function (key, val) {
                    $("#" + key + "_error").text(val);
                });

                $("#AppSubmitButton").prop("disabled", false); // disable button
            },
        });
    });



    //wallpaper form submit
    $("#WallpaperSubmitButton").click(function (e) {
        e.preventDefault();

        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var data = new FormData(document.getElementById("WallpaperForm"));
        // console.log(data);
        alert("fine");

        /*Ajax Request Header setup*/
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        /* Submit form data using ajax*/
        $.ajax({
            url: baseurl + "/content/admin/app_wallpaper",
            method: "post",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            cache: false,
            global: false,
            beforeSend: function () {
                $("#WallpaperSubmitButton").prop("disabled", true); // disable button
            },
            success: function (response) {
                //------------------------
                alert(response.message);
                window.location.href =
                    baseurl + "/content/admin/wallpaper-list";

                //--------------------------
            },
            error: function (reject) {
                var errors = $.parseJSON(reject.responseText);

                $.each(errors.errors, function (key, val) {
                    $("#" + key + "_error").text(val);
                });

                $("#WallpaperSubmitButton").prop("disabled", false); // disable button
            },
        });
    });

    //video form submit
    $("#VideoSubmitButton").click(function (e) {
        e.preventDefault();

        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }

        var data = new FormData(document.getElementById("VideoForm"));

        /*Ajax Request Header setup*/
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        /* Submit form data using ajax*/
        $.ajax({
            url: baseurl + "/content/admin/video_store",
            method: "post",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            cache: false,
            global: false,
            beforeSend: function () {
                $("#VideoSubmitButton").prop("disabled", true); // disable button
            },
            success: function (response) {
                //------------------------
                alert(response.message);
                window.location.href = baseurl + "/content/admin/video-list";

                //--------------------------
            },
            error: function (reject) {
                var errors = $.parseJSON(reject.responseText);

                $.each(errors.errors, function (key, val) {
                    $("#" + key + "_error").text(val);
                });

                $("#VideoSubmitButton").prop("disabled", false); // disable button
            },
        });
    });

    //Game table
    var table;
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // User table
    table = $("#UsrTable").DataTable({
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.

        // Load data for the table's content from an Ajax source
        ajax: {
            url: baseurl + "/game/admin/ajax_game_list",
            type: "POST",
        },

        columns: [
            { data: "id" },
            { data: "name" },
            { data: "image" },
            { data: "description" },
            { data: "rule" },
            { data: "action" },
        ],
    });

    MediaTable = $("#MediaTable").DataTable({
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.

        // Load data for the table's content from an Ajax source
        ajax: {
            url: baseurl + "content/admin/media/ajax_media_list",
            type: "POST",
            dataSrc: "data",
        },

        columns: [
            { data: "Id" },
            { data: "Media Type" },
            { data: "Images" },
            { data: "Status" },
            { data: "Created at" },
            { data: "Updated at" },
            { data: "Action" },
        ],
    });

    //App table
    var apptable;
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    //datatables
    apptable = $("#AppTable").DataTable({
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.

        // Load data for the table's content from an Ajax source
        ajax: {
            url: baseurl + "/content/admin/ajax_content_list",
            type: "POST",
            data: { post_type: "application" },
        },

        columns: [
            { data: "id" },
            { data: "name" },
            { data: "image" },
            { data: "description" },
            { data: "top_chart" },
            { data: "action" },
        ],
    });

    //Wallaper table
    var wallpapertable;
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    //datatables
    wallpapertable = $("#WallpaperTable").DataTable({
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.

        // Load data for the table's content from an Ajax source
        ajax: {
            url: baseurl + "/content/admin/ajax_wallpaper_content_list",
            type: "POST",
            data: { post_type: "wallpaper" },
        },

        columns: [
            { data: "id" },
            { data: "name" },
            { data: "image" },
            { data: "description" },
            { data: "top_chart" },
            { data: "action" },
        ],
    });

    //video table
    var videotable;
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    //datatables
    videotable = $("#videoTable").DataTable({
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.

        // Load data for the table's content from an Ajax source
        ajax: {
            url: baseurl + "/content/admin/ajax_video_content_list",
            type: "POST",
            data: { post_type: "video" },
        },

        columns: [
            { data: "id" },
            { data: "name" },
            { data: "image" },
            { data: "description" },
            { data: "top_chart" },
            { data: "action" },
        ],
    });

    //Competition table
    var table1;
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    //datatables
    table1 = $("#CompetitionTable").DataTable({
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.

        // Load data for the table's content from an Ajax source
        ajax: {
            url: baseurl + "/admin/competition/ajax_competition_list",
            type: "POST",
            dataSrc: "data",
        },

        columns: [
            { data: "Id" },
            { data: "Game Name" },
            { data: "Competition Type" },
            { data: "Start Date" },
            { data: "End Date" },
            { data: "Created at" },
            { data: "Updated at" },
            { data: "Action" },
        ],
    });

    //Edit Category
    $(document).on("click", "#edit_cat", function (e) {
        e.preventDefault();
        var cat_uuid = $(this).data("cat_uuid");
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            dataType: "json",
            enctype: "application/x-www-form-urlencoded",
            url: baseurl + "/category/admin/category_details",
            data: {
                cat_uuid: cat_uuid,
            },
        }).done(function (data) {
            if ((data.success = true)) {
                jQuery('form[name="editCategoryForm"]')
                    .find('input[name="name"]')
                    .val(data.cat_dtl.name);
                jQuery('form[name="editCategoryForm"]')
                    .find('input[name="cat_uuid"]')
                    .val(data.cat_dtl.uuid);
                $("#editCategoryModel").modal("toggle");
            }
        });
    });

    //Delete Category
    $(document).on("click", "#delete_cat", function (e) {
        e.preventDefault();
        var cat_uuid = $(this).data("cat_uuid");

        swal(
            "Are you sure?",
            "Once deleted, you will not be able to recover this category!",
            "warning",
            {
                buttons: true,
                dangerMode: true,
            }
        ).then((willDelete) => {
            // console.log(willDelete.value);
            if (willDelete.value == true) {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    enctype: "application/x-www-form-urlencoded",
                    url: baseurl + "/delete_category",
                    data: {
                        cat_uuid: cat_uuid,
                    },
                }).done(function (data) {
                    if (data.success == true) {
                        swal("Done!", data.msg, "success");

                        window.location.reload();
                    }
                });
            }
        });
    });

    //Edit Banner Image
    $(document).on("click", "#edit_bnr", function (e) {
        e.preventDefault();
        var bnr_id = $(this).data("bnr_id");
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            dataType: "json",
            enctype: "application/x-www-form-urlencoded",
            url: baseurl + "/banner_details",
            data: {
                bnr_id: bnr_id,
            },
        }).done(function (data) {
            if ((data.success = true)) {
                var imgsrc = baseurl + "/uploads/banner/" + data.bnr_dtl.image;
                document.querySelector(".bnr_img").setAttribute("src", imgsrc);
                $(
                    'select[name^="game_id"] option[value="' +
                        data.bnr_dtl.game_id +
                        '"]'
                ).attr("selected", "selected");
                jQuery('form[name="editBannerForm"]')
                    .find('input[name="banner_id"]')
                    .val(data.bnr_dtl.id);
                $("#editBannerModel").modal("toggle");
            }
        });
    });

    //Add or Remove from top chart
    $(document).on("change", "#top_chart", function (e) {
        e.preventDefault();
        var val = "";
        var post_id = $(this).data("post_id");
        const checked = $(this).is(":checked");

        if (checked == true) {
            val = 1;
        } else {
            val = 0;
        }
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            dataType: "json",
            url: baseurl + "/save_top_chart",
            data: {
                post_id: post_id,
                val: val,
            },
            success: function (data) {
                if (data.success == true) {
                    swal("Done!", data.msg, "success");
                }
            },
        });
    });

    //Activate or Deactivate banner
    $(document).on("change", "#banner_status", function (e) {
        e.preventDefault();
        var val = "";
        var banner_id = $(this).data("banner_id");
        const checked = $(this).is(":checked");

        if (checked == true) {
            val = 1;
        } else {
            val = 0;
        }
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            dataType: "json",
            url: baseurl + "/save_banner_status",
            data: {
                banner_id: banner_id,
                val: val,
            },
            success: function (data) {
                if (data.success == true) {
                    swal("Done!", data.msg, "success");
                }
            },
        });
    });

    //Delete banner
    $(document).on("click", "#delete_bnr", function (e) {
        var banner_id = $(this).data("banner_id");

        swal(
            "Are you sure?",
            "Once deleted, you will not be able to recover this banner!",
            "warning",
            {
                buttons: true,
                dangerMode: true,
            }
        ).then((willDelete) => {
            if (willDelete.value == true) {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: baseurl + "/delete_banner",
                    data: {
                        banner_id: banner_id,
                    },
                    success: function (data) {
                        if (data.success == true) {
                            swal("Done!", data.msg, "success", {
                                buttons: false,
                            });

                            window.location.reload();
                        }
                    },
                });
            }
        });
    });

    //Activate or Deactivate category
    $(document).on("change", "#category_status", function (e) {
        e.preventDefault();
        var val = "";
        var category_id = $(this).data("category_id");
        const checked = $(this).is(":checked");

        if (checked == true) {
            val = 1;
        } else {
            val = 0;
        }
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            dataType: "json",
            url: baseurl + "/save_category_status",
            data: {
                category_id: category_id,
                val: val,
            },
            success: function (data) {
                if (data.success == true) {
                    swal("Done!", data.msg, "success");
                }
            },
        });
    });

    //Users list
    var userTable;
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    //datatables
    userTable = $("#userTable").DataTable({
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.

        // Load data for the table's content from an Ajax source
        ajax: {
            url: baseurl + "/admin/user/ajax_user_list",
            type: "POST",
            data: {},
        },

        columns: [
            { data: "id" },
            { data: "name" },
            { data: "msisdn" },
            { data: "package" },
            { data: "lastchange" },
            { data: "nextcharge" },
            { data: "subs_stat" },
            { data: "is_ban" },
        ],
    });

    //Ban User or Remove User Ban category
    $(document).on("change", "#ban_user", function (e) {
        e.preventDefault();
        var val = "";
        var user_uuid = $(this).data("user_uuid");
        const checked = $(this).is(":checked");

        if (checked == true) {
            val = 1;
        } else {
            val = 0;
        }
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            dataType: "json",
            url: baseurl + "/save_ban_user",
            data: {
                user_uuid: user_uuid,
                val: val,
            },
            success: function (data) {
                if (data.success == true) {
                    swal("Done!", data.msg, "success");
                }
            },
        });
    });

    //Delete App, Wallpaper, Video
    $(document).on("click", "#del_content", function (e) {
        var post_id = $(this).data("post_id");

        swal(
            "Are you sure?",
            "Once deleted, you will not be able to recover this content!",
            "warning",
            {
                buttons: true,
                dangerMode: true,
            }
        ).then((willDelete) => {
            // console.log(willDelete.value);
            if (willDelete.value == true) {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: baseurl + "/delete_content",
                    data: {
                        post_id: post_id,
                    },
                    success: function (data) {
                        if (data.success == true) {
                            swal("Done!", data.msg, "success", {
                                buttons: false,
                            });

                            window.location.reload();
                        }
                    },
                });
            }
        });
    });

    //Delete Competition
    $(document).on("click", ".del_comp", function (e) {
        var comp_id = $(this).data("comp_id");

        swal(
            "Are you sure?",
            "Once deleted, you will not be able to recover this competition!",
            "warning",
            {
                buttons: true,
                dangerMode: true,
            }
        ).then((willDelete) => {
            // console.log(willDelete.value);
            if (willDelete.value == true) {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: baseurl + "/delete_competition",
                    data: {
                        comp_id: comp_id,
                    },
                    success: function (data) {
                        if (data.success == true) {
                            swal("Done!", data.msg, "success", {
                                buttons: false,
                            });

                            window.location.reload();
                        }
                    },
                });
            }
        });
    });

    //Delete Game
    $(document).on("click", "#del_game", function (e) {
        var game_uuid = $(this).data("game_uuid");

        swal(
            "Are you sure?",
            "Once deleted, you will not be able to recover this game!",
            "warning",
            {
                buttons: true,
                dangerMode: true,
            }
        ).then((willDelete) => {
            if (willDelete.value == true) {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: baseurl + "/delete_game",
                    data: {
                        game_uuid: game_uuid,
                    },
                    success: function (data) {
                        if (data.success == true) {
                            swal("Done!", data.msg, "success", {
                                buttons: false,
                            });

                            window.location.reload();
                        }
                    },
                });
            }
        });
    });

    /* Image preview */
    // $('.input-images').imageUploader();
    /*if (window.File && window.FileList && window.FileReader) {

        $("#imagefiles").on("change", function(e) {

            const myFileList = [];
            const myNewFileList = [];
            var files = e.target.files;
            filesLength = files.length;

            $.each(files, function(indx, itm){

                // var f = files[indx];
                var fileReader = new FileReader();

                /*let list = new DataTransfer();
                let imgFile = new File(["content"], itm);
                list.items.add(imgFile);

                $('input:file#imagefiles')[0].files = list.files*/

    // myFileList.push(list.files);
    // console.log('myFileList: ', myFileList);

    /*fileReader.onload = (function(e) {

                    var file = e.target;

                    $("<span class=\"preview_img  pip_"+indx+"\">" +
                        "<img class=\"imageThumb thumb\" src=\"" + file.result + "\" title=\"" + file.name + "\"width=200px height=200px/>" +
                        // "<br/><span class=\"remove\" data-img_indx="+indx+">Remove</span>" +
                        "</span>"
                    ).insertAfter("#screenshots");

                    /*$.each(myFileList, function(i, mfl){
                        // fileInput.files = mfl;
                        $('input:file#imagefiles')[0].files = mfl;
                    });*/

    // console.log('Files: ', files);

    /*$(".remove").click(function(ev){

                        ev.preventDefault();

                        var img_indx = $(this).data('img_indx');

                        // const dt = new DataTransfer()

                        /*for (let file of $('input:file#imagefiles')[0].files)
                            if (file !== $('input:file#imagefiles')[0].files[0])
                            dt.items.add(file)*/

    // $('input:file#imagefiles')[0].onchange = null // remove event listener
    //$('input:file#imagefiles')[0].files = dt.files // this will trigger a change event

    //$(this).parent(".pip_"+img_indx).remove();

    /*$.each(myFileList, function(idx, fl){
                            if (idx != img_indx) {
                                myNewFileList.push(fl);
                            }
                        });*/

    // console.log('myNewFileList: ', myNewFileList);

    /*$.each(myNewFileList, function(ixd, fle){
                            // fileInput.files = fle;
                            $('input:file#imagefiles')[0].files = fle;
                        });*/

    /*});

                });

                fileReader.readAsDataURL(itm);
            });
            // console.log('Files: ', files);
        });
    } else {
        alert("Your browser doesn't support to File API")
    }*/

    //Deselect app media image
    $(document).on("click", ".deselect_post_img", function (e) {
        var post_id = $(this).data("post_id");
        var post_uuid = $(this).data("post_uuid");
        var img_name = $(this).data("img_name");
        var upload_index = $(this).data("upload_index");

        var THIS = $(this);

        swal(
            "Are you sure?",
            "Once deleted, you will not be able to recover this image!",
            "warning",
            {
                buttons: true,
                dangerMode: true,
            }
        ).then((willDelete) => {
            if (willDelete.value == true) {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: baseurl + "/delete_post_media",
                    data: {
                        post_id: post_id,
                        img_name: img_name,
                        post_uuid: post_uuid,
                    },
                    success: function (data) {
                        if (data.status == true) {
                            THIS.remove();
                            $(".upload_img_" + upload_index).remove();
                        }
                    },
                });
            }
        });
    });

    //Winner List Filter With Game Name
    $(document).on("change", "#game_filter", function (e) {
        var game_uuid = $(this).val();
        $(".prize_status_filter").removeClass("active_bg");

        winnerDataTable(0, game_uuid);
    });

    //Winner List Filter With Prize Sattus
    $(document).on("click", ".prize_status_filter", function (e) {
        $('select option[value="0"]').attr("selected", true);
        var prize_status = $(this).data("status");
        $(".prize_status_filter").removeClass("active_bg");
        $(this).addClass("active_bg");

        winnerDataTable(prize_status, 0);
    });

    //Winner List Admin
    function winnerDataTable(prize_status, game_uuid) {
        $("#WinnerListTable").DataTable({
            processing: true, //Feature control the processing indicator.
            serverSide: true, //Feature control DataTables' server-side processing mode.
            destroy: true,

            // Load data for the table's content from an Ajax source
            ajax: {
                url: baseurl + "/admin/report/ajax_winner_list",
                type: "POST",
                data: {
                    prize_status: prize_status,
                    game_uuid: game_uuid,
                },
                dataSrc: "data",
            },

            columns: [
                { data: "Competition Game" },
                { data: "Type" },
                { data: "Winner Name" },
                { data: "Winner Position" },
                { data: "Winner MSISDN" },
                { data: "Email" },
                { data: "Coins" },
                { data: "Period" },
                { data: "Prize Status" },
            ],
        });
    }

    winnerDataTable(0, 0);

    // Change Winner List Prize Status
    $(document).on("change", ".set_prize_status", function (e) {
        var prize_status = $(this).val();
        var win_id = $(this).find(":selected").data("win_id");

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            dataType: "json",
            enctype: "application/x-www-form-urlencoded",
            url: baseurl + "/admin/report/update_prize_status",
            data: {
                win_id: win_id,
                prize_status: prize_status,
            },
        }).done(function (data) {
            if (data.status == true) {
                swal("Done!", data.msg, "success");

                // window.location.reload();
            }
        });
    });

    //Download Report Admin
    function downloadReportDataTable(from_date, to_date) {
        $("#DownloadReportTable").DataTable({
            processing: true, //Feature control the processing indicator.
            serverSide: true, //Feature control DataTables' server-side processing mode.
            destroy: true,

            // Load data for the table's content from an Ajax source
            ajax: {
                url: baseurl + "/admin/report/ajax_download_report",
                type: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                },
                dataSrc: "data",
            },

            columns: [
                { data: "Download Date" },
                { data: "Total Download" },
                { data: "Product Name" },
                { data: "Product Id" },
                { data: "User Id" },
                { data: "Phone Number" },
            ],
        });
    }

    downloadReportDataTable(0, 0);

    //Download Report List Filter With Date
    $(document).on("click", "#date_filter_btn", function (e) {
        var from_date = $("#from_date").val();
        var to_date = $("#to_date").val();

        if (from_date == "") {
            from_date = 0;
        }
        if (to_date == "") {
            to_date = 0;
        }

        downloadReportDataTable(from_date, to_date);
    });

    $("#sample_2").DataTable();

    $(function () {
        "use script";

        $("#example2").DataTable({
            responsive: true,
            language: {
                searchPlaceholder: "Search...",
                sSearch: "",
                lengthMenu: "_MENU_ records",
            },
            columnDefs: [
                {
                    targets: [1],
                    orderable: false,
                    ordering: false,
                },
            ],
            aaSorting: [],
        });
    });


    $('#filterButton').on('click', function(e) {
        e.preventDefault();

        let startDate = $('#startDate').val();
        let endDate = $('#endDate').val();

        $.ajax({
            url: baseurl+'/admin/winnerList',
            type: 'GET',
            data: {
                startDate: startDate,
                endDate: endDate
            },
            success: function(response) {
                let tableBody = $('#example2 tbody');
                tableBody.empty(); // Clear the existing rows

                // Hide loader once the request is complete

                // Check if the response data is empty
                if (response.data.length === 0) {
                    let noDataRow = '<tr><td colspan="8" class="text-center">No data found</td></tr>';
                    tableBody.append(noDataRow);
                } else {
                    // Append new data from the response
                    $.each(response.data, function(index, winner) {
                        let row = '<tr id="example">' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + (winner.msisdn ? winner.msisdn : 'Unknown') + '</td>' +
                            '<td>' + (winner.first_name ? winner.first_name : 'Unknown') + ' ' + (winner.last_name ? winner.last_name : '') + '</td>' +
                            '<td>' + (winner.prediction_start_time ? winner.prediction_start_time : 'Unknown') + '</td>' +
                            '<td>' + (winner.prediction_end_time ? winner.prediction_end_time : 'Unknown') + '</td>' +
                            '<td>' + (winner.coins ? winner.coins : 'Unknown') + '</td>' +
                            '<td>' + (winner.subscription_date ? winner.subscription_date : 'Unknown') + '</td>' +
                            '<td>' +
                            '<a href="javascript:void(0)" data-userid="' + (winner.id ? winner.id : 'Unknown') + '" data-start_date="' + response.last + '" data-end_date="' + response.next + '" data-target="#answer" onclick="openModal()" class="userPrediction">' +
                            '<i class="fas fa-eye"></i> View</a>' +
                            '</td>' +
                            '</tr>';
                        tableBody.append(row);
                    });
                }
            },
            beforeSend: function() {

                let tableBody = $('#example2 tbody');
                tableBody.empty();
            },
            error: function() {
              
                let tableBody = $('#example2 tbody');
                let errorRow = '<tr><td colspan="8" class="text-center">Failed to fetch data</td></tr>';
                tableBody.append(errorRow);
            }

        });
    });


    $(".off-canvas-menu").on("click", function (e) {
        e.preventDefault();
        var target = $(this).attr("href");

        $(target).addClass("show");
    });

    $(".off-canvas .close").on("click", function (e) {
        e.preventDefault();
        $(this).closest(".off-canvas").removeClass("show");
    });

    $(document).on("click touchstart", function (e) {
        e.stopPropagation();

        // closing of sidebar menu when clicking outside of it
        if (!$(e.target).closest(".off-canvas-menu").length) {
            var offCanvas = $(e.target).closest(".off-canvas").length;
            if (!offCanvas) {
                $(".off-canvas.show").removeClass("show");
            }
        }
    });

 
   $(document).on("click", ".pred_delete", function (e) {
        e.preventDefault();
        
        var predId = $(this).data('pred_id');
        
    swal({
            title: "Are you sure?",
            text:'You are about to delete this item.',
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {

            if (willDelete) {
            
                // Delete the item
                deleteItem(predId);
            }
        });
    });

    
    function deleteItem(predId) {
        // Perform the deletion logic using AJAX
        
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            url: baseurl+'/admin/prediction/delete',
            type: 'POST',
            data: { id: predId },
            dataType: 'json',
            success: function(response) {
                // Handle success response
                console.log(response);

                window.location.href = baseurl+'/admin/prediction';
                // Optionally, you can display a success message
                swal('Deleted!', 'The item has been deleted.', 'success');
                
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.log(xhr.responseText);
                
                // Optionally, you can display an error message
                swal('Error!', 'An error occurred while deleting the item.', 'error');
            }
        });
    }




    $(document).on("click", ".toggle-icon", function(e) {
        const predId = $(this).data('pred_id');
        const iconElement = $(this).find('i');

        // Toggle the active state
        const isActive = iconElement.hasClass('fa-toggle-on');
        
        // Change the icon and its color
        iconElement.removeClass(isActive ? 'fa-toggle-on text-primary' : 'fa-toggle-off')
                   .addClass(isActive ? 'fa-toggle-off' : 'fa-toggle-on text-primary');

        // Set status based on icon state
        const status = isActive ? '0' : '1';

        var baseurl = window.location.origin;

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });

        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: baseurl+'/admin/prediction/togglestatus',
            data: {
                status: status,
                id: predId
            },
        }).done(function (data) {
            console.log(data);
            if (data.status == true) {
                swal({
                    title: "Success",
                    text: data.msg, 
                    icon: "success",
                });   
            } else {
                swal({
                    title: "Error",
                    text: data.msg,
                    icon: "error",
                });
            }
        });
    });


    $(document).on("change", ".league", function () {
        // return false;
        var leagueid = $(this).val();
        var start_date = new Date().toISOString().slice(0, 10);
        var baseurl = window.location.origin;

        // console.log(leagueid);
        // console.log("not workss");
        $.ajax({
            type: "POST",
             url:baseurl+'/admin/prediction/getmatches',
          
            dataType: "json",
            data: {
                id: leagueid,
                start_date : start_date
            },
            success: function (data) {
                
                var len = data.data.length;
                console.log(len);
                $("#multiple").empty();
                // $("#sel_match").append("<option value='0' readonly>Please select a match</option>");
                for (var i = 0; i < len; i++) {
                    var id = data.data[i]["fixture_id"];
                    var date_time = data.data[i]["date_time"];
                    var homeTeam = data.data[i]["homeTeam_name"];
                    var awayTeam = data.data[i]["awayTeam_name"];
                    var name =
                        homeTeam +
                        " vs " +
                        awayTeam +
                        " on " +
                        date_time;
                    $("#multiple").append(
                        "<option value='" + id + "'>" + name + "</option>"
                    );
                }
            },
        });
    });

    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });

    /*var forms = document.querySelectorAll('.needs-validation');*/
    (function () {
        "use strict";
        window.addEventListener(
            "load",
            function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName("needs-validation");
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(
                    forms,
                    function (form) {
                        form.addEventListener(
                            "submit",
                            function (event) {
                                if (form.checkValidity() === false){
                                    event.preventDefault();
                                   //event.stopPropagation();
                                }
                                form.classList.add("was-validated");
                            },
                            false
                        );
                    }
                );
            },
            false
        );
    })

    // --------------For Notification------------------------//

    $(document).ready(function () {
        var baseUrl = window.location.origin;

        function formatDate(dateString) {
        var options = { year: 'numeric', month: '2-digit', day: '2-digit' };
        return new Date(dateString).toLocaleDateString('en-US', options);
        }
        
        function loadNotifications() {
            $.ajax({
                type: 'GET',
                url: baseUrl + '/admin/notifications/', 
                success: function (data) {
                    if (data.notifications.length > 0) {
                        var tableBody = $('#matchesTable tbody');
                        tableBody.empty(); // Clear the table body

                        $.each(data.notifications, function (index, notification) {
                            var newRow = $('<tr>');
                            newRow.append('<td>' + (index + 1) + '</td>');
                            newRow.append('<td>' + notification.title + '</td>');
                            newRow.append('<td>' + notification.message + '</td>');
                            newRow.append('<td>' + notification.type + '</td>');
                            newRow.append('<td>' +
                        '<a href="javascript:void(0)" class="tx-success notif-edit"  data-notif_id="' + notification.id + '"><i class="fa fa-edit" ></i></a>' +
                        '<a href="javascript:void(0)" class="tx-danger notif-del" data-notif_id="' + notification.id + '"><i class="fa fa-trash" "></i></a>' +
                                '</td>');

                            tableBody.append(newRow);
                        });
                    }
                },
                error: function (data) {
                    console.error('An error occurred while fetching notifications.');
                }
            });
        }



                $('#submitnotif').click(function(e) {
                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: baseUrl + '/admin/notifications/store',
                        data: $('#notificationForm').serialize(),

                        success: function(response) {
                            
                            if (response.success) {
                               
                                swal({
                                    title: 'Success!',
                                    text: response.message,
                                    icon: 'success',
                                }).then(function() {
                                    // Close the modal or redirect as needed
                                    $('#addNotificationModal').modal('hide');
                                    $('#notificationForm')[0].reset();
                                    loadNotifications();
                                    // window.location.reload();

                                });
                            } else {
                                // Display an error SweetAlert
                                swal('Error', response.message, 'error'); 
                                $('#notificationForm')[0].reset();
                            }
                        },
                        error: function(xhr) {
                           $('#notificationForm')[0].reset();
                            swal('Error', 'All Fields are required.', 'error');
                        }
                    });
                });

                // Assuming you have a button or event to trigger the modal
       $(document).on('click', '.notif-edit', function () {
            var notificationId = $(this).data('notif_id');
            $('#editNotificationId').val('');
            $('#editTitle').val('');
            $('#editMessage').val('');
            $('#editType').val('');
                   
            $.ajax({
                url: baseUrl + '/admin/notifications/edit/' + notificationId,
                type: 'GET',
                success: function (response) {
                    if (response.notification) {
                        // Populate your modal fields with the notification data
                        $('#editNotificationId').val(response.notification.id);
                        $('#editTitle').val(response.notification.title);
                        $('#editMessage').val(response.notification.message);
                        $('#editType').val(response.notification.type);
                        // Show the modal
                        $('#editNotificationModal').modal('show');
                    } else {
                        alert('Notification not found.');
                    }
                },
                error: function () {
                    alert('Error fetching notification data.');
                }
            });
        });


        $('#updatenotif').click(function (e) {
        e.preventDefault();
        $('#editNotificationModal').modal('hide');
        var formData = $('#editNotificationForm').serialize();

        $.ajax({
            url: baseUrl + '/admin/notifications/update',
            type: 'POST',
            data: formData,
            success: function (response) {
                if (response.success) {
                    swal({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                    }).then(function () {
                        // Close the modal and reset the form
                        $('#editNotificationModal').modal('hide');
                       
                        console.log(response); 
                        loadNotifications();
                        // Update the table row with the edited data
                        // var notificationId = response.notification.id;
                        // var tableRow = $('#notificationRow_' + notificationId);
                        // tableRow.find('td:eq(1)').text(response.notification.title);
                        // tableRow.find('td:eq(2)').text(response.notification.message);
                        // tableRow.find('td:eq(3)').text(response.notification.type);
                        // window.location.reload();

                    });
                } else {
                    // Display an error SweetAlert
                    swal('Error', response.message, 'error');
                    $('#editnotificationForm')[0].reset();
                }
            },
            error: function (xhr) {
                $('#notificationForm')[0].reset();
                swal('Error', 'All Fields are required', 'error');
            }
        });
    });



       $(document).on('click', '.notif-del', function () {
    var notificationId = $(this).data('notif_id');
    var deleteUrl = baseUrl + '/admin/notifications/destroy/' + notificationId; // Adjust the URL as needed

    // Display a confirmation dialog using SweetAlert2
    swal({
        title: "Are you sure want to delete?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) { // Check if the user confirmed the deletion
            $.ajax({
                type: 'GET', // Change the request type to DELETE
                url: deleteUrl,
                                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add the CSRF token
                },
                success: function (data) {
                    if (data.success) {
                        $('#notificationRow_' + notificationId).remove();
                        swal(
                            'Deleted!',
                            'Notification has been deleted successfully.',
                            'success'
                        );
                        // window.location.reload();
                        loadNotifications();
                    } else {
                        swal(
                            'Error!',
                            'Failed to delete notification.',
                            'error'
                        );
                    }
                },
                error: function (data) {
                    swal(
                        'Error!',
                        'An error occurred while deleting the notification.',
                        'error'
                    );
                }
            });
        }
    });
});


    });

        //-------------------- For Notification End----------------------

 // --------------------------- Games----------------------------------------//
        $(document).ready(function () {


        function getStatusToggleButton(notification) {
            var statusButtonHtml = '<label class="statusLbl">' +
            '<input class="pred_status" data-game_id="' + notification.id + '" type="checkbox" data-toggle="toggle" data-size="small" game_id="' + notification.id + '"' + (notification.status ? 'checked' : '') + '>' +
            '</label>';
        return statusButtonHtml;
        }
        function loadGames() {
            $.ajax({
                type: 'GET',
                url: baseUrl + '/admin/games', 
                success: function (data) {
                    if (data.games.length > 0) {
                        var tableBody = $('#example2 tbody');
                        tableBody.empty(); // Clear the table body

                        $.each(data.games, function (index, notification) {
                            var newRow = $('<tr>');
                            newRow.append('<td>' + notification.id + '</td>');
                            newRow.append('<td>' + notification.name + '</td>');
                            newRow.append('<td>' + notification.description + '</td>');
                            newRow.append('<td><img style="height:80px; width:100px; border-radius:50%;" src="' + baseUrl + '/uploads/gameImages/' + notification.icon + '" alt="Icon"></td>');
                            newRow.append('<td><img style="height:80px; width:100px; border-radius:50%;"src="' + baseUrl + '/uploads/gameImages/' + notification.banner + '" alt="Banner"></td>');

                            newRow.append('<td>' + notification.games_code + '</td>');
                            newRow.append('<td>' + notification.url + '</td>');
                            newRow.append('<td>' + getStatusToggleButton(notification) + '</td>'); // Append status toggle button
                            newRow.append('<td>' +
                        '<a href="javascript:void(0)" class="tx-success game-edit"  data-game_id="' + notification.id + '"><i class="fa fa-edit" ></i></a>' +
                        '<a href="javascript:void(0)" class="tx-danger game-del" data-game_id="' + notification.id + '"><i class="fa fa-trash" "></i></a>' +
                                '</td>');

                            tableBody.append(newRow);
                        });
                    }
                },
                error: function (data) {
                    console.error('An error occurred while fetching notifications.');
                }
            });
        }


                $('#submitGame').click(function(e) {
                    e.preventDefault();
                     var formData = new FormData($('#GamesForm')[0]);

                        $.ajax({
                            type: 'POST',
                            url: baseUrl + '/admin/games/store',
                            data: formData,
                            contentType: false,
                            processData: false,
                        success: function(response) {
                            
                            if (response.success) {
                               
                                swal({
                                    title: response.message,
                                    icon: 'success',
                                }).then(function() {
                                    // Close the modal or redirect as needed
                                    $('#addGamesModal').modal('hide');
                                    $('#GamesForm')[0].reset();
                                    // loadGames();
                                    window.location.reload();

                                });
                            } else {
                                // Display an error SweetAlert
                                swal('Error', response.message, 'error'); 
                                $('#GamesForm')[0].reset();
                            }
                        },
                        error: function(xhr) {
                           $('#GamesForm')[0].reset();
                            swal('Error', 'All Fields are required.', 'error');
                        }
                    });
                });

                // Assuming you have a button or event to trigger the modal
       $(document).on('click', '.game-edit', function () {
            var notificationId = $(this).data('game_id');
            $('#editGamesId').val('');
            $('#editTitle').val('');
            $('#editMessage').val('');
                   
            $.ajax({
                url: baseUrl + '/admin/games/edit/' + notificationId,
                type: 'GET',
                success: function (response) {
                    if (response.game) {
                        // Populate your modal fields with the notification data
                        $('#editGamesId').val(response.game.id);
                        $('#editTitle').val(response.game.name);
                        $('#editMessage').val(response.game.description);
                        $('#editIcon').val(response.game.icon);
                        $('#editBanner').val(response.game.banner);
                        $('#editUrl').val(response.game.url);
                        // Show the modal
                        $('#editGamesModal').modal('show');
                    } else {
                        alert('Notification not found.');
                    }
                },
                error: function () {
                    alert('Error fetching notification data.');
                }
            });
        });


        $('#updateGame').click(function (e) {
        e.preventDefault();
        $('#editGamesModal').modal('hide');
        var formData = $('#editGamesForm').serialize();

        $.ajax({
            url: baseUrl + '/admin/games/update',
            type: 'POST',
            data: formData,
            success: function (response) {
                if (response.success) {
                    swal({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                    }).then(function () {
                        // Close the modal and reset the form
                        $('#editGamesModal').modal('hide');
                       
                        console.log(response); 
                        // loadGames();
                        // Update the table row with the edited data
                        // var notificationId = response.notification.id;
                        // var tableRow = $('#notificationRow_' + notificationId);
                        // tableRow.find('td:eq(1)').text(response.notification.title);
                        // tableRow.find('td:eq(2)').text(response.notification.message);
                        // tableRow.find('td:eq(3)').text(response.notification.type);
                        window.location.reload();

                    });
                } else {
                    // Display an error SweetAlert
                    swal('Error', response.message, 'error');
                    $('#editGamesForm')[0].reset();
                }
            },
            error: function (xhr) {
                $('#GamesForm')[0].reset();
                swal('Error', 'All Fields are required', 'error');
            }
        });
    });



    $(document).on('click', '.game-del', function () {
        var notificationId = $(this).data('game_id');
        var deleteUrl = baseUrl + '/admin/games/destroy/' + notificationId; // Adjust the URL as needed

        // Display a confirmation dialog using SweetAlert2
        swal({
            title: "Are you sure want to delete?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) { // Check if the user confirmed the deletion
                $.ajax({
                    type: 'GET', // Change the request type to DELETE
                    url: deleteUrl,
                                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add the CSRF token
                    },
                    success: function (data) {
                        if (data.success) {
                            $('#gamesRow_' + notificationId).remove();
                            swal(
                                'Deleted!',
                                'Game Deleted successfully.',
                                'success'
                            );
                            window.location.reload();
                        } else {
                            swal(
                                'Error!',
                                'Failed to delete Game.',
                                'error'
                            );
                        }
                    },
                    error: function (data) {
                        swal(
                            'Error!',
                            'An error occurred while deleting the Game.',
                            'error'
                        );
                    }
                });
            }
        });
    });

    $(document).on("change", ".game_status", function(e){
        var status = '';
        var pred_id = $(this).data('game_id');
        
        if ($(this).prop('checked')) {
            status = '1';
        }else{
            status = '0';
        }

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: baseurl+'/admin/games/togglestatus',
            data: {
                status: status,
                id: pred_id
            },
        }).done(function (data) {
            console.log(data);
            if (data.status == true) {
                swal({
                    title: data.msg,
                    icon: "success",
                });   
                
            }else{
                swal({
                    title: data.msg,
                    icon: "error",
                });
            }
        });
    });
    $(document).on('click', '.schedule-del', function () {
        var notificationId = $(this).data('schedule_id');
        var deleteUrl = baseUrl + '/admin/gameSchedule/destroy/' + notificationId; // Adjust the URL as needed

        // Display a confirmation dialog using SweetAlert2
        swal({
            title: "Are you sure want to delete?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) { // Check if the user confirmed the deletion
                $.ajax({
                    type: 'GET', // Change the request type to DELETE
                    url: deleteUrl,
                                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add the CSRF token
                    },
                    success: function (data) {
                        if (data.success) {
                            $('#notificationRow_' + notificationId).remove();
                            swal(
                                'Deleted!',
                                'Game Schedule Deleted successfully.',
                                'success'
                            );
                            window.location.reload();
                        } else {
                            swal(
                                'Error!',
                                'Failed to delete Schedule.',
                                'error'
                            );
                        }
                    },
                    error: function (data) {
                        swal(
                            'Error!',
                            'An error occurred while deleting the Game Schedule.',
                            'error'
                        );
                    }
                });
            }
        });
    });

    $(document).on("change", ".schedule_status", function(e){
        var status = '';
        var pred_id = $(this).data('schedule_id');
        
        if ($(this).prop('checked')) {
            status = '1';
        }else{
            status = '0';
        }

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: baseurl+'/admin/gameSchedule/togglestatus',
            data: {
                status: status,
                id: pred_id
            },
        }).done(function (data) {
            console.log(data);
            if (data.status == true) {
                swal({
                    title: "Success",
                    text: data.msg, 
                    icon: "success",
                });   
                
            }else{
                swal({
                    title: "Error",
                    text: data.msg,
                    icon: "error",
                });
            }
        });
    });


});

 // --------------------------- Games End----------------------------------------//

        //-------------------- For Getmatches Admin----------------------

    $(document).ready(function () {

      $(document).on('click', '#closeModalBtn', function () {
        $('#customModal').removeClass('active');   
         });
        
       


        GetMatches();

        $(document).on('change', '#matchday', function (e) {
        
        GetMatches();
        });

         $(document).on('change', '#league-dropdown', function (e) {
        
         
        GetMatches();
        });     

        function GetMatches() {  


            if ($.fn.DataTable.isDataTable("#matchesTable")) {
                $("#matchesTable").DataTable().destroy();
            }

            // Reinitialize DataTable
            var dataTable = $("#matchesTable").DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: "Search...",
                    sSearch: "",
                    lengthMenu: "_MENU_ records",
                },
                aaSorting: [],
                
            });       
           

            var start_date;
            var end_date;
            var type;
            var date = new Date();


            var leauge_id = $("#league-dropdown").val();        
            
            var date_type =$('#matchday').val();



            if (date_type == "today") {

                start_date = new Date().toISOString().slice(0, 10);
                end_date = new Date(date.getTime() + 14 * 60 * 60 * 1000).toISOString().slice(0, 10);
                type = "today";
                
            }
            else if (date_type == "tomorrow") {


                start_date = new Date(date.getTime() + 24 * 60 * 60 * 1000).toISOString().slice(0, 10);
                end_date = new Date(date.getTime() + 48 * 60 * 60 * 1000).toISOString().slice(0, 10);
                type = "tomorrow";

            }
            else if (date_type == "yesterday") {


                end_date = new Date().toISOString().slice(0, 10);
                start_date = new Date(date.getTime() - 24 * 60 * 60 * 1000).toISOString().slice(0, 10);
                type = "yesterday";

            }

            console.log(type);
           

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                dataType: "json",
                url: baseurl + "/getmatches",
                data: {
                    start_date: start_date,
                    end_date: end_date,
                    type: type,
                    league: leauge_id
                   
                },
                    success: function (data) {
                    console.log(data);
                    // Clear the table before populating it
                    dataTable.clear();

                    if (data.matches && data.matches.length > 0){
                       $.each(data.matches, function (index, matches) {
                            var date_time = matches['date_time'];
                            var localTime = moment.utc(date_time).toDate();
                            var localDateTime = moment(localTime).format('YYYY-MM-DD HH:mm');

                            var newRow = $('<tr>');
                            newRow.append('<td>' + (index + 1) + '</td>');
                            newRow.append('<td>' + matches.fixture_id + '</td>');
                            newRow.append('<td style="width:13%">' +
                                '<img src="' + matches.homeTeam_image + '" alt="Home Team Image" height="30"> ' + matches.homeTeam_name + ' VS ' +
                                '<img src="' + matches.awayTeam_image + '" alt="Away Team Image" height="30"> ' + matches.awayTeam_name +
                                '</td>');
                            newRow.append('<td>' + matches.league + '</td>');
                            newRow.append('<td>' + localDateTime + '</td>');
                            newRow.append('<td>Not Found</td>');
                            newRow.append('<td>' + matches.localteam_score + ' - ' + matches.visitorteam_score + ' </td>');
                            newRow.append('<td>' + matches.match_status + '</td>');
                            newRow.append('<td>' +
                                '<a href="javascript:void(0)" class="tx-success match-edit" data-match_id="' + matches.fixture_id + '" data-match_title="' + matches.homeTeam_name + ' vs ' + matches.awayTeam_name + ' " ><i class="fa fa-edit"></i></a>' +
                                '</td>');

                            dataTable.row.add(newRow);
                        });
                    } else {
                    alert('No Data Found');

                    }

                    // Draw the table
                    dataTable.draw();
                },

                    error: function (data) {
                        alert('No Data Found');
                         dataTable.draw();
                    }
            });
        }

        $(document).on('click', '.match-edit', function () {
                var matchId = $(this).data('match_id');
                var matchTitle = $(this).data('match_title');
                $('#editmatchid').val('');
                $('#editmatchtitle').val('');
                $('#match-video').val('');

            $.ajax({
                url: baseurl + '/admin/matches/edit/' + matchId,
                type: 'GET',
                success: function (response) {
                    console.log(response);
                    if (response) {

            // Populate your modal fields with the match data
                $('#editmatchid').val(matchId);
                $('#editmatchtitle').val(matchTitle);
            
            // Check if the 'video' property exists and is not null
                    if (response.video !== '') {
                        $('#match-video').val(response.video);
                    }

                    $('#customModal').addClass('active');   


                        } else {
                        alert('Match not found.');
                    }
                },
                error: function () {
                    alert('Error fetching Match data.');
                }
            });
        });


        $('#updatematch').click(function (e) {
        e.preventDefault();
        $('#customModal').removeClass('active');   
        var fixtureID=$('#editmatchid').val();
        var title=$('#editmatchtitle').val();
        var video=$('#match-video').val();

        console.log(title);
        $.ajax({
            url: baseurl + '/admin/matches/update',
            type: 'POST',
            data: {
                        fixtureId: fixtureID,
                        editmatchtitle: title,
                        match_video: video,
                        // Add other fields as needed
                    },  
                    success: function (response) {
                if (response.success) {
                    swal({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                    }).then(function () {
                        // Close the modal and reset the form
                        // $('#editmatchModal').modal('hide');
                       
                        console.log(response); 
                       

                    });
                } else {
                    // Display an error SweetAlert
                    swal('Error', response.message, 'error');
                    $('#editmatchForm')[0].reset();
                }
            },
            error: function (xhr) {
                $('#editmatchForm')[0].reset();
                swal('Error', 'Please Try after Some time', 'error');
            }
        });
    });






    });
 
        //-------------------- For Getmatches End----------------------
        //-------------------- For WinnerList Start----------------------
        
$(document).on('click', '.userPrediction', function(e){
    $('#answerTableBody').empty();
    $('#loaderImg').show();

    e.preventDefault();
    var userid = $(this).data('userid');
    var first = $(this).data('start_date');
    var last = $(this).data('end_date');

    $.ajax({
        url: baseurl + '/predictionHistory/' + userid + '/' + first + '/' + last,
        method: 'GET',
        success: function (data) {
            console.log(data);
            $('#loaderImg').hide();

            // Clear previous content
            $('#cotestent').empty();

            // Check if history exists
            if (data.history.length == 0) {
                var noPlayerRow = 
                        '<td id="match">' +
                            '<div style="display: flex; line-height: 100px; align-items: center; justify-content: center;">' +
                                '<span style="color: red; font-size: 14px; font-weight: 100; letter-spacing: 1px;" id="noPlayerTxt">No Data Found</span>' +
                            '</div>' +
                        '</td>';
                    $('#answerTableBody').append(noPlayerRow);
                    return;

            }

            // Display user info
            // $('#cotestent').html(`
            //     <div id="cotestent" style="width: 100%;">
            //         <span>
            //             <img id="userImg" src="${data.history[0].user.img !== null ? data.user_image : baseurl + '/images/leaderboard/user_no_image.png'}"
            //             style="height: 22px; width: auto; float: left; margin-top: 20px; margin-left: 4px; margin-right: 9px;">
            //         </span>
            //         <span style="float: left;">
            //             <h2>
            //                 <span id="playtime">${data.history[0].user.created_at}</span>
            //             </h2>
            //         </span>
            //     </div>
            // `);

            // Create table heading
            var tableHeading = `
                <tr class="clr-aqua">
                    <th id="numberTitle">Match</th>
                    <th id="typeTitle">Type</th>
                    <th id="startTitle">Prediction Start Time</th>
                    <th id="endTitle">Prediction End Time</th>
                    <th id="joinTitle">Join Prediction</th>
                    <th id="joinTitle">Points</th>
                    <th id="actionTitle">Action</th>
                </tr>`;
            $('#answerTableBody').append(tableHeading);

            // Iterate through history data and generate rows
            $.each(data.history, function (index, history) {
                const formattedDate = new Date(history.created_at).toISOString().slice(0, 19).replace('T', ' ');
                var row = `
                    <tr class="wpos">
                        <td id="match" style="display:flex;width:100%;align-items: center;gap: 4px;">
                            <img src="${history.prediction.home_team_logo}" style="height: 50px; width: 39px;">
                            <div style=""> vs </div> 
                            <img src="${history.prediction.away_team_logo}" style="height: 50px; width: 39px;">
                        </td>
                        <td id="type">${history.pred_type}</td>
                        <td id="start">${history.prediction_start_time}</td>
                        <td id="end">${history.prediction_end_time}</td>
                        <td id="created">${formattedDate}</td>
                        <td id="created">${history.coin_won}</td>
                        <td id="action">
                           <button class="predAns" data-userid="${history.user_id}"  data-predid="${history.pred_id}" > <i class="fas fa-eye action-icon"></i></button> 
                        </td>
                    </tr>`;
                $('#answerTableBody').append(row);
            });
        },
        error: function(xhr, textStatus, errorThrown) {
            // Handle error and display 'No Data Found'
            var noPlayerRow = '<div style="display: flex; line-height: 100px; align-items: center; justify-content: center;">' +
                              '<span style="color: red; font-size: 14px; font-weight: 100; letter-spacing: 1px;" id="noPlayerTxt">No Data Found</span></div>';
            $('#answerTableBody').empty();
            $('#answerTableBody').append(noPlayerRow);
        }
    });
});
$(document).on('click', '.predAns', function(e){

    $('#answerBody').empty();
    $('#answer2').addClass('active');
    $('#cotestent').html('');
    e.preventDefault();
    var userId = $(this).data('userid');
    var predId = $(this).data('predid');

    $.ajax({
        url: baseurl +'/getUserQusAns',
        data: { userId, predId },
        method: 'POST',
        success: function (data) {
            console.log(data);

            if (data.questionAnswers.length == 0) {
                var noPlayerRow = '<div style="display: flex; line-height: 100px; align-items: center; justify-content: center;"><span style="color: red; font-size: 14px; font-weight: 100; letter-spacing: 1px;" id="noPlayerTxt"> No Data Found </span></div>';
                $('#answerBody').append(noPlayerRow);
                return;
            }
            $('#cotestent').html('<div id="cotestent" style="width: 100%;"><span><img id="userImg" src="' + (data.user_image !== null ? data.user_image : baseurl + '/images/leaderboard/user_no_image.png') + '" style="height: 22px; width: auto; float: left; margin-top: 20px; margin-left: 4px; margin-right: 9px;"></span><span style="float: left;"><h2><span id="playtime"> ' + data.created_at + '</span></h2></span></div>');


                $.each(data.questionAnswers, function (index, question) {
                    var row = '<tr class="wpos">' +
                        '<td id="number">' + (index + 1) + '</td>' +
                        '<td id="question">' + question.question + '</td>' +
                        '<td id="answer">';

                    if (index === 0) {
                        row += '<img src="' + question.homelogo + '" style="height: 15px; width: auto;">';
                        row += '<span> ' + question.home_score + ' - ' + question.away_score + '</span>';
                        row += '<img src="' + question.awaylogo + '" style="height: 15px; width: auto;">';
                    } else {
                        if (question.home_score == 1) {
                            row += '<img src="' + question.homelogo + '" style="height: 15px; width: auto;">';
                            row += '<span> (1) </span>';
                        } else if (question.away_score == 1) {
                            row += '<img src="' + question.awaylogo + '" style="height: 15px; width: auto;">';
                            row += '<span> (2) </span>';
                        } else if (question.neither == 1) {
                            row += '<span> (0) </span>';
                        } else {
                            row += '<span> (0) </span>';
                        }
                    }

                    row += '</td>' +
                        '</tr>';
                    $('#answerBody').append(row);
                });

            
        },
        error: function(xhr, textStatus, errorThrown) {
            $('#loaderIimg').hide();
            var noPlayerRow = '<div style="display: flex; line-height: 100px; align-items: center; justify-content: center;"><span style="color: red; font-size: 14px; font-weight: 100; letter-spacing: 1px;" id="noPlayerTxt"> No Data Found</span></div>';
            $('#answerBody').empty();
            $('#answerBody').append(noPlayerRow);
        }
    });
});















});

