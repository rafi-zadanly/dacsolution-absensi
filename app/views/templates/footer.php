</div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>DAC Solution &copy; Admin Page 2020</span>
        </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">Anda yakin untuk melanjutkan logout?</div>
            <div class="modal-footer">
            <a class="btn btn-primary" href="<?= BASEURL; ?>/auth/logout">Logout</a>
            </div>
        </div>
        </div>
    </div>

    <!-- Core plugin JavaScript-->
    <script src="<?= BASEURL ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= BASEURL ?>/js/sb-admin-2.min.js"></script>

    <script>
    // Source : https://www.jqueryscript.net/loading/jQuery-Plugin-For-Creating-Loading-Overlay-with-CSS3-Animations-waitMe.html
    // none, bounce, rotateplane, stretch, orbit,
    // roundBounce, win8, win8_linear or ios

    $('body').waitMe({
        effect:'win8',
        text:'Mohon tunggu...',
        bg:'rgba(255,255,255,0.5)',
        color:'#000',
        maxSize:'',
        waitTime: -1,
        source:'',
        textPos:'vertical',
        fontSize:'',
        onClose: function() {
            $(this).fadeOut();
        }
    });
    
    $(function(){
        $(".waitMe").fadeOut(200);
    });

    $(window).on("beforeunload", function(e) {
        $(".waitMe").show();
    })
    </script>


</body>

</html>
