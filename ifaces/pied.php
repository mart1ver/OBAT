
<div class="container">
  <footer>
        <p class="text-right">Obat. 2016</p>
        <p class="text-left"> <a href="../moteur/destroy.php">Déconection</a> </p>
    
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






