//on click of preview display results
document.getElementById("preview").onclick = function()
{
  document.getElementById("category_label").innerHTML = document.getElementById("edit-category").value;
  document.getElementById("subcategory_label").innerHTML = document.getElementById("edit-subcategory").value;
  document.getElementById("name_label").innerHTML = document.getElementById("itemname").value;
  document.getElementById("price_label").innerHTML = document.getElementById("itemprice").value;
  document.getElementById("discount_label").innerHTML = document.getElementById("itemdiscount").value;

  return false;
}


function file(event)
{
  var filepath = URL.createObjectURL(event.target.files[0]);
  document.getElementById("fileimage").src = filepath;
}
