$(document).ready(function () {
    var baseUrl = window.location.origin;
    $('#productsTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl + "/products", // AJAX URL to fetch the data
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'quantity', name: 'quantity'},
            {data: 'price', name: 'price'},
            {data: 'description', name: 'description'}
        ]
    });
});
$("#addProductSubmit").click(function () {
    $("#addProductForm").submit();
});
$("#addProductForm").submit(function (e) {
    e.preventDefault();
    $("#addProductSubmit").html("Processing...");
    let form = $(this)[0];
    console.log(form);
    if (form.checkValidity()) {
        addProduct();
    } else {
        form.reportValidity();
        $("#error-msg").addClass("alert-danger");
        $("#error-msg").removeClass("hidden");
        $("#error-msg").html("Please complete all fields!");
        $("#addProductSubmit").html("Sumbit");
    }
});
function addProduct() {
    const baseUrl = window.location.origin;
    $.ajax({
        type: "post",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: baseUrl + "/product/create",
        data: {
            name: $("#name").val(),
            quantity: $("#quantity").val(),
            price: $("#price").val(),
            description: $("#description").val(),
        },
        success: function (res) {
            $("#addProductSubmit").html("Sumbit");
            if (res.status == "success") {
                $("#error-msg").addClass("alert-success");
                $("#error-msg").removeClass("hidden");
                $("#error-msg").html(res.message);
                setTimeout(function () {
                    /*  patientsTable.ajax.reload(null, false); */
                    $(".modal-header .close").trigger("click");
                }, 1000);
            }
        },
        error: function (err) {
            console.log(err);
            $("#error-msg").addClass("alert-danger");
            $("#error-msg").removeClass("hidden");
            $("#error-msg").html(err.message);
            $("#addDoctorSubmit").html("Sumbit");
        },
    });
}
