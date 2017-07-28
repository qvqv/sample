<script type="text/javascript" src="/web/js/DataTables/js/jquery.dataTables.min.js"></script>
<link href="/web/js/DataTables/css/demo_table.css" rel="stylesheet" type="text/css" />
<link href="/web/js/DataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#listTable').dataTable({
            "iDisplayLength": 100,
            "sPaginationType": 'full_numbers',
            "order": [[0, "desc"]],
            "oLanguage": {
                "sLengthMenu": '<select>' +
                    '<option value="10">10</option>' +
                    '<option value="25">25</option>' +
                    '<option value="50">50</option>' +
                    '<option value="100">100</option>' +
                    '<option value="-1">全件</option>' +
                    '</select> 件',
                "oPaginate": {
                    "sNext": "次へ",
                    "sPrevious": "前へ",
                    "sFirst": "先頭",
                    "sLast": "最終"
                },
                "sInfo": "全_TOTAL_件中 _START_件から_END_件を表示",
                "sSearch": "検索：",
                "sProcessing": "しばらくお待ちください",
                "sInfoEmpty": "0件",
                "sEmptyTable": "データがありません",
                "sZeroRecords": "検索データがありません",
                "sInfoFiltered": ""
            },
            "aoColumnDefs": [
                {"bSortable": false, "aTargets": [0, 2]}
            ]
        });

    });
</script>
<style type="text/css">
    <!--
    #sortable tr:hover { cursor: move; }
    -->
</style>