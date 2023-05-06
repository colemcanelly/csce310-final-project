<!-- All Written By: Cole McAnelly
  This file is similar to components/calendar/calendar.php,
  but is the large table displayed for the Admin to view the events
  created by ALL the users. It does not give the Admin permission to edit or delete events.
-->
<div id="table-container" class="mt-5">
  <table
    id="table"
    data-search="true"
    data-click-to-select="true"
    data-detail-formatter="detailFormatter"
    data-minimum-count-columns="2"
    data-pagination="true"
    data-id-field="id"
    data-page-list="[10,25,50,100,all]"
    data-side-pagination="server"
    data-url="./api/manager_events.php"
    data-response-handler="responseHandler">
  </table>
</div>

<style>
  .edit {
    margin-right: 10px;
  }

  #table-container {
    height: 84vh;
    width: 1100px;
  }
</style>

<link href="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.css" rel="stylesheet">

<script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.21.4/dist/extensions/export/bootstrap-table-export.min.js"></script>

<script>
  var $table = $('#table')

  function responseHandler(res) {
    $.each(res.rows, (i, row) => {
      row.state = $.inArray(row.id, selections) !== -1
    })
    return res
  }

  function initTable() {
    $table.bootstrapTable('destroy').bootstrapTable({
      columns: [
        [{
            title: 'Event ID',
            field: 'eventId',
            rowspan: 2,
            align: 'center',
            valign: 'middle',
            sortable: true,
          },
          {
            title: 'Event Details',
            colspan: 6,
            align: 'center'
          }
        ],
        [{
            field: 'title',
            title: 'Event Title',
            sortable: true,
            align: 'center'
          },
          {
            field: 'foodId',
            title: 'Food ID',
            align: 'center'
          },
          {
            field: 'foodName',
            title: 'Food',
            align: 'center'
          },
          {
            field: 'userId',
            title: 'User ID',
            align: 'center',
            sortable: true
          },
          {
            field: 'fname',
            title: 'First Name',
            align: 'center'
          },
          {
            field: 'lname',
            title: 'Last Name',
            align: 'center'
          }
        ]
      ]
    });
  }

  $(() => {
    initTable();
  })
</script>