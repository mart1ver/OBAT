
<div class="container">
  <footer>
        <p class="text-left">Obat. 2016</p>
    
</footer> 
</div>  
 <script type="text/javascript">

//document.getElementById('mouse-position').style.visibility = "hidden";


$(function(){
    $(".chzn-select").chosen({
    disable_search_threshold: 10,
    no_results_text: "Oops, nothing found!"
   
  });
});
</script>


<script>
$('#myModal').on('shown.bs.modal', function () {
  $('.chzn-select', this).chosen();
});
</script>
  </body>
</html>






