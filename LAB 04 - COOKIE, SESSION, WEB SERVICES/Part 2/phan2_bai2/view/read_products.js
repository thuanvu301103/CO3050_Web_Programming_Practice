$(document).ready(function () {
    // show list of product when the page is loaded
    
    $("#read-products").on("click", function () {
        
        $("#page-title").text("read products");
        
        list_products();
    });
     
});

function list_products() {
    // get list of products from the API
    $.getJSON("./controller/Controller.php", function (data) {
        // html for listing products
       
        var read_products_html = `
           <table class='table table-bordered table-striped'>
                            <thead>
                                <tr>
                                    <th style='width: 5%;' class='text-center'>ID</th>
                                    <th style='width: 15%;' class='text-center'>Name</th>
                                    <th style='width: 35%;' class='text-center'>Description</th>
                                    <th style='width: 10%;' class='text-center'>Price</th>
                                    <th style='width: 15%;' class='text-center'>Image link</th>
                                    <th style='width: 20%;' class='text-center'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
        `;
        
        for (var i in data) {
            read_products_html += `
                 <tr>
                    <td style='width: 5%;' class='text-center'>` + data[i]["id"] + `</td>` +
                `<td style='width: 15%;'>` + data[i]["name"] + `</td>` +
                `<td style='width: 35%;'>` + data[i]["description"] + `</td>` +
                `<td style='width: 10%;' class='text-center'>` + data[i]["price"] + `</td>` +
                `<td style='width: 15%;'>` + data[i]["image"] + `</td>` +
                `<td style='width: 20%;' class='text-center'>
                            <button value="`+ data[i]["id"] +`" role="button" class="update-btn btn btn-primary rounded-2" ><span class="fa fa-pencil"></span></button>
                            <button value="`+ data[i]["id"] +`" role="button" class="delete-btn btn btn-danger rounded-2" ><span class="fa fa-trash"></span></button>
                    </td>
                </tr>`
                ;
        }
        
        // end table
        read_products_html += `<tbody> </table>`;
        // inject to "page-content"
        
        $("#page-content").html(read_products_html);
    });
}