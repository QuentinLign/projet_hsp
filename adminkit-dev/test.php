<?php
global $wpdb;
$result = $wpdb->get_results ( "SELECT * FROM lca_library" );
$dataset = "[";
foreach ( $result as $print )   {
    $dataset .= "[";
    $dataset .= '"'.$print->id.'",';
    $dataset .= '"'.$print->category.'",';
    $dataset .= '"'.$print->subject.'",';
    $dataset .= '"'.$print->link.'",';
    $dataset .= '"'.$print->document.'",';
    $dataset .= '"'.$print->content.'",';
    $dataset .= "],";
}
$dataset = rtrim($dataset, ',');
$dataset .= "]";
?>

<script>
    jQuery(document).ready(function() {
        jQuery('#library').DataTable( {
            data: <?php echo $dataset; ?>,
            responsive: true,
            autoWidth: true,
            searching: true,
            columns: [
                { title: "Entry" },
                { title: "Category" },
                { title: "Subject" },
                { title: "Link" },
                { title: "Document" },
                { title: "Content" },
                { title: "", "defaultContent": "<button onclick='edititem();'>Edit</button>" },
                { title: "", "defaultContent": "<button onclick='deleteitem();'>Delete</button>" }
            ],
            "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                nRow.setAttribute('id',aData[0]);
            },
            // dom: 'id',
            dom: 'Bfrtip',
            buttons: [
                'pdf',
                'excel',
                'print',
                'csv'
            ]
        } );
    } );

    function edititem() {
        jQuery('#library tr').click(function(e) {
            e.stopPropagation();
            var $this = jQuery(this);
            var trid = $this.closest('tr').attr('id');
            var x = 0, y = 0; // default values
            x = window.screenX +5;
            y = window.screenY +275;
            window.open('../DataTables/editlibrary.php?id='+trid,'editlibrary','toolbar=0,scrollbars=1,height=600,width=800,resizable=1,left='+x+',screenX='+x+',top='+y+',screenY='+y);
        });
    }

    function deleteitem() {
        alert('delete');
    }

</script>

<div style="margin-left: 10px; margin-right: 20px;">
    <table id="library"></table>
</div>