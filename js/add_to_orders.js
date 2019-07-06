function add_order(id)
{
	var item_id = id.split('-')[1];
	var quantity_val = document.getElementById("quantity-"+item_id).textContent;
  var item_name = document.getElementById("name-"+item_id).textContent;
	if(parseInt(quantity_val)===0)
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

  	   var data = JSON.stringify({"item_id":item_id,"quantity":quantity_val,"item_name":item_name});
       xhr.open("POST", "../logic/add_orders.php", true);
       xhr.setRequestHeader("Content-Type", "application/json");
       xhr.send(data);
        xhr.onreadystatechange = display_data;
        function display_data() {
           if (xhr.readyState == 4) {
              if (xhr.status == 200) {
                document.getElementById("order-table").innerHTML ="";
            	 document.getElementById("order-table").innerHTML = xhr.responseText;
               document.getElementById("submit-orders").style.visibility="visible";
              } else {
                alert('There was a problem with the request.');
              }
             }
        }
	}
}