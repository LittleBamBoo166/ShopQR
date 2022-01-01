function tinhthanh(sel) {
    while (sel.hasChildNodes()) {
        sel.removeChild(sel.firstChild);
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var tt = this.responseText;
            var ttArr = tt.split("|");
            for (var i = 0; i < ttArr.length; i = i + 2) {
                var ele = document.createElement("option");
                ele.value = ttArr[i];
                ele.textContent = ele.value + " - " + ttArr[i + 1];
                sel.appendChild(ele);
            }
        }
    }
    var filter = "tinhthanh";
    xmlhttp.open("GET", "Views/selectTT.php?q=" + filter, true);
    xmlhttp.send();
}
var pro = document.getElementById("pro");
if (typeof(pro) != 'undefined' && pro != null) {
    tinhthanh(pro);    
}

function quanhuyen(sel) {
    var proid = sel.options[sel.selectedIndex].value;
    var qhsel = document.getElementById("dis");
    while (qhsel.hasChildNodes()) {
        qhsel.removeChild(qhsel.firstChild);
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var qh = this.responseText;
            var qhArr = qh.split("|");
            for (var i = 0; i < qhArr.length; i = i + 2) {
                var ele = document.createElement("option");
                ele.value = qhArr[i];
                ele.textContent = ele.value + " - " + qhArr[i + 1];
                qhsel.appendChild(ele);
            }
        }
    }
    xmlhttp.open("GET", "Views/selectQH.php?q=" + proid, true);
    xmlhttp.send();
}
function xaphuong(sel) {
    var disid = sel.options[sel.selectedIndex].value;
    var xpsel = document.getElementById("town");
    while (xpsel.hasChildNodes()) {
        xpsel.removeChild(xpsel.firstChild);
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var xp = this.responseText;
            var xpArr = xp.split("|");
            for (var i = 0; i < xpArr.length; i = i + 2) {
                var ele = document.createElement("option");
                ele.value = xpArr[i];
                ele.textContent = ele.value + " - " + xpArr[i + 1];
                xpsel.appendChild(ele);
            }
        }
    }
    xmlhttp.open("GET", "Views/selectXP.php?q=" + disid, true);
    xmlhttp.send();
}

// ------------------------------------------------------
// function tinhthanhCC(sel) {
//     var val = document.getElementById("idtt").getAttribute("data-address-id");
//     while (sel.hasChildNodes()) {
//         sel.removeChild(sel.firstChild);
//     }
//     var xmlhttp = new XMLHttpRequest();
//     xmlhttp.onreadystatechange = function () {
//         if (this.readyState == 4 && this.status == 200) {
//             var tt = this.responseText;
//             var ttArr = tt.split("|");
//             for (var i = 0; i < ttArr.length; i = i + 2) {
//                 var ele = document.createElement("option");
//                 ele.value = ttArr[i];
//                 if (ele.value == val) {
//                     ele.setAttribute("selected", "selected");
//                 }
//                 ele.textContent = ele.value + " - " + ttArr[i + 1];
//                 sel.appendChild(ele);
//             }
//         }
//     }
//     var filter = "tinhthanh";
//     xmlhttp.open("GET", "Views/selectTT.php?q=" + filter, true);
//     xmlhttp.send();
// }
// var proCC = document.getElementById("proCC");
// if (typeof(proCC) != 'undefined' && proCC != null) {
//     tinhthanhCC(proCC);    
// }