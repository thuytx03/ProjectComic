 <!-- Footer  -->

 <footer>
     <div style="border: 1px solid orange;"></div>
     <div class="container-fluid mt-4">
         <div class="row ">
             <div class="col-lg-6 col-md-6 col-12 ">
                 <a href="" style="color: orange;">
                     <h5>Xuân Thuỷ</h5>
                 </a>
                 <p class="mt-2">Luôn cập nhật liên tục các bộ truyện mới, truyện VIP để phục vụ độc giả
                     Đọc truyện hoàn toàn miễn phí, hỗ trợ đa thiết bị.</p>
                 <p>Email khiếu nại: thuytxph26691@fpt.edu.vn</p>
                 <ul style="margin-left: -30px;">
                     <a href="" class="text-black ">Giới thiệu</a>
                     <a href="" class="text-black">Liên hệ</a>
                     <a href="" class="text-black">Hỏi đáp</a>
                 </ul>
                 <p>Copyrigtrht © 2023 XUANTHUY.COM</p>
             </div>

             <div class="col-lg-6 col-md-6 col-12 pl-2">
                 <a href="" class="bg-light" style="color: orange;">truyện tranh ngôn tình</a>
                 <a href="" class="bg-light" style="color: orange;">Manhwua</a>
                 <a href="" class="bg-light" style="color: orange;">Manhua</a>
                 <a href="" class="bg-light" style="color: orange;">Cổ đại</a>
                 <a href="" class="bg-light" style="color: orange;">Chuyển sinh</a>
                 <p class="mt-2">Mọi thông tin và hình ảnh trên website đều được sưu tầm trên Internet.
                     Chúng tôi không sở hữu hay chịu trách nhiệm bất kỳ thông tin nào trên web này.
                     Nếu làm ảnh hưởng đến cá nhân hay tổ chức nào, khi được yêu cầu, chúng tôi sẽ xem xét và gỡ bỏ
                     ngay
                     lập tức.</p>

             </div>
         </div>
     </div>

 </footer>

 <!-- End Footer  -->

 {{-- <script src="{{ asset('client/js/main.js') }}"></script> --}}
 <script src="{{ asset('client/js/swiper-bundle.min.js') }}"></script>
 <script src="{{ asset('client/js/script.js') }}"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
 </script>

 {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script> --}}

 {{-- <script>

    const chk = document.getElementById('chk');
    const navbar = document.querySelector('.navbar');
    // const textDarkMode = document.querySelector('.textDarkMode');

    chk.addEventListener('change', () => {
        document.body.classList.toggle('dark');
        navbar.classList.toggle('navbar-dark');
        navbar.classList.toggle('bg-dark');
        navbar.classList.toggle('navbar-dark-text');
        // textDarkMode.classList.toggle('textDarkMode');
    });

</script> --}}

<!-- Thêm jQuery từ CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#image').change(function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
{{-- Modal --}}
 <script>
     document.addEventListener("DOMContentLoaded", function() {
         var modalShown = localStorage.getItem("modalShown");
         if (!modalShown) {
             var myModal = new bootstrap.Modal(document.getElementById("exampleModal"), {
                 keyboard: false
             });
             myModal.show();
             localStorage.setItem("modalShown", true);
         }
         // Lắng nghe sự kiện "blur"
         window.addEventListener("blur", function() {
             localStorage.removeItem("modalShown");
         });
     });
 </script>
 {{-- End Modal  --}}


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
