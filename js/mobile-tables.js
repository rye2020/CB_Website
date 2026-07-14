// Detect mobile device and change to single column
    document.addEventListener('DOMContentLoaded', jmMobile);
    document.addEventListener('resize', jmMobile);

  function jmMobile() {
    var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    var myDiv = document.getElementById('jm-filter');
    var tbBody = document.getElementById('tbl-body');
    var tbTable = document.getElementById('tbl-table');
    const jmWidth = window.innerWidth;
    alert(jmWidth);
    if (isMobile && (jmWidth < '300')) {
      //  myDiv.remove();         
        alert(jmWidth);
        document.body.style.backgroundColor = "red";
    //     //myDiv.classList.add('mobile-class');
    } 
}
