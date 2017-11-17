//Taken from w3-schools

function loadData() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       document.getElementById("result").innerHTML = this.responseText;
       
      // Get the modal
      var modal = document.getElementById('result');
      
      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("off")[0];
      modal.style.display = "block";
      
      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
          modal.style.display = "none";
      }
      
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      }
    }
  };
xhttp.open("GET", "world.php?country=" + document.getElementById("country").value + "&all=" + document.getElementById("search").checked, true);
xhttp.send();

}


window.onload = function WindowLoad(event){
  var item = document.createElement("div");
  var item2 = document.createElement("div");
  item2.id = "contents";
  item.appendChild(item2);
  item2.innerHTML = document.body.innerHTML;
  document.body.innerHTML = item.innerHTML;
  document.getElementById("lookup").addEventListener("click", loadData);
}
  