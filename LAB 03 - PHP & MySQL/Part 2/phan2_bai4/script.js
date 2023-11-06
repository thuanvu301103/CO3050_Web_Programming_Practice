function addcard(info) {
    var product_grid = document.getElementById("product-grid");
    for (var i = 0; i < info.length; i++) {
        var item = JSON.parse(info[i]);
        var col = document.createElement("div"),
            card = document.createElement("div"),
            img = document.createElement("img"),
            card_body = document.createElement("div"),
            title_container = document.createElement("div"),
            title = document.createElement("p"),
            card_info = document.createElement("div"),
            price = document.createElement("span"),
            link = document.createElement("a")
            ;
        col.classList.add("col-lg-4");
        card.classList.add("card", "bg-dark", "text-white");
        img.src = item["image"];
        img.classList.add("card-img-top", "img-fluid");
        card_body.classList.add("card-body");

        title.innerHTML = item["name"];
        title.classList.add("card-title", "text-capitalize");
        title_container.classList.add("text-truncate-container");
        title_container.style = "height: 3rem;";


        card_info.classList.add("d-flex", "justify-content-between", "align-items-center");
        price.classList.add("card-text", "text-warning");
        price.innerHTML = item["price"] + " VND";
        link.href = "./detail.php?id=" + item["id"];
        link.role = "button";
        link.classList.add("btn", "btn-primary", "rounded-4");
        link.innerHTML = "Xem";

        card_info.appendChild(price);
        card_info.appendChild(link)
        title_container.appendChild(title);

        card_body.appendChild(title_container);
        card_body.appendChild(card_info);
        card.appendChild(img);
        card.appendChild(card_body);

        col.appendChild(card);
        product_grid.appendChild(col);
    }
}

function addpagination(num_page, curr_page) {
    var pagination = document.getElementById("pagination");
    var curr_page = Number(curr_page),
        prev = curr_page - 1,
        next = curr_page + 1;
    var pagebtnprev = document.createElement("li");
    pagebtnprev.classList.add("page-item");
    var button = document.createElement("button");
    button.innerHTML = "<<";
    button.classList.add("btn", "navpage", "bg-dark", "text-white");
    button.type = "button";
    button.value = "./list.php?page=" + prev;
    pagebtnprev.append(button);

    pagination.appendChild(pagebtnprev)

    var i = 1;
    while (i <= num_page) {
        var page = document.createElement("li");
        page.classList.add("page-item");
        button = document.createElement("button");
        button.innerHTML = i;
        if (i == curr_page) {
            button.classList.add("btn", "navpage", "bg-info", "text-white");
        }
        else {
            button.classList.add("btn", "navpage", "text-secondary");
        }
        button.type = "button";
        button.value = "./list.php?page=" + i;
        page.append(button);

        pagination.appendChild(page)
        i++;
    }

    var pagebtnnext = document.createElement("li");
    pagebtnnext.classList.add("page-item");
    button = document.createElement("button");
    button.innerHTML = ">>";
    button.classList.add("btn", "navpage", "bg-dark", "text-white");
    button.type = "button";
    button.value = "./list.php?page=" + next;
    pagebtnnext.append(button);

    pagination.appendChild(pagebtnnext)
}

   

   
