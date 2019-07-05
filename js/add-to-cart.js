function addToCart(id)
{
	 var rating_val = 0;
	 var item_id = id[id.length-1];
	 var quantity_val = document.getElementById("quantity-"+item_id).textContent;
   if(parseInt(quantity_val) ===0)
   {
    alert("Item quantity cannot be zero");
   }
   else
   {
  	 var xhr;
  	 if (window.XMLHttpRequest) { // Mozilla, Safari, ...
  	      xhr = new XMLHttpRequest();
  	  } else if (window.ActiveXObject) { // IE 8 and older
  	      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  	  }

  	   var data = JSON.stringify({"rating":rating_val, "item_id":item_id,"quantity":quantity_val});
       xhr.open("POST", "../logic/add_item_cart.php", true);
       xhr.setRequestHeader("Content-Type", "application/json");
       xhr.send(data);
        xhr.onreadystatechange = display_data;
        function display_data() {
           if (xhr.readyState == 4) {
              if (xhr.status == 200) {
            	if(xhr.responseText==="Item added")
            	{
            		document.getElementById(id).style.backgroundColor = "#28a745";
      	      	document.getElementById(id).style.borderColor = "#28a745";
            		alert("Item Added to Cart");
            	}
              } else {
                alert('There was a problem with the request.');
              }
             }
        }
      }
}

function save(id)
{
	 var item_id = id[id.length-1];
	 var xhr;
	 if (window.XMLHttpRequest) { // Mozilla, Safari, ...
	      xhr = new XMLHttpRequest();
	  } else if (window.ActiveXObject) { // IE 8 and older
	      xhr = new ActiveXObject("Microsoft.XMLHTTP");
	  }

  	   var data = "item_id="+item_id;
       xhr.open("POST", "../logic/save_item.php", true);
       xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
       xhr.send(data);
     xhr.onreadystatechange = display_data;
    function display_data() {
     if (xhr.readyState == 4) {
        if (xhr.status == 200) {
	      if(xhr.responseText==="Item saved")
	      	{
	      		document.getElementById(id).style.backgroundColor = "#28a745";
	      		document.getElementById(id).style.borderColor = "#28a745";
	      		alert("Item Saved");
	      	}
        } else {
          alert('There was a problem with the request.');
        }
       }
    }
}