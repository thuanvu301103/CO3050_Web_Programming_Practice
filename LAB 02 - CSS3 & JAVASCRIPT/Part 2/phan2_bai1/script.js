document.querySelector(".create").onclick = () => {
    if (document.querySelector("table")) {
        var num_col = document.getElementsByTagName("th").length;
        if (num_col == 0) {
            createTable();
            return
        }
        alert("There is an existing table. Do you want to create a new one?");
    }
    createTable();
}
document.querySelector(".addrow").onclick = () => {
    if (!document.querySelector("table")) {
        return alert("No table to add row");
    }
    addRow();
}
document.querySelector(".addcol").onclick = () => {
    if (!document.querySelector("table")) {
        return alert("No table to add column");
    }
    addCol();
}
document.querySelector(".delrow").onclick = () => {
    if (!document.querySelector("table")) {
        return alert("No table to delete row");
    }

    var row_no = parseInt(document.getElementById("row-del").value);
    var num_row = document.getElementsByTagName("tr").length;
    if (row_no == 0) {
        return alert("You can not delete header row, header is row 0!");
    }
    if (num_row == 1) {
        return alert("No more data row to delete!");
    }
    if (row_no < 0 || row_no >= num_row) {
        return alert(
                    `You can only delete from row 1 to row ${num_row - 1}, header is row 0!`
               );
    }
    delRow(row_no);
}
document.querySelector(".delcol").onclick = () => {
    if (!document.querySelector("table")) {
        return alert("No table to delete row");
    }

    var col_no = parseInt(document.getElementById("col-del").value);
    var num_col = document.getElementsByTagName("th").length;
    if (num_col == 0) {
        return alert("No more column to delete. Please create a new table!");
    }
    if (col_no < 1 || col_no > num_col) {
        return alert(
                    `You can only delete from column 1 to column ${num_col}!`
               );
    }
    delCol(col_no);
}
document.querySelector(".deltable").onclick = () => {
    delTable();
};

function createTable() {
    var tableContainer = document.getElementById('tableContainer');
    var table = document.createElement('table');
    table.classList.add("table-fixed", "mx-auto", "mb-5");
    // Header
    var tr = document.createElement('tr');
    tr.classList.add("bg-secondary", "text-white")
    for (var i = 0; i < 2; i++) {
        var th = document.createElement('th');
        th.classList.add("px-4", "py-3");
        th.appendChild(document.createTextNode('Header'));
        tr.appendChild(th);
    }
    table.appendChild(tr);
    // Data
    var tr = document.createElement('tr');
    tr.classList.add("bg-white")
    for (var i = 0; i < 2; i++) {
        var td = document.createElement('td');
        td.classList.add("px-4", "py-3");
        td.appendChild(document.createTextNode('New data'));
        tr.appendChild(td);
    }
    table.appendChild(tr);
    // Delete previous table before add new table element
    tableContainer.innerHTML = '';
    tableContainer.appendChild(table);
}

function addRow() {
    var numCol = document.getElementsByTagName("th").length;
    var table = document.getElementsByTagName("table")[0];
    var tr = document.createElement('tr');
    tr.classList.add("bg-white")
    for (var i = 0; i < numCol; i++) {
        var td = document.createElement('td');
        td.classList.add("px-4", "py-3");
        td.appendChild(document.createTextNode('New data'));
        tr.appendChild(td);
    }
    table.appendChild(tr);
}

function addCol() {
    var rows = document.getElementsByTagName("tr")
    var numRow = rows.length;
    // Apend header cell
    var th = document.createElement('th');
    th.classList.add("px-4", "py-3");
    th.appendChild(document.createTextNode('Header'));
    rows[0].appendChild(th);
    for (var i = 1; i < numRow; i++) {
        var td = document.createElement('td');
        td.classList.add("px-4", "py-3");
        td.appendChild(document.createTextNode('New data'));
        rows[i].appendChild(td);
    }
}

function delRow(row_no) {
    var rows = document.getElementsByTagName("tr");
    rows[row_no].remove()
}

function delCol(col_no) {
    var rows = document.getElementsByTagName("tr");
    var num_row = rows.length;
    // Delete Header
    rows[0].getElementsByTagName("th")[col_no - 1].remove();
    // Delete data
    for (var i = 1; i < num_row; i++) {
        rows[i].getElementsByTagName("td")[col_no - 1].remove();
    }
};

function delTable() {
    if (document.querySelector("table")) {
        alert("Are you sure deleting all data?");
    }
    var table = document.getElementsByTagName('table')[0];
    table.remove()
}