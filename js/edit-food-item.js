function request_subcategories()
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
      		document.getElementById("name").value = result[2];
      		document.getElementById("price").value = result[3];
      		document.getElementById("discount").value = result[4];
        } else {
          alert('There was a problem with the request.');
        }
       }
    }
}