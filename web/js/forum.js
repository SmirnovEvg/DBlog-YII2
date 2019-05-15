
$('.like__button').on('click', function () {
    $.ajax({
        type: "GET",
        url: "http://localhost/DBlogYii2/web/index.php?r=news/like",
        data: "id=" + $('.like__button').attr("post-id")
    });
    $("#likesCount").load(" #likesCount");
});