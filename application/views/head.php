<button class="my-button logout-button">
  Cerrar sesión <ion-icon name="rocket-sharp"></ion-icon>
</button>
<div id="confirmModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <p><b>Vas a cerrar la sesión,</b> <span class="letra"> <b>¿Estás seguro?</b></p> </span>
    <button id="confirmLogout" class="my-button">Confirmar</button>
    <button id="cancelLogout" class="my-button">Cancelar</button>
  </div>
</div>


<style> .modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 2px solid #4ac4a9;
  width: 300px;
}

.close {
  color: black;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.letra {
  color: #5c5c5c;
  float: right;
  font-size: 18px;
  font-weight: bold;
}
.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
} </style>

<script>
  var modal = document.getElementById("confirmModal");

  var logoutButton = document.querySelector(".logout-button");
  var cancelButton = document.getElementById("cancelLogout");

  logoutButton.onclick = function() {
    modal.style.display = "block";
  };

  cancelButton.onclick = function() {
    modal.style.display = "none";
  };

  var closeButton = document.getElementsByClassName("close")[0];
  closeButton.onclick = function() {
    modal.style.display = "none";
  };

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };

  var confirmButton = document.getElementById("confirmLogout");
  confirmButton.onclick = function() {

    window.location.href = "<?php echo base_url('Login/logout'); ?>";
  };
</script>
