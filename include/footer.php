<!-- FOOTER -->
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<p class="text-center txt-footer">© 2019 SMK Telekomunikasi Telesandi Bekasi. All rights reserved</p>
				</div>
			</div>
		</div>
	</div>
	<!-- AKHIR FOOTER HEHEH:)) -->

	<!-- SELESAI JUGA WKWKWK -->

  
    <!-- <script src="<?php echo HostUrl(); ?>/js/jquery.js"></script>
    <script src="<?php echo HostUrl(); ?>/assest/js/bootstrap.min.js"></script> -->

    <!-- <script src="<?php echo HostUrl(); ?>/assest/js/jquery-3.3.1.slim.min.js"></script> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="<?php echo HostUrl(); ?>/assest/js/popper.min.js"></script>
<script src="<?php echo HostUrl(); ?>/assest/js/bootstrap.min.js"></script>


<script>
    // $(window).on('load', function(){
    //     alert( "MANTERP");
    // })



    $(window).on('scroll',function(){

        var header = $('#header');
        var scrollTop = $(this).scrollTop();
        var height = header.outerHeight();
        var offset = height / 2;
        var calc = (scrollTop / height)*1;

        var calcBox = calc/5;

        var calccolor = 255 - ((scrollTop/ height) * 255);

        // console.log(calccolor);

        var navcolor = document.getElementsByClassName("nav-link");
        document.getElementById("navbar").style.backgroundColor = "rgba(255,255,255,"+calc+")";
        document.getElementById("navbar").style.boxShadow = "0px 2px 3px rgba(0,0,0,"+calcBox+")";

        var fa_bars = document.getElementById("navbar-toggler-icon");

        fa_bars.style.color = "rgba("+ calccolor +","+ calccolor +","+ calccolor +")";

        for (var i = 0; i < navcolor.length; i++) {

            navcolor[i].style.color = "rgba("+calccolor+","+calccolor+","+calccolor+")";
        }

        if(calc > '1'){
            document.getElementById("navbar").style.backgroundColor = "rgba(255,255,255,"+ calc+")";
            
            for (var i = 0; i < navcolor.length; i++) {
                navcolor[i].style.color = "rgba(0,0,0)";
            }
            document.getElementById("navbar").style.boxShadow = "0px 2px 3px rgba(0,0,0,0.2)";

        }else if(calc < '0'){
            document.getElementById("navbar").style.backgroundColor = "rgba(255,255,255,0)";

            document.getElementById("navbar").style.boxShadow = "0px 2px 3px rgba(0,0,0,0)";

            
            for (var i = 0; i < navcolor.length; i++) {
                navcolor[i].style.color = "rgba(255,255,255)";
            }           
        }
    })

</script>

<script>
    function getData() {
        $.ajax({
            type:'GET',
            url:'http://localhost/PendaftaranEskul/include/class.php?nis='+document.getElementById('nis').value,
            dataType:'json',
            success: function(data){
                if(data.status == 'error'){
                    document.getElementById('danger').style.display = 'block';
                    document.getElementById('nama').value = '';
                    document.getElementById('kelas').value = '';
                    document.getElementById('jurusan').value = '';
                }else{
                    document.getElementById('danger').style.display = 'none';
                    document.getElementById('nama').value = data.nama;
                    document.getElementById('kelas').value = data.kelas;
                    document.getElementById('jurusan').value = data.jurusan;

                }
            }
        });
    }
</script>
  </body>
</html>