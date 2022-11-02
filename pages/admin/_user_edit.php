<!-- Modal -->
<style>
  .modal.show {
    background-color: rgba(0, 0, 0, 0.5);
    display: block;
    padding-right: 17px;
  }
</style>

<!-- Modal -->
<div class="modal show" id="exampleModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close modal-btn-close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
        if (isset($_GET['id'])) {
          echo $_GET['id'];
        }
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary modal-btn-close">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
  const modal = document.getElementById("exampleModal");
  const closes = document.getElementsByClassName("modal-btn-close");
  for (let i = 0; i < closes.length; i++) {
    closes[i].addEventListener('click', function() {
      modal.className = modal.className.replace(" show", "");
    });
  }
</script>