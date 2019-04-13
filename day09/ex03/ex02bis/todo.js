$(document).ready(function() {
    var ma_list = [];
    var cook_name = "name2=";
    var search_cook = document.cookie.indexOf(cook_name);

    if (search_cook >= 0) {
        var ma_cookie = document.cookie.substring(search_cook + cook_name.length);

        if (ma_cookie !== "") {
            ma_list = ma_cookie.split(",");
            ma_list.forEach(function(text) {
                $("#ft_list").prepend($("<div class='new_event'></div>").text(text).click(deleteTodo));
            });
        }
    }

    function deleteTodo() {
        if (confirm("Do you want to delete this task?")) {
            ma_list.splice(ma_list.indexOf($(this).html()), 1);
            set_cookie("name2", ma_list.join(), 1);
            $(this).remove();
        }
    }

    $("#add").click(function() {
        var text = window.prompt("Do you want to create new task?", "Type something...");

        if (text !== null && text !== "") {
            ma_list.push(text);
            set_cookie("name2", ma_list.join(), 1);
            $("#ft_list").prepend($("<div class='new_event'></div>").text(text).click(deleteTodo));
        }
    });

    function set_cookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
    }
})