$(document).ready(function () {
    fetchAll();

    toastr.options = {
        closeButton: true,
        progressBar: true,
        positionClass: "toast-top-right",
        timeOut: "3000",
    };

    //fech work  details ........................................................................

    function fetchAll() {
        $.ajax({
            url: "/admin/details/fetch",
            method: "get",
            success: function (response) {
                $("#fetch_All_Details").html(response);
                new DataTable("#DetailsTable", {
                    scrollX: true,
                });
            },
        });
    }

    // add work details.................................................................................

    $(document).on(
        "click",
        ".second_title-add-button, .Description-add-button, .image1-add-button, .image2-add-button, .image3-add-button, .link1-add-button, .link2-add-button, .link3-add-button",
        function (e) {
            e.preventDefault();

            let button = $(this);
            let field = button.data("field"); // Get field name (e.g., second_title, image1, etc.)
            let id = button.data("id"); // Get the record ID
            let formData = new FormData(); // Initialize FormData for request
            formData.append("id", id);
            formData.append("field", field);
            formData.append(
                "_token",
                $('meta[name="csrf-token"]').attr("content")
            ); // CSRF token

            if (field.startsWith("image")) {
                // Handle image uploads
                let fileInput = button.siblings('input[type="file"]');
                let file = fileInput[0].files[0];

                if (!file) {
                    alert("Please select a file.");
                    return;
                }
                formData.append("value", file);
            } else {
                // Handle text, textarea, or URL input
                let value = button.siblings("input, textarea").val();

                if (!value) {
                    alert("Please provide a value.");
                    return;
                }
                formData.append("value", value);
            }

            // Send AJAX request
            $.ajax({
                url: "/admin/details/add", // Update this to match your route
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    toastr.success(response.message, "Updated");
                    fetchAll();
                },
                error: function (xhr) {
                    alert("Error: " + xhr.responseText);
                },
            });
        }
    );

    //work details delete................................................................

    $(document).on("click", ".detail-delete-button", function (e) {
        e.preventDefault();

        let button = $(this);
        let id = button.data("id"); // Get the record ID
        let field = button.data("field"); // Get field name (e.g., second_title, image1, etc.)

        if (confirm("Are you sure you want to delete this?")) {
            $.ajax({
                url: "/admin/details/delete", // Update this to match your route
                type: "DELETE",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"), // CSRF token
                    id: id,
                    field: field,
                },
                success: function (response) {
                    toastr.success(response.message, "Success");
                    fetchAll();
                },
                error: function (xhr) {
                    alert("Error: " + xhr.responseText);
                },
            });
        }
    });
});
