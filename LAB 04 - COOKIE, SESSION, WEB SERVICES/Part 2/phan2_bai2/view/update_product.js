$(document).ready(function () {
    // show html form when 'create product' button was clicked
    $(document).on("click", ".update-btn", function () {
        $("#page-title").text("update product");
        var id = $(this).attr("value");
        
        show_product(id);
    });

    // Working with dynamic element => must use on
    $(document).on("submit", "#updateForm", function (e) {
        // Prevent form from reloading page
        e.preventDefault();
        $.post("controller/Controller.php",
            {
                //formData
                id: $("#id").val(),
                name: $("#name").val(),
                description: $("#description").val(),
                price: $("#price").val(),
                image: $("#image").val()
            },
            function (data) {
                data = JSON.parse(data);
                if (data["name_err"] != "none") {
                    alert(data["name_err"]);
                }
                else if (data["desc_err"] != "none") {
                    alert(data["desc_err"]);
                }
                else if (data["price_err"] != "none") {
                    alert(data["price_err"]);
                }
                else if (data["image_err"] != "none") {
                    alert(data["image_err"]);
                }
                else {
                    alert("Updating product is completed!");
                    show_product($("#id").val());
                }

            }
        );
    });
});

function show_product(i) {
    $.getJSON("./controller/Controller.php", { id: i }, function (data) {
       
        var form = `  
        <form id="updateForm">
            <div class="form-group">
                <label>Id</label>
                <input type="text" name="id" id="id" class="form-control" value="` + data["id"] + `"readonly>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" id="name" class="form-control" value="`+ data["name"] + `" required>
                <span id="name_err" class="invalid-feedback"></span>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="description" class="form-control" required>` + data["description"] + `</textarea>
                <span id="desc_err" class="invalid-feedback"></span>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" id="price" class="form-control" value="` + data["price"] + `" required>
                <span id="price_err" class="invalid-feedback"></span>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="text" name="image" id="image" class="form-control" value="` + data["image"] + `" required>
                <span id="image_err" class="invalid-feedback"><?php echo $image_err;?></span>
            </div>
            <div class="py-4" style="text-align: right;">
                <input type="submit" class="btn btn-success" value="Submit">
                <input type="reset" id="reset-button" class="btn btn-primary ml-2">
            </div>
        </form>
        `;
        $("#page-content").html(form);
    });
}