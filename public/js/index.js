$(document).ready(function () {
    // passwordhidden jquery
    $("#togglePassword").on("click", function () {
        const input = $("#password");
        const type = input.attr("type") === "password" ? "text" : "password";
        input.attr("type", type);
        $(this).text(type === "password" ? "Show" : "Hide");
    });
    $("#toggleCurrentPassword").on("click", function () {
        const input = $("#current_password");
        const type = input.attr("type") === "password" ? "text" : "password";
        input.attr("type", type);
        $(this).text(type === "password" ? "Show" : "Hide");
    });
    $("#toggleConfirmPassword").on("click", function () {
        const input = $("#confirmPassword");
        const type = input.attr("type") === "password" ? "text" : "password";
        input.attr("type", type);
        $(this).text(type === "password" ? "Show" : "Hide");
    });

    // navbar dropdown jquery

    $("#dropdownBtn").on("click", function (e) {
        e.stopPropagation(); // prevent closing when clicking the button
        $("#dropdownMenu").toggleClass("hidden");
    });

    // category dropdown

    $("#categoryDropdownBtn").on("click", function (e) {
        e.stopPropagation(); // prevent closing when clicking the button
        $("#categoryDropdown").toggleClass("hidden");
    });

    // Close dropdown if clicking outside
    $(document).on("click", function (e) {
        if (!$(e.target).closest("#dropdownMenu").length) {
            $("#dropdownMenu").addClass("hidden");
        }
    });

    // close alert
    $("#closeAlert").on("click", function () {
        $("#myAlert").fadeOut();
    });

    // delete popup modal jquery

    $(".openDeleteModal").on("click", function () {
        const slug = $(this).data("slug");
        const title = $(this).data("title");

        // Set form action dynamically
        $("#deleteForm").attr("action", "/admin/blogs/" + slug + "/delete"); // Change URL as needed

        // Optional: Update confirmation message
        $("#deleteMessage").text(`Are you sure you want to delete "${title}"?`);

        // Show modal
        $("#deleteModal").removeClass("hidden flex").addClass("flex");
    });

    $("#cancelDelete").on("click", function () {
        $("#deleteModal").addClass("hidden").removeClass("flex");
    });

    // delete user popup modal jquery

    $(".openDeleteModal1").on("click", function () {
        const username = $(this).data("username");
        const name = $(this).data("name");

        // Set form action dynamically
        $("#deleteForm1").attr(
            "action",
            "/admin/userlist/" + username + "/delete"
        ); // Change URL as needed

        // Optional: Update confirmation message
        $("#deleteMessage1").text(`Are you sure you want to remove "${name}"?`);

        // Show modal
        $("#deleteModal1").removeClass("hidden flex").addClass("flex");
    });

    $("#cancelDelete1").on("click", function () {
        $("#deleteModal1").addClass("hidden").removeClass("flex");
    });

    // delete comment popup modal jquery

    $(".openDeleteModal2").on("click", function () {
        const id = $(this).data("id");
        const body = $(this).data("body");

        // Set form action dynamically
        $("#deleteForm2").attr("action", "/admin/comments/" + id + "/delete"); // Change URL as needed

        // Optional: Update confirmation message
        $("#deleteMessage2").text(
            `Are you sure you want to delete this comment ?`
        );

        // Show modal
        $("#deleteModal2").removeClass("hidden flex").addClass("flex");
    });

    $("#cancelDelete2").on("click", function () {
        $("#deleteModal2").addClass("hidden").removeClass("flex");
    });

    // categorydelete

    $(".openDeleteModal3").on("click", function () {
        const slug = $(this).data("slug");
        const name = $(this).data("name");

        // Set form action dynamically
        $("#deleteForm3").attr("action", "/admin/categories/" + slug + "/destroy"); // Change URL as needed

        // Optional: Update confirmation message
        $("#deleteMessage3").text(
            `Are you sure you want to delete this category "${name}" ? This action will delete all blogs associated with this category .`
        );

        // Show modal
        $("#deleteModal3").removeClass("hidden flex").addClass("flex");
    });

    $("#cancelDelete3").on("click", function () {
        $("#deleteModal3").addClass("hidden").removeClass("flex");
    });
});
