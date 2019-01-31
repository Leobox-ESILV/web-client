<?php

require_once (dirname(__FILE__,3)."./modules/files/modele_files.php");
require_once (dirname(__FILE__,3)."./include/vue_generique.php");

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
                        <button type="button" onclick="create_folder()" class="btn btn-gradient-03 mr-1 mb-2"><i class="la la-plus-circle"></i> Create Folder</button>
                        <button type="file" class="btn btn-gradient-05 mr-1 mb-2"><i class="la la-cloud-upload"></i> Upload File</button>
                        <form id="upload_form" enctype="multipart/form-data" method="post">
                            <input type="file" name="file1" id="file1"><br>
                            <input type="button" value="Upload File" onclick="uploadFile()">
                            <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
                            <h3 id="status"></h3>
                            <p id="loaded_n_total"></p>
                        </form>
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
                                    foreach ($listFiles as $info) {
                                    ?>
                                    <tr class="table_files" onclick="click_on_files('<?php echo $info['path_file']; ?>')">
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
                                                    <a class="dropdown-item" href="#">Download</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Version History</a>
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
                    </div>
                </div>
            </div>
            <!-- End Widget 20 -->
        </div>
        <!-- End Row -->
        <!-- Begin Row -->
        <div class="row flex-row">
            <!-- Begin Widget 23 -->
            <div class="col-xl-4">
                <div class="widget widget-23 bg-gradient-02 d-flex justify-content-center align-items-center">
                    <div class="widget-body text-center">
                        <i class="ti ti-zip"></i>
                        <div class="title">Archive Title</div>
                        <div class="number">Download Archive</div>
                        <div class="text-center mt-3 mb-3">
                            <button type="button" class="btn btn-outline-light">
                                Download
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Widget 23 -->
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
            });

            function click_on_files(path_file){
                window.open("index.php?module=files&dir="+path_file,"_self");
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
                // alert(file.name+" | "+file.size+" | "+file.type);
                var formdata = new FormData();
                formdata.append("file1", file);
                var ajax = new XMLHttpRequest();
                ajax.upload.addEventListener("progress", progressHandler, false);
                ajax.addEventListener("load", completeHandler, false);
                ajax.addEventListener("error", errorHandler, false);
                ajax.addEventListener("abort", abortHandler, false);
                ajax.open("POST", "./modules/files/ajax_handle_files.php");
                console.log(formdata);
                ajax.send(formdata);
            }

            function progressHandler(event) {
                _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
                var percent = (event.loaded / event.total) * 100;
                _("progressBar").value = Math.round(percent);
                _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
            }

            function completeHandler(event) {
                _("status").innerHTML = event.target.responseText;
                _("progressBar").value = 0;
            }

            function errorHandler(event) {
                _("status").innerHTML = "Upload Failed";
            }

            function abortHandler(event) {
                _("status").innerHTML = "Upload Aborted";
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

