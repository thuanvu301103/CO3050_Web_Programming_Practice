$(document).ready(function () {
    // show html form when 'create product' button was clicked
    $(document).on("click", ".delete-btn", function () {
        var id = $(this).attr("value");
        delete_product(id);
        $("#page-title").text("read product");
        list_products();
    });

});

function delete_product(i) {
    $.ajax({
        url: `./controller/Controller.php?id=` + i,
        type: "DELETE",
        success: function (data) {
            alert("Delete completed!");
        }
    });
}