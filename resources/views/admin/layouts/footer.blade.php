<!-- Footer -->
<footer class="content-footer footer bg-footer-theme mt-5">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
            ©
            <script>
                document.write(new Date().getFullYear());
            </script>
            , made with ❤️ by
            <a href="#" target="_blank" class="footer-link fw-bolder">Trinh Xuan Thuy</a>
        </div>
        <div>
            <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
            <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

            <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank"
                class="footer-link me-4">Documentation</a>

            <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank"
                class="footer-link me-4">Support</a>
        </div>
    </div>
</footer>
<!-- / Footer -->
<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->



<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="{{ asset('admin/assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('admin/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('admin/assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('admin/assets/js/dashboards-analytics.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace('description');
</script>
<script>
    $(document).ready(function() {
        $('#cover_image').change(function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#images').change(function() {
            $('.image-preview').remove();
            var files = $('#images')[0].files;
            for (var i = 0; i < files.length; i++) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var imagePreview = $('<img>').attr('src', e.target.result).addClass(
                        'image-preview');
                    $('.image-container').append(imagePreview);
                }
                reader.readAsDataURL(files[i]);
            }
        });
    });
</script>

<script>
    const showInput1 = document.querySelector('#showInput1');
    const textInput1 = document.querySelector('#textInput1');
    const showInput2 = document.querySelector('#showInput2');
    const textInput2 = document.querySelector('#textInput2');

    showInput1.addEventListener('click', function() {
      if (showInput1.checked) {
        textInput1.style.display = 'block';
        textInput2.style.display = 'none';
      }
    });

    showInput2.addEventListener('click', function() {
      if (showInput2.checked) {
        textInput2.style.display = 'block';
        textInput1.style.display = 'none';
      }
    });
  </script>
</body>

</html>
