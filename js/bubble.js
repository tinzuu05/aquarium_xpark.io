$('.phoneVersion li').mouseleave(function () {
    var url = $(this).children("a").children('.bubble').attr("src");
    // url = url.substring(url.indexOf('url("') + 5, url.indexOf('")'));
    url = url.replace(/\?.*$/, "") + "?x=" + Math.random();
    $(this).children("a").children('.bubble').attr("src", url);
    console.log(url);
})
