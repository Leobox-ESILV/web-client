<?php

require_once (dirname(__FILE__,3)."/modules/myview/modele_myview.php");
require_once (dirname(__FILE__,3)."/include/vue_generique.php");

class VueMyview extends VueGenerique {

    public function __construct() {
        parent::__construct();
		
    }


    public function vue_myview(){
    	?>
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">My Folder View Tree</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active"><i class="ti ti-home"></i></li>
                            <li class="breadcrumb-item"><a href="index.php?module=myview">My Files</a></li>
                            <li class="breadcrumb-item"><a href="index.php?module=sharedme">Shared with me</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <!-- Begin Row -->
        <div class="row flex-row">
            <div class="col-xl-12 col-md-6">
                <!-- Begin Widget 09 -->
                <div class="widget widget-09 has-shadow">
                    <!-- Begin Widget Header -->
                    <div class="widget-header d-flex align-items-center">
                        <h2>You have a complete view of your storage below</h2>
                        <div class="widget-options">
                            <button id="button_viewall" onclick="jstreeToggleState()" type="button" class="btn btn-shadow">Open All Tree</button>
                        </div>
                    </div>
                    <!-- End Widget Header -->
                    <!-- Begin Widget Body -->
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-xl-12 col-10">
                                <div>
                                    <div id="jstree_filebrowser"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Widget 09 -->
            </div>
        </div>
        <!-- Begin Vendor Js -->
        <script src="assets/vendors/js/base/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
        <script>
            var $treeview = $("#jstree_filebrowser");
            $treeview.jstree({
                'core' : {
                    'data' : {
                        "url" : "./modules/myview/ajax_handle_myview.php",
                        "dataType" : "json" // needed only if you do not supply JSON headers
                    },
                    'plugins': ["wholerow"],
                    'check_callback' : function(o, n, p, i, m) {
							if(m && m.dnd && m.pos !== 'i') { return false; }
							if(o === "move_node" || o === "copy_node") {
								if(this.get_node(n).parent === this.get_node(p).id) { return false; }
							}
							return true;
						},
                    'force_text' : true,
                    'themes' : {
                        'responsive' : false,
                        'variant' : 'large'
                        /* 'stripes' : true */
                    }
                }
            });

            var isTreeOpen = false;

            function jstreeToggleState() {
                if(isTreeOpen){
                    $treeview.jstree('close_all');
                    $('#button_viewall').html('Open All Tree');
                }else{
                    $treeview.jstree('open_all');
                    $('#button_viewall').html('Close All Tree');
                }    
                isTreeOpen =! isTreeOpen; 
            }
        </script>
    	<?php 
    }
}

?>

