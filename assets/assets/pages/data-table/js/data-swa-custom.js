$(document).ready(function () {
    
    $("#sub-tbl tfoot th").each(function () {
        var title = $(this).text();
        $(this).html(
          '<input type="text" class="form-control" placeholder="Search ' +
            title +
            '" />',
        );
      });
      var table = $("#sub-tbl").DataTable();
      table.columns().every(function () {
        var that = this;
        $("input", this.footer()).on("keyup change", function () {
          if (that.search() !== this.value) {
            that.search(this.value).draw();
          }
        });
      });
      })