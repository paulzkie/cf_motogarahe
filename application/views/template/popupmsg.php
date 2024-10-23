<style>
/* The Modal (background) */
.modalmsg {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 9999; /* Sit on top */
  padding-top: 250px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-contentmsg {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 20%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.closemsg {
  color: white;
  float: right;
  font-size: 28px !important;
  font-weight: bold;
}

.closemsg:hover,
.closemsg:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-headermsg {
  padding: 1px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-bodymsg {padding: 2px 16px;}
</style>
<button id="myBtnmsg" hidden="">Open Modal</button>

<!-- The Modal -->
<div id="myModalmsg" class="modalmsg">

  <!-- Modal content -->
  <div class="modal-contentmsg">
    <div class="modal-headermsg">
      <span class="closemsg">&times;</span>
      <h5>Message</h5>
    </div>
    <div class="modal-bodymsg">
      <div id="msgdesc"></div>
    </div>
  </div>

</div>

<script>
// Get the modal
var modals = document.getElementById("myModalmsg");

// Get the button that opens the modal
var btns = document.getElementById("myBtnmsg");

// Get the <span> element that closes the modal
var spans = document.getElementsByClassName("closemsg")[0];

// When the user clicks the button, open the modal 
btns.onclick = function() {
  modals.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spans.onclick = function() {
  modals.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modals) {
    modals.style.display = "none";
  }
}
</script>