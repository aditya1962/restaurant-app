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
