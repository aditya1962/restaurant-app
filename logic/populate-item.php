<?php
include_once("dbConnect.php");
class PopulateItem
{
  function populate_categories()
  {
    //create database object
    $dbConnect = new DBConnect();
    //create connection object
    $link = $dbConnect->databaseConnect();
    //create query to retrieve categories
    $query = "SELECT DISTINCT category FROM item_category";
    //create prepared statement
    $stmt = $link->prepare($query);
    //execute query
    $stmt->execute();
    //bind the result from execution
    $stmt->bind_result($category);
    //capture results returned and store in an array
    $categories = array();
    while($stmt->fetch())
    {
      array_push($categories,$category);
    }
    $link->close();
    return $categories;
  }
  function populate_sub_categories($category)
  {
    //create database object
    $dbConnect = new DBConnect();
    //create connection object
    $link = $dbConnect->databaseConnect();
    //create query to retrieve categories
    $query = "SELECT sub_category FROM item_category";
    //create prepared statement
    $stmt = $link->prepare($query);
    //execute query
    $stmt->execute();
    //bind the result from execution
    $stmt->bind_result($category);
    //capture results returned and store in an array

    $sub_categories = array();
    while($stmt->fetch())
    {
      array_push($sub_categories,$category);
    }
    $link->close();
    return $categories;
  }
}

?>
