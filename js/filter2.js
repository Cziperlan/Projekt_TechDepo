$(document).ready(function() {
    $("#apply-filters").on("click", function() {
        $.ajax({
            url: "filter_products2.php",
            type: "GET",
            data: $("#filter-form").serialize(),
            success: function(data) {
                $("#product-list").html(data);
            }
        });
    });
});