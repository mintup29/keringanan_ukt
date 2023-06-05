/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.body.style.marginLeft = "250px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.body.style.marginLeft = "0";
}

/* This method will add a new row */
function addNewRow() {
    var table = document.getElementById("employee-table");
    var rowCount = table.rows.length;
    var cellCount = table.rows[0].cells.length;
    var row = table.insertRow(rowCount);
    for (var i = 0; i < cellCount; i++) {
        var cell = row.insertCell(i);
        if (i == 0) {
            cell.innerHTML =
                '<div class="input-group input-group-sm my-lg-1 col-sm-12 justify-content-center" style="background-color:white">' +
                '<input type="text" class="form-control col-lg-9" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">' +
                "</div>";
        } else if (i == 1) {
            cell.innerHTML =
                '<div class="input-group input-group-sm my-lg-1 col-sm-12 justify-content-center">' +
                '<input type="text" class="form-control col-lg-3 mx-1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">' +
                "</div>";
        } else {
            cell.innerHTML =
                '<button type="button" ' +
                'class="btn btn-danger col-lg-4 col-sm-12 mx-lg-2 my-2 rounded-3 remove" ' +
                'onclick="deleteRow()"> ' +
                '<i class="fa fa-trash" style="font-size: 20px"></i>' +
                "</button>";
        }
    }
}

/* This method will delete a row */
function deleteRow(ele) {
    var table = document.getElementById("employee-table");
    var rowCount = table.rows.length;
    if (rowCount <= 1) {
        alert("There is no row available to delete!");
        return;
    }
    if (ele) {
        //delete specific row
        ele.parentNode.parentNode.remove();
    } else {
        //delete last row
        table.deleteRow(rowCount - 1);
    }
}
