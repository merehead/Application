function loadpage()
{
    var obj = document.getElementById ('id_cookie');
    if(obj)
    {
        // Устанавливаем cookie
        setcookie("ckeck_cookie", 1);
        // Извлекаем cookie
        var cookie = getcookie("ckeck_cookie");
        if(cookie != "1")
        {
            $('#id_cookie').show();
        }
        else
        {
            $('#id_cookie').hide();
        }
    }
}
// Устанавливаем cookie
function setcookie(name, val)
{
    var putdate = new Date();
    // Устанавливаем cookie на год
    putdate.setTime(putdate.getTime() + (86400 * 365));
    document.cookie = name + "=" + val + "; expires=" + putdate.toGMTString() +  "; path=/";
}
// Извлекаем cookie
function getcookie(name)
{
    var re = new RegExp(name + "=([\\d])", "i");
    arr = re.exec(document.cookie);
    return arr[1];
}
$(document).ready(function () {
    loadpage();
    $('.cookie-btn').on('click',function (e) {
        e.preventDefault();
        $('#id_cookie').hide();
        return false;
    })
});