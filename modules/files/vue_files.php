<?php

require_once (dirname(__FILE__,3)."/modules/files/modele_files.php");
require_once (dirname(__FILE__,3)."/include/vue_generique.php");

class VueFiles extends VueGenerique {

    public function __construct() {
        parent::__construct();
		
    }


    public function vue_files($listFiles){
    	?>
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">My Files</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active"><i class="ti ti-home"></i></li>
                            <li class="breadcrumb-item"><a href="#">My Files</a></li>
                            <li class="breadcrumb-item"><a href="#">Shared</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <!-- Begin Row -->
        <div class="row flex-row">
            <!-- Begin Widget 16 -->
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="widget widget-16" style="background:transparent">
                    <div>
                        <div class="row">
                            <div class="col-xl-8 d-flex flex-column justify-content-center align-items-center">
                                <div class="counter"><?php echo $_SESSION['used_space']; ?></div>
                                <div class="total-views">Used space (Total space : <?php echo $_SESSION['quota']; ?>)</div>
                            </div>
                            <div class="col-xl-4 d-flex justify-content-center align-items-center">
                                <div class="pages-views" id="circle_used_space">
                                    <div class="percent"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Widget 16 -->
            <!-- Begin Widget 17 -->
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="widget widget-12 has-shadow">
                    <div class="widget-body">
                        <div class="media">
                            <div class="align-self-center ml-5 mr-5">
                                <i class="ti ti-folder"></i>
                            </div>
                            <div class="media-body align-self-center">
                                <div class="title"><?php echo $_SESSION['dir_count'] ?></div>
                                <div class="number">Folder(s)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="widget widget-12 has-shadow">
                    <div class="widget-body">
                        <div class="media">
                            <div class="align-self-center ml-5 mr-5">
                                <i class="ti ti-files"></i>
                            </div>
                            <div class="media-body align-self-center">
                                <div class="title"><?php echo $_SESSION['file_count'] ?></div>
                                <div class="number">File(s)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Widget 17 -->
        </div>
        <!-- End Row -->
        <!-- Begin Row -->
        <div class="row flex-row">
            <!-- Begin Widget 20 -->
            <div class="col-xl-12">
                <!-- Begin Widget Header -->
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4>Leobox <?php if(strlen($_SESSION['current_path_file'])>=2){ echo "> ".str_replace('/',' > ',$_SESSION['current_path_file']); } ?></h4>
                    </div>
                    <div class="widget-body">
                        <form id="upload_form" enctype="multipart/form-data" method="post">
                            <button type="button" onclick="create_folder()" class="btn btn-gradient-03 mr-1 mb-2"><i class="la la-plus-circle"></i> Create Folder</button>
                            
                            <button type="button" value="Upload File" onclick="document.getElementById('file1').click()" class="btn btn-gradient-05 mr-1 mb-2"><i class="la la-file"></i> Upload File</button>
                            <input type="file" style="display:none" name="file1" id="file1" class="btn btn-gradient-05 mr-1 mb-2">
                            
                            <button type="button" value="Upload Folder" onclick="document.getElementById('folder1').click()" class="btn btn-gradient-04 mr-1 mb-2"><i class="la la-folder-open"></i> Upload Folder</button>
                            <input type="file" style="display:none" name="files[]" id="folder1" multiple="" directory="" webkitdirectory="" mozdirectory="">
                            
                            <div id="upload_file_name" style="display:none" class="alert alert-outline-primary dotted" role="alert">
                                <strong></strong> wait uploading......
                            </div>
                            <div class="progress progress-lg mb-3" id="div_upload_bar" style="display:none">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" id="upload_bar" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%</div>
                            </div>
                            <p id="loaded_n_total"></p>
                        </form>
                        <?php
                        if (empty($listFiles['sub_dir'])) {
                        ?>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="widget widget-17 has-shadow">
                                    <div class="widget-body">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 d-flex flex-column justify-content-center align-items-center">
                                                <div class="counter">You have nothing yet in this space</div>
                                                <div class="total-visitors">Use the buttons above to create folder or upload file (drag and drop also works)</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }else{
                        ?>
                            <div class="table-responsive">
                                <table id="files-table" class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th><i style="font-size:1rem;margin-right:5px;color:#98a8b4;" class="ti ti-bookmark-alt"></i>Name</th>
                                            <th><i style="font-size:1rem;margin-right:5px;color:#98a8b4;" class="ti ti-harddrives"></i>Size</th>
                                            <th><i style="font-size:1rem;margin-right:5px;color:#98a8b4;" class="ti ti-layout-tab"></i>Type</th>
                                            <th><i style="font-size:1rem;margin-right:5px;color:#98a8b4;" class="ti ti-timer"></i>Modification</th>
                                            <th><i style="font-size:1rem;margin-right:5px;color:#98a8b4;" class="ti ti-layout-grid2"></i>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $this->modele = new ModeleFiles();
                                        foreach ($listFiles['sub_dir'] as $info) {
                                        ?>
                                        <tr class="table_files" onclick="click_on_row('<?php echo $info['path_file']; ?>','<?php echo $info['id']; ?>','<?php echo $info['mime_type']; ?>')">
                                            <td><i style="font-size:2.5rem;margin-right:5px;color:#242c31;" class="la <?php echo $this->modele->set_mime_type($info['mime_type']); ?>"></i><span class="text-primary"><?php echo $info['name']; ?></span></td>
                                            <td><?php echo $this->modele->formatBytes($info['size']); ?></td>
                                            <td><?php echo explode(',',$info['type'])[0]; ?></td>
                                            <td><?php echo date('d/m/Y H:i', $info['storage_mtime']); ?></td>
                                            <td id="td_actions">
                                                <div class="btn-group">
                                                    <button type="button" onclick="click_shared('<?php echo $info['id']; ?>','<?php echo $info['name']; ?>')" class="btn btn-secondary"><i class="la la-share"></i>Share</button>
                                                    <a class="btn btn-secondary dropdown-toggle d-flex align-items-center" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="la la-angle-down mr-0"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                    <?php 
                                                    if(!strstr($info['mime_type'],'directory')){
                                                    ?>
                                                        <a class="dropdown-item" onclick="click_download_file('<?php echo $info['path_file']; ?>','<?php echo $info['id']; ?>','<?php echo $info['mime_type']; ?>')"><i class="la la-download"></i> Download</a>
                                                    <?php 
                                                    }
                                                    ?>
                                                        <a class="dropdown-item" onclick="click_rename('<?php echo $info['id']; ?>','<?php echo $info['name']; ?>')"><i class="la la-wrench"></i> Rename</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" onclick="click_delete('<?php echo $info['id']; ?>','<?php echo $info['name']; ?>')"><i class="la la-remove"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th><i style="font-size:1rem;margin-right:5px;color:#98a8b4;" class="ti ti-harddrives"></i>Size</th>
                                            <th><i style="font-size:1rem;margin-right:5px;color:#98a8b4;" class="la ti-layout-tab"></i>Type</th>
                                            <th><i style="font-size:1rem;margin-right:5px;color:#98a8b4;" class="la ti-timer"></i>Modification</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- End Widget 20 -->
        </div>
        <!-- End Row -->
        </div>
        <!-- Begin Vendor Js -->
        <script src="assets/vendors/js/base/jquery.min.js"></script>
        <script src="assets/vendors/js/progress/circle-progress.min.js"></script>
        <script>

            let SIZE_LISTFILES = 0;

            function _(el) {
                return document.getElementById(el);
            }

            function loader_call(){
				window.Swal.fire({
					title: "Loading...",
					text: "Please wait",
					imageUrl: "https://wpamelia.com/wp-content/uploads/2018/11/ezgif-2-6d0b072c3d3f.gif",
					showConfirmButton: false,
					allowOutsideClick: false
				});
			}

            var percent_used = <?php echo $_SESSION['percent_used'] ?>;

            var color_circle = []
            if(percent_used<50){
                color_circle = ["#99ffcc", "#009933"]
            }else if (percent_used<80){
                color_circle = ["#ffff66", "#ff9900"]
            }else{
                color_circle = ["#ff9999", "#cc0000"]
            }

            $("#circle_used_space").circleProgress({
                value: percent_used/100,
                size: 100,
                startAngle: -Math.PI / 2,
                thickness: 10,
                lineCap: "round",
                emptyFill: "#f0eff4",
                fill: {
                    gradient: color_circle
                }
            }).on("circle-animation-progress", function(f, e) {
                $(this).find(".percent").html(Math.round(percent_used * e) + "<i>%</i>")
            });

            $(document).ready(function() {
                // Setup - add a text input to each footer cell
                $('#files-table tfoot th').each( function () {
                    var title = $(this).text();
                    if($(this).text()!=""){
                        $(this).html( '<input class="form-control form-control-sm" type="text" placeholder="Search '+title+'" />' );
                    }
                });
            
                // DataTable
                var file_datatable = $('#files-table').DataTable({
                    "pageLength": 25
                });

                $(".dataTables_filter").hide();
                $(".dataTables_length").hide();
                $("#files-table tr").css('cursor', 'pointer');
            
                // Apply the search
                file_datatable.columns().every( function () {
                    var that = this;
                    $( 'input', this.footer() ).on( 'keyup change', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    });
                });

                $('#files-table tfoot tr').insertAfter($('#files-table thead tr'))

                $("#file1").change(function() {
                    uploadFile();
                });

                $("#folder1").change(function() {
                    var folder = _("folder1").files;
                    SIZE_LISTFILES = folder.length-1;
                    uploadFolder(0);
                });
            });

            function click_on_row(path_file,id,mime_type){
                closet_click_td = $(event.target).closest('td').attr('id');
                if(closet_click_td!="td_actions"){
                    if(mime_type.includes('directory')){
                        window.open("index.php?module=files&open="+path_file,"_self");
                    }else if(mime_type.includes('image') || mime_type.includes('text') || mime_type.includes('pdf')){
                        open_file(id,mime_type,path_file)
                    }else{
                        Swal.fire({
                            type: 'error',
                            title: 'This format is not supported',
                        })
                    }
                }
            }

            function click_download_file(path_file,id,mime_type){
                loader_call();
                $.ajax({
                    type: "POST",
                    data: {
                        action:"openDownload_file",
                        id_file:id
                    },
                    url: "./modules/files/ajax_handle_files.php",
                    success: function(data) {
                        Swal.close();
                        var a = document.createElement('a');
                        a.href= "data:application/octet-stream;base64,"+data;
                        a.target = '_blank';
                        a.download = path_file.split("/").pop(-1);
                        a.click();
                    }
                });
            }

            function click_rename(id_file,name_file){
                Swal.fire({
                    title: 'Rename File',
                    html: '<p>Current name : '+name_file.split(".")[0]+'</p>',
                    input: 'text',
                    type: 'info',
                    inputAttributes: {
                        autocapitalize: 'off'
                    },
                    showCancelButton: true,
                    confirmButtonText:
                    '<i class="la la-wrench"></i> Rename',
                    cancelButtonText:
                    '<i class="la la-remove"></i> Cancel',
                    showLoaderOnConfirm: true,
                    }).then((result) => {
                        if(typeof result.value !== "undefined"){
                            var new_name = result.value;
                            if(name_file.includes('.')){
                                new_name = result.value+'.'+name_file.split(".")[1]
                            }
                            $.ajax({
                                type: "POST",
                                data: {
                                    action:"rename",
                                    id_file:id_file,
                                    new_name:new_name
                                },
                                url: "./modules/files/ajax_handle_files.php",
                                async: false,
                                success: function(data) {
                                    var response = jQuery.parseJSON(data);
                                    if(response.is_status==200){
                                        Swal.fire({
                                            type: 'success',
                                            title: 'Rename successfully file !',
                                            showConfirmButton: false,
                                            timer: 1500
                                        })
                                        setTimeout(() => {
                                            location.reload();
                                        }, 1500);
                                    }else{
                                        Swal.fire({
                                            type: 'error',
                                            title: response.comment,
                                        })
                                    }
                                }
                            });
                        }    
                    })
            }

            function click_delete(id_file,name_file){
                Swal.fire({
                title: 'Are you sure ?',
                html: "<p>You won't be able to revert this !</p><p style='font-weight:bold;'>"+name_file+"</p>",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if(result.value){
                            $.ajax({
                                type: "POST",
                                data: {
                                    action:"delete",
                                    id_file:id_file
                                },
                                url: "./modules/files/ajax_handle_files.php",
                                async: false,
                                success: function(data) {
                                    var response = jQuery.parseJSON(data);
                                    if(response.is_status==200){
                                        Swal.fire({
                                            type: 'success',
                                            title: 'Delete successfully file !',
                                            showConfirmButton: false,
                                            timer: 1500
                                        })
                                        setTimeout(() => {
                                            location.reload();
                                        }, 1500);
                                    }else{
                                        Swal.fire({
                                            type: 'error',
                                            title: response.comment,
                                        })
                                    }
                                }
                            });
                        }    
                    })
            }

            function click_shared(id_file,name_file){
                
                var json_list_user = {}
                var user_name = "<?php echo $_SESSION['display_name'] ?>";
                
                $.ajax({
                    type: "POST",
                    data: {
                        action:"get_userToShare"
                    },
                    url: "./modules/files/ajax_handle_files.php",
                    async: false,
                    success: function(data) {
                        var response = jQuery.parseJSON(data);
                        var list_user = response.list_name
                        for (i in list_user){
                            if(user_name!=list_user[i].display_name){
                                json_list_user[list_user[i].display_name] = list_user[i].display_name
                            }
                        }
                    }
                });

                Swal.fire({
                    title: name_file,
                    input: 'select',
                    inputOptions: json_list_user,
                    inputPlaceholder: 'Click for select a user',
                    showCancelButton: true,
                    imageUrl: 'https://cdn0.iconfinder.com/data/icons/social-media-2183/512/social__media__social_media__share_-256.png',
                    imageAlt: 'Custom image',
                    confirmButtonText: "Share",
                    inputValidator: function (value) {
                        return new Promise(function (resolve, reject) {
                        if (value !== '') {
                            resolve();
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'No user selected',
                            })
                        }
                        });
                    }
                    }).then(function (result) {
                        if (result.value) {
                            var user_toshare = result.value;
                            $.ajax({
                                type: "POST",
                                data: {
                                    action:"set_userToShare",
                                    user_toshare: user_toshare,
                                    id_file: id_file
                                },
                                url: "./modules/files/ajax_handle_files.php",
                                async: false,
                                success: function(data) {
                                    var response = jQuery.parseJSON(data);
                                    if(response.is_status==200){
                                        Swal.fire({
                                            type: 'success',
                                            title: 'File/Folder successfully shared !',
                                            showConfirmButton: false,
                                            timer: 1500
                                        })
                                    }else{
                                        Swal.fire({
                                            type: 'error',
                                            title: response.comment,
                                        })
                                    }
                                }
                            });
                        }
                    });
            }
            
            function open_file(id,mime_type,path_file){
                loader_call();
                $.ajax({
                    type: "POST",
                    data: {
                        action:"openDownload_file",
                        id_file:id
                    },
                    url: "./modules/files/ajax_handle_files.php",
                    success: function(data) {
                        Swal.close();
                        if(mime_type.includes('image')){
                            var image = new Image();
                            image.src = 'data:'+mime_type+';base64,'+data;
                            image.alt = path_file.split("/").pop(-1);
                            $(image).viewer('show');
                        }else if(mime_type.includes('pdf') || mime_type.includes('text')) {
                            let pdfWindow =  window.open('');
                            var name_file = path_file.split("/").pop(-1);
                            pdfWindow.document.write('<html><head><title>'+name_file+'</title></head><body height="100%" width="100%"><iframe src="data:'+mime_type+';base64, '+encodeURI(data)+'" height="97%" width="100%"></iframe></body></html>');
                        }
                    }
                });
            }
            
            function create_folder(){
                var nameFolder = ""
                Swal.fire({
                    title: 'Create Folder',
                    html: '<p>Enter the name of the folder you want to create :</p>\n'+
                    '<p style="font-size:1rem;color:#98a8b4;">If you want to create directories recursively: folder1/folder2/...</p>',
                    input: 'text',
                    inputAttributes: {
                        autocapitalize: 'off'
                    },
                    showCancelButton: true,
                    confirmButtonText:
                    '<i class="la la-send"></i> Create',
                    cancelButtonText:
                    '<i class="la la-remove"></i> Cancel',
                    showLoaderOnConfirm: true,
                    }).then((result) => {
                        if(typeof result.value !== "undefined"){
                            $.ajax({
                                type: "POST",
                                data: {
                                    action:"create_folder",
                                    name_folder:result.value
                                },
                                url: "./modules/files/ajax_handle_files.php",
                                async: false,
                                success: function(data) {
                                    var response = jQuery.parseJSON(data);
                                    if(response.is_status==200){
                                        Swal.fire({
                                            type: 'success',
                                            title: 'Folder successfully create',
                                            showConfirmButton: false,
                                            timer: 1500
                                        })
                                        setTimeout(() => {
                                            location.reload();
                                        }, 1500);
                                    }else{
                                        Swal.fire({
                                            type: 'error',
                                            title: response.comment,
                                        })
                                    }
                                }
                            });
                        }    
                    })
            }

            function uploadFolder(index) {
                var folder = _("folder1").files;
                var formdata = new FormData();
                var path_split = folder[index].webkitRelativePath.lastIndexOf("/");
                var folder_source = folder[index].webkitRelativePath.slice(0,path_split+1);
                formdata.append("file1", folder[index]);
                formdata.append("folder_source", folder_source);
                formdata.append("action", "upload_folder");
                var ajax = new XMLHttpRequest();
                $('#div_upload_bar').css("display", "block");
                $('#upload_file_name').css("display", "inline-block");
                $('#upload_file_name strong').text((index+1)+"/"+(SIZE_LISTFILES+1)+" "+folder[index].name);
                ajax.currentIndex = index;
                ajax.filename = 'Folder';
                ajax.upload.addEventListener("progress", progressHandler, false);
                ajax.addEventListener("load", completeHandler, false);
                ajax.addEventListener("error", errorHandler, false);
                ajax.addEventListener("abort", abortHandler, false);
                ajax.open("POST", "./modules/files/ajax_handle_files.php");
                ajax.send(formdata);
            }

            function uploadFile() {
                var file = _("file1").files[0];
                var formdata = new FormData();
                formdata.append("file1", file);
                formdata.append("action", "upload_file");
                var ajax = new XMLHttpRequest();
                $('#div_upload_bar').css("display", "block");
                $('#upload_file_name').css("display", "inline-block");
                $('#upload_file_name strong').text(file.name);
                ajax.filename = 'File';
                ajax.upload.addEventListener("progress", progressHandler, false);
                ajax.addEventListener("load", completeHandler, false);
                ajax.addEventListener("error", errorHandler, false);
                ajax.addEventListener("abort", abortHandler, false);
                ajax.open("POST", "./modules/files/ajax_handle_files.php");
                ajax.send(formdata);
            }

            function formatBytes(bytes,decimals) {
                if(bytes == 0) return '0 Bytes';
                var k = 1000,
                    dm = decimals <= 0 ? 0 : decimals || 2,
                    sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'],
                    i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
            }


            function progressHandler(event) {
                _("loaded_n_total").innerHTML = "Uploaded " + formatBytes(event.loaded) + "/" + formatBytes(event.total);
                var percent = (event.loaded / event.total) * 100;
                var actuel_percent = Math.round(percent)+"%";
                $('#upload_bar').css("width", actuel_percent);
                $('#upload_bar').text(actuel_percent);
            }

            function completeHandler(event) {
                if(event.target.currentIndex<SIZE_LISTFILES){
                    var nextIndex = event.target.currentIndex+1;
                    uploadFolder(nextIndex);
                }else{
                    var response = jQuery.parseJSON(event.target.responseText);
                    if(response.is_status==200){
                        Swal.fire({
                            type: 'success',
                            title: event.target.filename+' successfully uploaded',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    }else{
                        Swal.fire({
                            type: 'error',
                            title: response.comment,
                        })
                    }
                    $('#upload_bar').css("width", "0%");
                    $('#upload_bar').text("0%");
                    $('#div_upload_bar').css("display", "none");
                    $('#upload_file_name').css("display", "none");
                    _("loaded_n_total").innerHTML = ""
                }
            }

            function errorHandler(event) {
                $('#div_upload_bar').css("display", "none");
                $('#upload_file_name').css("display", "none");
                _("loaded_n_total").innerHTML = ""
                Swal.fire({
                    type: 'error',
                    title: "Upload Failed",
                })
            }

            function abortHandler(event) {
                $('#div_upload_bar').css("display", "none");
                $('#upload_file_name').css("display", "none");
                _("loaded_n_total").innerHTML = ""
                Swal.fire({
                    type: 'error',
                    title: "Upload Aborted",
                })
            }
        </script>
    	<?php 
    }


    public function insertion_reussi(){
        echo '<script language="javascript">';
        echo 'alert("Files ajoutée !")';
        echo '</script>';
    }

    public function champs_vide(){
        echo '<script language="javascript">';
        echo 'alert("Erreur! Veuillez remplir tous les champs")';
        echo '</script>';
    }
}

?>

