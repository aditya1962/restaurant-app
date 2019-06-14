window.onload = function()
{
  request_subcategories();
  subcategories();
}

function request_subcategories()
{
  var category = document.getElementById("category").value;
  var xhr;
   if (window.XMLHttpRequest) { // Mozilla, Safari, ...
      xhr = new XMLHttpRequest();
  } else if (window.ActiveXObject) { // IE 8 and older
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }

  var data = "category=" + category;
       xhr.open("POST", "../logic/load_category.php", true);
       xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
       xhr.send(data);
     xhr.onreadystatechange = display_data;
    function display_data() {
     if (xhr.readyState == 4) {
        if (xhr.status == 200) {
      document.getElementById("sub_category").innerHTML = xhr.responseText;
        } else {
          alert('There was a problem with the request.');
        }
       }
    }
}

function subcategories()
{
  var category = document.getElementById("edit-category").value;
  var xhr;
   if (window.XMLHttpRequest) { // Mozilla, Safari, ...
      xhr = new XMLHttpRequest();
  } else if (window.ActiveXObject) { // IE 8 and older
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }

  var data = "category=" + category;
       xhr.open("POST", "../logic/load_category.php", true);
       xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
       xhr.send(data);
     xhr.onreadystatechange = display_data;
    function display_data() {
     if (xhr.readyState == 4) {
        if (xhr.status == 200) {
      document.getElementById("edit-subcategory").innerHTML = xhr.responseText;
        } else {
          alert('There was a problem with the request.');
        }
       }
    }
}
function deleteItem(id)
{
  var delete_item = id.split('-')[1];
  var deleteConfirm = confirm("Do you want to delete this item ? This cannot be undone!");
  if(deleteConfirm)
  {
    var xhr;
   if (window.XMLHttpRequest) { // Mozilla, Safari, ...
      xhr = new XMLHttpRequest();
  } else if (window.ActiveXObject) { // IE 8 and older
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }

  var data = "item_id=" + delete_item;
       xhr.open("POST", "../logic/delete_item.php", true);
       xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
       xhr.send(data);
     xhr.onreadystatechange = display_data;
    function display_data() {
     if (xhr.readyState == 4) {
        if (xhr.status == 200) {
          alert(xhr.responseText);
        } else {
          alert('There was a problem with the request.');
        }
       }
    }
  }
}
function getValues(id)
{
  var edit = id.split('-')[1];
  var xhr;
   if (window.XMLHttpRequest) { // Mozilla, Safari, ...
      xhr = new XMLHttpRequest();
  } else if (window.ActiveXObject) { // IE 8 and older
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }

  var data = "item_id=" + edit;
       xhr.open("POST", "../logic/load_results_item.php", true);
       xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
       xhr.send(data);
     xhr.onreadystatechange = display_data;
    function display_data() {
     if (xhr.readyState == 4) {
        if (xhr.status == 200) {
      		var result = JSON.parse(xhr.responseText);
      		document.getElementById("edit-category").value = result[0];
      		document.getElementById("edit-subcategory").value = result[1];
      		document.getElementById("itemname").value = result[2];
      		document.getElementById("itemprice").value = result[3];
          document.getElementById("fileimage").src=result[4];
      		document.getElementById("itemdiscount").value = result[5];
        } else {
          alert('There was a problem with the request.');
        }
       }
    }

}