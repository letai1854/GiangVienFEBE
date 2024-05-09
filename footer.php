<?php
// if(session_status() === PHP_SESSION_NONE) {
//     session_start();
// }
// $sdt = isset($_SESSION['footer_sdt']) ? $_SESSION['footer_sdt'] : "123456789";
// $email = isset($_SESSION['footer_email']) ? $_SESSION['footer_email'] : "DzoanXuanThanh@gmail.com";
if(isset($_POST['email']) && isset($_POST['sdt'])){
    echo '<script>
    document.getElementById("footer-email").textContent = "' . $_POST['email'] . '";
    document.getElementById("footer-phone").textContent = "' . $_POST['sdt'] . '";
    </script>';
}
?>


<footer id="footer" class="pt-4 footer divider layer-overlay  bg-theme-colored-gray mt-30" style="background-color: rgba(12, 12, 12, 0.905);">
    <div class="container">
        <div class="row ">
            <div class="col-md-4">
                <div class="widget text-white">
                  <h4 class="widget-title text-white font-16 "><b>Đại học Tôn Đức Thắng</b></h4>
                        <div class="opening-hours" style="margin-top: 13px;">
                            <ul class="list-border">
                                <li class="clearfix">
                                  <img src="./logo.png" alt="">
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="text-white">
                        <div class="widget ">
                            <h4 class="widget-title text-white font-17 font-weight-bold "><b>Liên hệ:</b></h4>
                            <div class="opening-hours">
                                <ul class="list-border">
                                        <li class="clearfix">
                                            <span>Thông tin liên lạc</span>
                                            <ul class="list ml-0 mt-5">
                                                <li class="m-0 pl-0 no-border"> <i class="fa fa-phone text-danger mr-3"></i> <a id="footer-phone" class="text-white"  <?php isset($_POST['email'])?$_POST['email']:123456789 ?>>123456789</a> </li>
                                                <li class="m-0 pl-0 no-border"> <i class="fas fa-envelope mr-3" aria-hidden="true"></i>
                                                  <a id="footer-email" class="text-white">DzoanXuanThanh@gmail.com</a> </li>
                                            </ul>
                                        </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="text-white">
                        <div class="widget ">
                            <h4 class="widget-title text-white font-17 font-weight-bold sm-display-none"><b>&nbsp;&nbsp;&nbsp;</b></h4>
                            <div class="opening-hours">
                                <ul class="list-border">
                                    <li class="clearfix">
                                        <span>Đăng ký nhận bản tin của chúng tôi</span>
                                        <ul class="list ml-0 mt-5">
                                    
                                                  <form action="">
                                    
                                                        <div data-mdb-input-init="" class="form-outline mb-4" data-mdb-input-initialized="true">
                                                          <input type="email" id="form5Example22" class="form-control" placeholder="Địa chỉ email">

                                                        <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 88.8px;"></div><div class="form-notch-trailing"></div></div></div>
                                                    
                                                        <button data-mdb-ripple-init="" type="button" class="btn btn-primary mb-4">
                                                          Đăng ký
                                                   
                                                  </form>
                                                </div>
                                        
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="footer-bottom bg-black-333">
            <div class="container pt-20 pb-20">
                <div class="row">
                    <div class="col-md-6">
                        <p class="font-11 m-0 text-white">
                            Copyright ©2024 52200020_52200045
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </footer>  