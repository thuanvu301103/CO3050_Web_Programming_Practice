$(document).ready(function () {
    // show html form when 'create product' button was clicked
    $(document).on("click", "#add-product", function () {
        $("#page-title").text("add product");
        add_new_product();

    });

    // Working with dynamic element => must use on
    $(document).on("submit", "#myForm", function (e) {
        // Prevent form from reloading page
        e.preventDefault();
        // Get the data from form
        var formData = $(this).serialize();
        $.post("controller/Controller.php",
            {
                //formData
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
                    alert("Adding new product is completed!");
                    add_new_product();
                }

            }
        );
    });
});

function add_new_product() {
    var form = `  
    <form id="myForm">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
            <span id="name_err" class="invalid-feedback"></span>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
            <span id="desc_err" class="invalid-feedback"></span>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" id="price" class="form-control" required>
            <span id="price_err" class="invalid-feedback"></span>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="text" name="image" id="image" class="form-control" required>
            <span id="image_err" class="invalid-feedback"><?php echo $image_err;?></span>
        </div>
        <div class="py-4" style="text-align: right;">
            <input type="submit" class="btn btn-success" value="Submit">
            <input type="reset" id="reset-button" class="btn btn-primary ml-2">
        </div>
    </form>
    `;
    $("#page-content").html(form);
}