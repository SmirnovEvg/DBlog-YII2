$('.like__button').on('click', function () {
    $.ajax({
        type: "GET",
        url: "http://localhost/DBlogYii2/web/index.php?r=news/like",
        data: "id=" + $('.like__button').attr("post-id"),
        success: function (data) {
            console.log(data); // it will show the result in console
        }
    });
    $("#likesCount").load(" #likesCount");
});

var url = location.href;
var urlPage = url.substr(url.lastIndexOf('=') + 1);
console.log(typeof(urlPage));

    
if(urlPage !== ''){
    $(`#${urlPage}`).css('background-color', '#ccd0d7');
}else {
    $('#all').css('background-color', '#ccd0d7');
}
