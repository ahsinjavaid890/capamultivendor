$(function () {
    const _token = $('meta[name="csrf-token"]').attr("content");
    const url = $("#searchItem").data("url");
    const search = $("#searchItem");
    const searchDropdown = $("#search-dropdown");
    $("#searchItem").on("input", function () {
        const search = $(this).val();
        fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                _token,
                search,
            }),
        })
            .then((res) => res.json())
            .then((data) => {
                $("#search-container").empty();
                $("#categories-container").empty();
                const products = data.data;
                const categories = data.categories;
                if (
                    search.length > 0 &&
                    (products.length > 0 ||
                        categories.length > 0)
                ) {
                    searchDropdown.removeClass("d-none");
                } else {
                    searchDropdown.addClass("d-none");
                }
                for (const [index, product] of products.entries()) {
                    $("#search-container").append(`
            <div class="${
                index != 3 ? "border-bottom" : ""
            } d-flex align-items-center gap-2 p-2">
                <div>
                    <a href="${product.product_url}">
                        <img src="${
                            product.image
                        }" alt="img-thumbnail rounded" width="70">
                    </a>
                </div>
                <div class="flex-fill">
                    <p class="mb-0 lead">
                        <a href="${
                            product.product_url
                        }" class="text-decoration-none text-reset">
                        ${product.name}
                        </a>
                    </p>
                    <small class="fst-italic"><a href="${
                        product.category_url
                    }" class="text-decoration-none text-reset">${
                        product.category
                    }</a> ${
                        "subcategory" in product
                            ? ` > <a href="${product.subcategory_url}" class="text-decoration-none text-reset">Pools and Simms</a>`
                            : ""
                    }</small>
                    <p class="mb-0 fw-bold">QAR ${product.price}</p>
                </div>
            </div>
          `);
                }
                for (const category of categories) {
                    $("#categories-container").append(`
            <a href="${category.url}" class="badge bg-light text-dark text-decoration-none fs-6 p-2 fw-light">${category.category_name}</a>
          `);
                }
                for (const subCategory of subCategories) {
                    $("#categories-container").append(`
            <a href="${subCategory.url}" class="badge bg-light text-dark text-decoration-none fs-6 p-2 fw-light">${subCategory.subcat_name}</a>
          `);
                }
            })
            .catch((error) => {
                console.log(error);
            });
    });
});