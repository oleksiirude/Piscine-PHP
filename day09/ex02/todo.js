var i = 0;
var buf;
var div;
var array = [];
var new_array = [];
var list = document.getElementById("ft_list");

if ((buf = search_cookie("name"))) {
    buf = buf.split(',');
    while (i < buf.length) {
        div = document.createElement('div');
        div.className = "new_event";
        div.id = i;
        buf[i] = decodeURIComponent(buf[i]);
        div.innerHTML = buf[i];
        list.prepend(div);
        i++;
    }
    array = buf;
}

function search_cookie(name) {

    var name_cook = name+"=";
    var splitted = document.cookie.split(";");

    for (var i = 0; i < splitted.length; i++) {
        var c = splitted[i];
        while(c.charAt(0) === " ") {
            c = c.substring(1, c.length);
        }
        if(c.indexOf(name_cook) === 0) {
            return c.substring(name_cook.length, c.length);
        }
    }
    return null;

}

function array_filler() {
    var new_event;

    new_event = prompt("Do you want to create new task?", "Type something...");
        if (new_event) {
            div = document.createElement('div');
            div.className = "new_event";
            div.id = i;
            div.innerHTML = new_event;
            list.prepend(div);
            new_event = encodeURIComponent(new_event);
            array.push(new_event);
            set_cookie("name", array, 1);
            i++;
        }
    }

    list.addEventListener('click', function (event) {
        if (confirm("Do you want to delete this task?")) {
            var k = 0;
            var j = 0;
            var tmp = event.target.id;

            console.log("tmp->", tmp);
            tmp = parseInt(tmp);
            while (j < array.length)
            {
                if (tmp === j)
                    j++;
                if (j === array.length)
                    break;
                new_array[k++] = array[j++];
            }
            array = new_array;
            console.log(event.target);
            list.removeChild(event.target);
            console.log(new_array);
            set_cookie("name", new_array, 1);
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