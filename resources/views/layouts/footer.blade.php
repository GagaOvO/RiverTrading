<!-- END wrapper -->

            <script>
            var resizefunc = [];
        </script>

<script>
    var resizefunc = [];
</script>



<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>

<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>

<script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables/buttons.bootstrap.min.js"></script>
<script src="assets/plugins/datatables/jszip.min.js"></script>
<script src="assets/plugins/datatables/pdfmake.min.js"></script>
<script src="assets/plugins/datatables/vfs_fonts.js"></script>
<script src="assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables/buttons.print.min.js"></script>
<script src="assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
<script src="assets/plugins/datatables/dataTables.keyTable.min.js"></script>
<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>
<script src="assets/plugins/datatables/dataTables.scroller.min.js"></script>
<script src="assets/plugins/datatables/dataTables.colVis.js"></script>
<script src="assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>

<script src="assets/pages/datatables.init.js"></script>

<script type="text/javascript">
$('#datatable').dataTable( {
    "order": [[ 0, 'desc' ]]
} );
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable-keytable').DataTable({keys: true});
        $('#datatable-responsive').DataTable();
        $('#datatable-colvid').DataTable({
            "dom": 'C<"clear">lfrtip',
            "colVis": {
                "buttonText": "Change columns"
            }
        });
        $('#datatable-scroller').DataTable({
            ajax: "assets/plugins/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });
        var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
        var table = $('#datatable-fixed-col').DataTable({
            scrollY: "300px",
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            fixedColumns: {
                leftColumns: 1,
                rightColumns: 1
            }
        });
    });
    TableManageButtons.init();

</script>

    <script>
    
    $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text(" Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').removeClass('delete');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        var stuff = $(this).data('info').split(',');
        fillmodalData(stuff)
        $('#myModal').modal('show');
    });
    function fillmodalData(details){
        $('#fid').val(details[0]);
        $('#item_code').val(details[1]);
        $('#item_name').val(details[2]);
        $('#item_desc').val(details[3]);
        $('#item_size').val(details[4]);
        $('#cartons').val(details[5]);
        $('#piece_per_carton').val(details[6]);
        $('#total').val(details[7]);
        $('#origin').val(details[8]);
        $('#approved_by').val(details[9]);
        $('#comment').val(details[10]);
    }

    $('.modal-footer').on('click', '.edit', function() {
        $.ajax({
            type: 'post',
            url: '/editItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'item_code': $('#item_code').val(),
                'item_name': $('#item_name').val(),
                'item_desc': $('#item_desc').val(),
                'item_size': $('#item_size').val(),
                'cartons': $('#cartons').val(),
                'piece_per_carton': $('#piece_per_carton').val(),
                'total': $('#total').val(),
                'origin': $('#origin').val(),
                'approved_by': $('#approved_by').val(),
                'comment': $('#comment').val()
            },
            success: function(data) {
                $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" +
                    data.id + "</td><td>" + data.item_code +
                    "</td><td>" + data.item_name + "</td><td>" + data.item_desc + "</td><td>" +
                     data.item_size + "</td><td>" + data.cartons + "</td><td>" + data.piece_per_carton +
                      "</td><td>"+ data.total + "</td><td>"+ data.origin + "</td><td>"+ data.approved_by + "</td><td>"+ data.comment + "</td><td><button class='edit-modal btn btn-info' data-info='" + data.id+","+data.item_code+","+data.item_name+","+data.item_desc+","+data.item_size+","+data.cartons+","+data.piece_per_carton+","+data.total+","+data.origin+","+data.approved_by+","+data.comment+"'><span class='glyphicon glyphicon-edit'></span> Edit</button></td></tr>");

                }
        });
    });
</script>


