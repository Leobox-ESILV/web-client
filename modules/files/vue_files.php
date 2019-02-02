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
                    <h2 class="page-header-title">Files</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.html"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Components</a></li>
                            <li class="breadcrumb-item active">Widgets</li>
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
                <div class="widget widget-16 has-shadow">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-xl-8 d-flex flex-column justify-content-center align-items-center">
                                <div class="counter">258,036</div>
                                <div class="total-views">Total Page Views</div>
                            </div>
                            <div class="col-xl-4 d-flex justify-content-center align-items-center">
                                <div class="pages-views">
                                    <div class="percent">
                                        <canvas id="today-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Widget 16 -->
            <!-- Begin Widget 17 -->
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="widget widget-17 has-shadow">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-xl-7 d-flex flex-column justify-content-center align-items-center">
                                <div class="counter">1,658</div>
                                <div class="total-visitors">Visitors Online</div>
                            </div>
                            <div class="col-xl-5 d-flex justify-content-center align-items-center">
                                <div class="visitors">
                                    <div class="percent"></div>
                                </div>
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
                        <h4>Leobox <?php echo "> ".str_replace('/',' > ',$_SESSION['current_path_file']); ?></h4>
                    </div>
                    <div class="widget-body">
                        <form id="upload_form" enctype="multipart/form-data" method="post">
                            <button type="button" onclick="create_folder()" class="btn btn-gradient-03 mr-1 mb-2"><i class="la la-plus-circle"></i> Create Folder</button>
                            <button type="button" value="Upload File" onclick="document.getElementById('file1').click()" class="btn btn-gradient-05 mr-1 mb-2"><i class="la la-cloud-upload"></i> Upload File</button>
                            <input type="file" style="display:none" name="file1" id="file1" class="btn btn-gradient-05 mr-1 mb-2">
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
                                            <th>Name</th>
                                            <th><i style="font-size:1rem;margin-right:5px;color:#98a8b4;" class="ti ti-harddrives"></i>Size</th>
                                            <th><i style="font-size:1rem;margin-right:5px;color:#98a8b4;" class="la ti-layout-tab"></i>Type</th>
                                            <th><i style="font-size:1rem;margin-right:5px;color:#98a8b4;" class="la ti-timer"></i>Modification</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $this->modele = new ModeleFiles();
                                        foreach ($listFiles['sub_dir'] as $info) {
                                        ?>
                                        <tr class="table_files" onclick="click_on_files('<?php echo $info['path_file']; ?>','<?php echo $info['type']; ?>','<?php echo $info['id']; ?>')">
                                            <td><i style="font-size:2.5rem;margin-right:5px;color:#242c31;" class="la <?php echo $this->modele->set_mime_type($info['mime_type']); ?>"></i><span class="text-primary"><?php echo $info['name']; ?></span></td>
                                            <td><?php echo $this->modele->formatBytes($info['size']); ?></td>
                                            <td><?php echo explode(',',$info['type'])[0]; ?></td>
                                            <td><?php echo date('d/m/Y H:i', $info['storage_mtime']); ?></td>
                                            <td id="td_actions">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-secondary"><i class="la la-share"></i>Share</button>
                                                    <a class="btn btn-secondary dropdown-toggle d-flex align-items-center" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="la la-angle-down mr-0"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#"><i class="la la-download"></i> Download</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-remove"></i> Delete</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#"><i class="la la-history"></i> Version History</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
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
        <script>
            $(document).ready(function() {
                $('#files-table').DataTable({
                    "paging": false,
                    "searching": false
                });

                $("#file1").change(function() {
                    uploadFile();
                });
            });

            function click_on_files(path_file,type,id){
                if(type=="Folder"){
                    window.open("index.php?module=files&open="+path_file,"_self");
                }else{
                    
                }
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
                                    console.log(response);
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

            function _(el) {
                return document.getElementById(el);
            }

            function uploadFile() {
                var file = _("file1").files[0];
                //alert(file.name+" | "+file.size+" | "+file.type);
                var formdata = new FormData();
                formdata.append("file1", file);
                formdata.append("action", "upload_file");
                var ajax = new XMLHttpRequest();
                $('#div_upload_bar').css("display", "block");
                $('#upload_file_name').css("display", "inline-block");
                $('#upload_file_name strong').text(file.name);
                ajax.upload.addEventListener("progress", progressHandler, false);
                ajax.addEventListener("load", completeHandler, false);
                ajax.addEventListener("error", errorHandler, false);
                ajax.addEventListener("abort", abortHandler, false);
                ajax.open("POST", "./modules/files/ajax_handle_files.php");
                ajax.send(formdata);
            }

            function formatBytes(bytes,decimals) {
                if(bytes == 0) return '0 Bytes';
                var k = 1024,
                    dm = decimals <= 0 ? 0 : decimals || 2,
                    sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'],
                    i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
            }


            function progressHandler(event) {
                _("loaded_n_total").innerHTML = "Uploaded " + formatBytes(event.loaded) + "/" + formatBytes(event.total);
                var percent = (event.loaded / event.total) * 100;
                //_("progressBar").value = Math.round(percent);
                var actuel_percent = Math.round(percent)+"%";
                $('#upload_bar').css("width", actuel_percent);
                $('#upload_bar').text(actuel_percent);
            }

            function completeHandler(event) {
                var response = jQuery.parseJSON(event.target.responseText);
                if(response.is_status==200){
                    Swal.fire({
                        type: 'success',
                        title: 'File successfully uploaded',
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
            }

            function errorHandler(event) {
                Swal.fire({
                    type: 'error',
                    title: "Upload Failed",
                })
            }

            function abortHandler(event) {
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

