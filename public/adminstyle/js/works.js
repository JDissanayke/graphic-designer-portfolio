$(document).ready(function () {
    fetchAll();

    // Create FormData object to handle file upload
    $("#postForm").submit(function (e) {
        e.preventDefault();

        var formData = new FormData(this);

        // console.log(formData);

        $.ajax({
            url: "/admin/poststore", // Route for handling the POST request
            type: "POST",
            data: formData,
            processData: false, // Prevent jQuery from automatically processing data
            contentType: false, // Don't set content-type
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), // CSRF token
            },
            success: function (response) {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    positionClass: "toast-top-right",
                    timeOut: "3000",
                };
                toastr.success(response.message, "Success");

                // Clear the form
                $("#postForm")[0].reset();
                fetchAll();
            },
            error: function (xhr, status, error) {
                // Handle error
                alert("Error: " + error);
            },
        });
    });

    // fetch all work
    function fetchAll() {
        $.ajax({
            url: "/admin/fetchAllposts",
            method: "get",
            success: function (response) {
                $("#fetch_All_posts").html(response);
                $("#myTable").DataTable({



                });
            },
        });
    }

    $(document).ready(function () {
        // Toastr default options
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
            timeOut: "3000",
        };

        // Delete post
        $(document).on("click", ".delete-post", function () {
            let postId = $(this).data("id");
            if (confirm("Are you sure you want to delete this post?")) {
                $.ajax({
                    url: `/admin/postdelete/${postId}`,
                    method: "DELETE",
                    data:{
                        id:postId
                    },
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), // CSRF token
                    },
                    success: function (response) {

                        toastr.success(response.message, "Success");
                        fetchAll();

                       // Reload data
                    },
                    error: function () {
                        toastr.error("Failed to delete the post.", "Error");
                    },
                });
            }
        });
    });


    // status update

    $(document).on('change', '.form-select-sm', function () {
        let postId = $(this).data('id'); // Fetch post ID
        let status = $(this).val(); // Fetch new status

        $.ajax({
            url: `/admin/posts/${postId}/status`, // Dynamic route for updating status
            method: 'PATCH', // HTTP method
            data: {
                status: status,
                _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
            },
            success: function (response) {
                // Use Toastr for success notification
                toastr.success(response.message, 'Success');
                fetchAll();
            },
            error: function () {
                // Use Toastr for error notification
                toastr.error('Failed to update the status.', 'Error');
            }
        });
    });

});


