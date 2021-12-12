<?php //include "core/base.php"?>
</div>
</div>
</div>
</section>


<script src="<?php echo $url ?>/assets/vendor/jquery-3.3.1.min.js"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="<?php echo $url ?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $url ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $url ?>/assets/vendor/way_point/jquery.waypoints.js"></script>
<script src="<?php echo $url ?>/assets/vendor/data_table/jquery.dataTables.min.js"></script>
<script src="<?php echo $url ?>/assets/vendor/data_table/dataTables.bootstrap4.min.js"></script>
<!--<script src="--><?php //echo $url ?><!--/assets/vendor/summer_note/summernote.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="<?php echo $url ?>/assets/js/app.js"></script>
<script>

const currentPage = location.href;
const navLinks  = document.querySelectorAll(".nav-link");

navLinks.forEach((link) => {
    const eachLink = link.getAttribute("href");
    if (currentPage === eachLink ) {
        link.parentElement.classList.add("active-list");
        link.style.color = "white";
    } else {
        link.parentElement.classList.remove("active-list");
    }
})
// console.log(currentPage);
// $(".nav-link").each(function () {
//     const links =  $(this).attr("href");
//     if (currentPage === links) {
//         $(this).css("color", "white");
//         $()
//         $(this).parent().addClass('active-list');
//     } else {
//         $(this).parent().removeClass('active-list');
//     }
// })

</script>

</body>
</html>