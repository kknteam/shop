function gotoCheck(){
    window.location.replace("subPage/checkout.php");
}
function goHome(){
    var fullname = document.getElementById("txtFullname").value;
    var email = document.getElementById("txtEmail").value;
    var Phone = document.getElementById("txtPhone").value;
    var error = [];
    if(fullname == "" || email == "" || Phone == "")
    {
        error.push("You must fill out all text boxes");
    }
    if(error.length == 0)
    {
        window.location.replace("../index01.php");
        alert("Your order(s) have been placed successfully");
    }
}
window.updateSL = function(i)
{
    var a = document.getElementsByName("id")[i].value; 
}
function redirect() {
    window.location.replace("index.php?a=itemSort.php");
    return false;
}
// When the user scrolls the page, execute myFunction 
window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("navbar");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
//JQUERY
$(document).ready(function(){
    $("select.sapXep").change(function(){
        var selectedValue = $(this).children("option:selected").val();
				window.location.replace("index.php?a=index01.php&sx="+selectedValue);
    });
});
        // CHECKBOX
        $('#check').click(function() {
            alert("Checkbox state (method 1) = " + $('#test').prop('checked'));
            alert("Checkbox state (method 2) = " + $('#test').is(':checked'));
        });
