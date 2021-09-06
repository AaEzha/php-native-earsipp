 </div>
 <!-- Akhir Container -->

 <footer class="footer">
   <div class="container">
     <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
       Copyright © <?= date('Y') ?> All rights reserved.
     </div>
   </div>
   </div>
 </footer>
 <!-- Optional JavaScript -->
 <script src="assets/js/bootstrap.min.js"></script>
 <script src="./assets/js/dashboard.js"></script>

 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/jszip-2.5.0/dt-1.11.1/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/datatables.min.js"></script>

 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>



 <script>
   $(document).ready(function() {
     $('#myTable').DataTable({
       dom: 'Bfrtip',
       buttons: [
         'copy', 'excel', 'pdf', 'csv', 'print'
       ]
     });
   });
 </script>

 </body>

 </html>