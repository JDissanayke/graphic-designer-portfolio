$(document).ready(function () {
    fetchAll();

    toastr.options = {
        closeButton: true,
        progressBar: true,
        positionClass: "toast-top-right",
        timeOut: "3000",
    };

    function fetchAll() {
        $.ajax({
            url: "/admin/users-fetch-all",
            method: "get",
            success: function (response) {

                console.log(response);
                $("#fetch_All_Users").html(response);
                $("#UserTable").DataTable();
            },
        });
    }

// user add ..................................................................................................

    $(document).on("click", ".Add-User", async function () {
        try {
            // Show the input fields for name, email, and password
            const { value: formValues } = await Swal.fire({
                title: "Add User Details",
                html:
                    '<input id="swal-input-name" class="swal2-input" placeholder="Enter your name">' +
                    '<input id="swal-input-email" class="swal2-input" type="email" placeholder="Enter your email address">' +
                    '<input id="swal-input-password" class="swal2-input" type="password" placeholder="Enter your password">',
                focusConfirm: false,
                showCancelButton: true,
                confirmButtonText: "Submit",
                cancelButtonText: "Cancel",
                preConfirm: () => {
                    // Return the input values
                    const name = document.getElementById("swal-input-name").value;
                    const email = document.getElementById("swal-input-email").value;
                    const password = document.getElementById("swal-input-password").value;

                    if (!name || !email || !password) {
                        Swal.showValidationMessage("All fields are required!");
                    }

                    return { name, email, password };
                },
            });

            // Check if formValues are valid
            if (formValues) {
                // Send the data via AJAX
                $.ajax({
                    url: "/admin/users-add-user", // Update this with your actual endpoint
                    type: "POST",
                    data: {
                        name: formValues.name,
                        email: formValues.email,
                        password: formValues.password,
                        _token: $('meta[name="csrf-token"]').attr("content"), // Include CSRF token
                    },
                    success: function (response) {
                        Swal.fire({
                            title: "Success!",
                            text: "User has been added successfully.",
                            icon: "success",
                        });
                        fetchAll();
                    },
                    error: function (xhr, status, error) {
                        Swal.fire({
                            title: "Error!",
                            text: "There was an error adding the user.",
                            icon: "error",
                        });
                        console.error("Error:", error);
                    },
                });
            }
        } catch (error) {
            console.error("Error:", error);
        }
    });

    ///delete user ....................................................................
    $(document).on("click", ".delete-user-btn", function () {
        const userId = $(this).data("id");

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/admin/user-delete",
                    type: "DELETE",
                    data: {
                        user_id: userId,
                        _token: $('meta[name="csrf-token"]').attr("content"), // CSRF token for security
                    },
                    success: function (response) {
                        Swal.fire("Deleted!", response.message, "success");
                        // Optionally, remove the deleted user from the DOM
                        fetchAll();
                    },
                    error: function (xhr) {
                        Swal.fire("Error!", xhr.responseJSON.message, "error");
                    },
                });
            }
        });
    });


});
