function remove_saved(id)
{
	 var item_id = id[id.length-1];
	 var xhr;
	 if (window.XMLHttpRequest) { // Mozilla, Safari, ...
	      xhr = new XMLHttpRequest();
	  } else if (window.ActiveXObject) { // IE 8 and older
	      xhr = new ActiveXObject("Microsoft.XMLHTTP");
	  }

  	   var data = "item_id="+item_id;
       xhr.open("POST", "../logic/remove_save_item.php", true);
       xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
       xhr.send(data);
     xhr.onreadystatechange = remove_data;
    function remove_data() {
     if (xhr.readyState == 4) {
        if (xhr.status == 200) {
	      if(xhr.responseText==="Item removed")
	      	{
	      		document.getElementById("component-"+item_id).remove();
	      		alert("Item removed from saved items");
	      	}
        } else {
          alert('There was a problem with the request.');
        }
       }
    }
}