function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "210px";
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
  console.log("i'm done");
}

var de_ram = parseInt(document.getElementById("de_ram").innerHTML);
var de_storage = parseInt(document.getElementById("de_storage").innerHTML);

function priceSetter(num) {
  var priceSetted;
  if (num == 4) {
    priceSetted = 20;
  } else if (num == 8) {
    priceSetted = 40;
  } else if (num == 16) {
    priceSetted = 60;
  } else if (num == 32) {
    priceSetted = 80;
  } else if (num == 64) {
    priceSetted = 20;
  } else if (num == 128) {
    priceSetted = 40;
  } else if (num == 256) {
    priceSetted = 60;
  } else if (num == 512) {
    priceSetted = 80;
  } else if (num == 1024) {
    priceSetted = 100;
  }
  return priceSetted;
}

ram_p = priceSetter(de_ram);
storage_p = priceSetter(de_storage);
// console.log(de_ram + "  " + de_storage);
var item = document.getElementById("item-price");
var itemPrice = parseInt(item.innerHTML);
itemPrice = itemPrice - ram_p - storage_p;
(function () {
  "use strict";
  var selects = document.getElementsByClassName("calculate"),
    select;
  for (var i = 0; (select = selects[i]); i++) {
    select.addEventListener(
      "change",
      function () {
        var newPrice = itemPrice;
        var selectedItems = document.querySelectorAll(
            ".calculate option:checked"
          ),
          selected;
        for (var x = 0; (selected = selectedItems[x]); x++) {
          newPrice += Number(selected.getAttribute("value"));
        }

        item.innerHTML = newPrice.toString();
      },
      false
    );
  }
})();

function submitBtn() {
  document.getElementById("notification").style.display = "block";
  setTimeout(function () {
    document.getElementById("notification").style.display = "none";
  }, 10000);
}
function clsbtn() {
  document.getElementById("notification").style.display = "none";
}
