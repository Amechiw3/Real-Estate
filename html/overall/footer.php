<footer class="sticky-footer">
  <div class="container">
    <div class="text-center"><small><?php echo APP_COPYRIGHT; ?></small></div>
  </div>
</footer>
<a href="#page-top" class="scroll-to-top rounded"><i class="fa fa-angle-up"></i></a>
<div class="modal fade" role="dialog" tabindex="-1" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          Ready to Leave?
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Select "Logout" below if you are ready to end your current session.</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-danger" id="btnlogout" type="button">Logout</button>
      </div>
    </div>
  </div>
</div>