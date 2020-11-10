function addGuest(guest, point) {
    var div = document.getElementById("ol");
    var el = document.createElement("li");
    el.textContent = guest;
    var close = document.createElement("div");
    close.textContent = "✕";
    close.id = "close";
    close.onclick = function(e) {
        var res = confirm("Вы точно хотите удалить гостя " + (e.target.parentElement.textContent).substring(0,e.target.parentElement.textContent.length - 1) + "?");
        if(res)
            removeg(e.target.parentElement, false);
        return;
    }
    el.appendChild(close);
    div.appendChild(el);
    point.textContent = div.children.length;
    point.className = div.children.length;
    return point;
}
function removeg(targ,flag) {
    var ol = document.getElementById("ol");
    var lis = ol.children;
    var pos;
    if(flag == true) {
        if(lis.length == 1) {
            lis[0].remove();
        }
        else {
            for(var i = 0; i < lis.length; i++) {
                if(i == parseInt(targ.className) - 1) {
                    lis[i].remove();
                    for(pos = i + 1; pos < lis.length + 1; pos++) {
                        var t = document.getElementsByClassName(pos + 1);;
                        var t1 = t[0];
                        t1.className = pos;
                        t1.textContent = pos;
                        t[0] = t1;
                    }
                }
            }
        }
        targ.remove(targ);
    } else {
        for(var i = 0; i < lis.length; i++) {
            if(lis[i] == targ) {
                var del = document.getElementsByClassName(i + 1);
                del[0].remove();
                pos = i;
                console.log(pos);
                for(pos = i + 1; pos < lis.length; pos++) {
                    var t = document.getElementsByClassName(pos + 1);;
                    var t1 = t[0];
                    t1.className = pos;
                    t1.textContent = pos;
                    t[0] = t1;

                }
            }
        }
        targ.remove(targ);
    }
}
function doubleclick(el,evt) {
    if (el.getAttribute("data-dblclick") == null) {
        el.setAttribute("data-dblclick", 1);
        setTimeout(function () {
            if (el.getAttribute("data-dblclick") == 1) {
                add(el,evt);
            }
            el.removeAttribute("data-dblclick");
        }, 300);
    } else {
        el.removeAttribute("data-dblclick");
        remo(el);
    }
}
function add(e,evt) {
    let pointg = document.createElement("span"); 
    pointg.style.left = (evt.clientX - 10) + "px";
    pointg.style.top = (evt.clientY - 10) + "px";
    var name = prompt("Введите имя гостя","");
    if(name == "")
        return;
    pointg = addGuest(name, pointg);
    image.appendChild(pointg);
}
function remo(evt) {
    var res = confirm("Вы точно хотите удалить гостя " + evt.textContent + "?");
    if(res) 
        removeg(evt, true);
    return;
}
var image = document.getElementById('image');
image.onclick = function(e) {
    doubleclick(e.target,e);
}
var button = document.getElementById("button");
button.onclick = function () {
    window.print()
}
