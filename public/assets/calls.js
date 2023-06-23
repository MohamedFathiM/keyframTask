var inputValue = "";
$("[name=path]").on("change", function () {
    inputValue = $(this).val();
});

$(document).ready(function () {
    // Handle view button click
    $("body").on("click", "#view", function (event) {
        event.preventDefault();
        var page = 1;

        load_data(page);
    });

    // Handle First page click
    $("body").on("click", ".first_page", function (event) {
        event.preventDefault();

        load_data(1);
    });

    // Handle last page click
    $("body").on("click", ".last_page", function (event) {
        event.preventDefault();

        load_last_page_data();
    });

    // Handle previous link click
    $("body").on("click", ".previous", function (event) {
        if ($("#previous").attr("disabled") == "disabled") return;

        event.preventDefault();
        var page = parseInt($("#page").val()) - 1;

        load_data(page);
    });

    // Handle next link click
    $("body").on("click", ".next", function (event) {
        if ($("#next").attr("disabled") == "disabled") return;

        event.preventDefault();
        var page = parseInt($("#page").val()) + 1;

        load_data(page);
    });
});

function load_data(page) {
    let returnedData = "";
    if (!inputValue) return;

    $.ajax({
        url: "/src/index.php",
        data: "page=" + page + "&path=" + inputValue,
        type: "GET",
        success: function (data) {
            $("#data").html(data);
            $("#page").val(page);
            let url =
                "/?" +
                $.param({
                    "page=": page,
                    "&path=": inputValue,
                });
            window.history.pushState(
                {
                    path: url,
                },
                "",
                url
            );
        },
        error: function (xhr, status, error) {
            $("#data").html(xhr.responseText);
        },
    });

    update_pagination(page, returnedData);
}

function load_last_page_data() {
    let returnedData = "";
    if (!inputValue) return;

    $.ajax({
        url: "/src/index.php",
        data: "last_page=true" + "&path=" + inputValue,
        type: "GET",
        success: function (data) {
            $("#data").html(data);
            $("#page").val(page);
            let url =
                "/?" +
                $.param({
                    "page=": page,
                    "&path=": inputValue,
                });
            window.history.pushState(
                {
                    path: url,
                },
                "",
                url
            );
        },
        error: function (xhr, status, error) {
            $("#data").html(xhr.responseText);
        },
    });

    update_pagination(page, returnedData);
}

function update_pagination(page, data) {
    if (page < 0) {
        $("#previous").attr("disabled", true);
    } else {
        $("#previous").attr("disabled", false);
    }

    if (!$("#data").text() && page > 0) {
        $("#next").attr("disabled", true);
    } else {
        $("#next").attr("disabled", false);
    }
}
